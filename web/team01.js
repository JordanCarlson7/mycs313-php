function alertClick(){
    alert("Clicked!");
}

/*JS changing of background color Not-in-use*/
function changeColor(){
    var color = document.getElementById("colorChoice").value;
    var div1 = document.getElementById("div1");
    div1.style.backgroundColor = color;
}


$(document).ready(function(){
    console.log("step 1, ready");
    $("#jQcolorChanger").click(function(){
        console.log("step 2, clicked");

        /*Bootstrap color change CHANGES CLASS*/
        var div1Class = $("#div1").attr("class");
        console.log(div1Class);
        var newBackground = $("input").val();
        $("#div1").removeClass("bg\S+")
        $("#div1").addClass( "bg-" + newBackground);


        /*Non Bootstrap background color change
        $("#div1").css("background-color", $("input").val());
        */
        console.log("step 3, changed color");
    });

    /*Fade in and Fade out Div 3 with same button*/
    $("#jQfadeToggle").click(function(){
        console.log("fade toggle clicked");
        $("#div3").fadeToggle(1000);
        console.log("fade executed");
    });
});