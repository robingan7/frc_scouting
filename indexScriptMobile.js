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

function toggleCargo() {
    document.getElementById("drop_cargo").classList.toggle('active');
}

function toggleHatch() {
    document.getElementById("drop_hatch").classList.toggle('active');
}
/*
function editPass() {
    var code = document.getElementById('txt').value;
    var key = "3";
    if (code == key) {
        //document.getElementById('editpass').style.visibility = "visible";
        $("#editpage").css("top", "50%");
        //document.getElementById('editpass').setAttribute('style', 'opacity:1;');
    }
    if (code != key) {
        document.write("Robin");
    }
}*/