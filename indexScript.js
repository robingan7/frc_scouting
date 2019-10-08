function toggleMyteam() {
    document.getElementById("sidebar").classList.toggle('active');
    document.getElementsByTagName("body").classList.toggle('active');
}

function toggleExplore() {
    document.getElementById("explorepage").classList.toggle('active');

}

function toggleEdit() {
    document.getElementById("editpass").classList.toggle('active');

}

function toggleChoose() {
    document.getElementById("chooseteam").classList.toggle('active');

}

function toggleChart() {
    document.getElementById("chartteam").classList.toggle('active');

}

function toggleInside() {
    document.getElementById("editpage").classList.toggle('active');
    document.getElementById("editpass").classList.toggle('active');
    //document.getElementById("editpage2").classList.toggle('active');
}

function toggleInside2() {
    document.getElementById("editpage2").classList.toggle('active');
    document.getElementById("editpass").classList.toggle('active');
    //document.getElementById("editpage").classList.toggle('active');
}

function toggleEditTeam() {
    document.getElementById("editteaminfo").classList.toggle('active');

}

function addValue(){
    var addvalue=document.getElementById("autoAdd").value;
    document.getElementById("autopoints")+=addvalue;
   
}
function toggleDetail() {
    document.getElementById("trs").classList.toggle('active');
}

function toggleEditTeam2() {
    document.getElementById("editteaminfo2").classList.toggle("active");
    document.getElementById("editpage").classList.toggle('active');
}

function toggleCargo(){
    document.getElementById("drop_cargo").classList.toggle('active');
}

function toggleHatch() {
    document.getElementById("drop_hatch").classList.toggle('active');
}

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

$('#diffrank').change(function () {
    var varselected = $('#diffrank option:selected');
    if (varselected.val() == 'speed') {
        $("#telerank").hide();
        $(".table1").hide();
        $("#autorank").hide();
        $("#trs").hide();
        $("#speedrank").show();
    }
    else if (varselected.val() == 'autopoints') {
        $("#telerank").hide();
        $("#autorank").show();
        $("#trs").hide();
        $("#speedrank").hide();
    }
    else if (varselected.val() == 'telepoints') {
        $("#telerank").show();
        $("#autorank").hide();
        $("#trs").hide();
        $("#speedrank").hide();
    }
    else if (varselected.val() == 'rankby') {
        $("#telerank").hide();
        $("#autorank").hide();
        $("#trs").show();
        $("#speedrank").hide();
    }
    else {
        $("#telerank").hide();
        $("#autorank").hide();
        $("#trs").show();
        $("#speedrank").hide();
    }

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
});
