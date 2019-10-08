$(document).ready(function () {

    $("#editbutton").click(function () {
        var frame = $("#txt").val();
        var key = "3";
        if (frame == key) {
            $("#editpage").css("top", "50%");
            $("#editpage").css("display", "inline");
        }
        else {
            alert("Wrong Password");
        }    
    });
$("#iconbutton_ed").click(function () {
    $("#editpage").css("top", "-50%");
});

load_data();
load_data2();
function load_data(query) {
    $.ajax({
        url: "search.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
            $('#result').html(data);
        }
    });
}
function load_graph(con1, con2, con3) {
    $.ajax({
        url: "graph.php",
        method: "POST",
        data: {
            con1: con1,
            con2: con2,
            con3: con3
        },
        success: function (data) {
            $('#graphresult').html(data);
        }
    });
}

    function load_graph2(con1, con2, con3) {
        $.ajax({
            url: "graph2.php",
            method: "POST",
            data: {
                con1: con1,
                con2: con2,
                con3: con3
            },
            success: function (data) {
                $('#graphresult2').html(data);
            }
        });
    }
$('.search-txt').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        load_data(search);
    }
    else {
        load_data();
    }
});

function load_data2(query) {
    $.ajax({
        url: "search.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
            $("#result2").html(data);
        }
    });
}

$(".search-txt2").keyup(function () {
    var search = $(this).val();
    if (search != "") {
        load_data2(search);
    }
    else {
        load_data2();
    }
});

    $('#chteamnumber').change(function () {
        var con1 = $('#chteamnumber').val();
        var con2 = $('#chregion').val();
        var con3 = $('#chfeature').val();
        load_graph(con1, con2, con3);
    });

    $('#chregion').change(function () {
        var con1 = $('#chteamnumber').val();
        var con2 = $('#chregion').val();
        var con3 = $('#chfeature').val();
        load_graph(con1, con2, con3);
    });

    $('#chfeature').change(function () {
        var con1 = $('#chteamnumber').val();
        var con2 = $('#chregion').val();
        var con3 = $('#chfeature').val();
        load_graph(con1, con2, con3);
    });
    $('#chteamnumber2').change(function () {
        var con1 = $('#chteamnumber2').val();
        var con2 = $('#chregion2').val();
        var con3 = $('#chfeature2').val();
        load_graph2(con1, con2, con3);
    });

    $('#chregion2').change(function () {
        var con1 = $('#chteamnumber2').val();
        var con2 = $('#chregion2').val();
        var con3 = $('#chfeature2').val();
        load_graph2(con1, con2, con3);
    });

    $('#chfeature2').change(function () {
        var con1 = $('#chteamnumber2').val();
        var con2 = $('#chregion2').val();
        var con3 = $('#chfeature2').val();
        load_graph2(con1, con2, con3);
    });
});

function toggleEditTeam2() {
    document.getElementById("editteaminfo2").classList.toggle("active");
}
$(document).ready(function () {
    $(".editteam-btn").click(function () {
        $("#editpage").css("top", "50%");
        //$("#editpage").css("opacity", "1");
        $("#editpage").css("display", "inline");
    });
});