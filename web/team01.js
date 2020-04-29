function alertClick(){
    alert("Clicked!");
}

function changeColor(){
    var color = document.getElementById("colorChoice").value;
    var div1 = document.getElementById("div1");
    div1.style.backgroundColor = color;
}


$(document).ready(function(){
    console.log("step 1, ready");
    $("#jQcolorChanger").click(function(){
        console.log("step 2, clicked");
        $("#div1").css("background-color", $("input").val());
        console.log("step 3, changed color");
    });

    $("#jQfadeToggle").click(function(){
        console.log("fade toggle clicked");
        $("#div3").fadeToggle(1000);
        console.log("fade executed");
    });
});