

function addToCart(itemName){
    console.log(itemName);
    let name = itemName.id.split("button");
    console.log(name[0]);
    let addingObject = document.getElementById(name[0]);
    console.log(addingObject.dataset);
    //name and added is all we want.
    let sendString = "";
    sendString = "name=" + addingObject.dataset.name + "&added=" + addingObject.dataset.added;

    postItem(sendString);
}



function postItem(item){
   
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.readyState);
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseXML);
        
        }
      };
      xhttp.open("POST", "addSessionVariables.php", true);//open(method, url, async);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(item);
}