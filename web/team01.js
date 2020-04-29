function alertClick(){
    alert("Clicked!");
}

function changeColor(){
    var color = document.getElementById("colorChoice").value;
    var div1 = document.getElementById("div1");
    div1.style.backgroundColor = color;
}