function addToCart(itemName){
    console.log(itemName);
    let name = itemName.id.split("button");
    console.log(name[0]);
    let addingObject = document.getElementById(name[0]);
    console.log(addingObject.dataset);
    console.log(addingObject.dataset.name);
    //name and added is all we want.
    let sendString = "";
    sendString = "name=" + addingObject.dataset.name + "&added=" + addingObject.dataset.added;

    postAddItem(sendString);
}



function postAddItem(item){
   
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.readyState);
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
        
        }
      };
      xhttp.open("POST", "addSessionVariables.php", true);//open(method, url, async);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      console.log(item);
      xhttp.send(item);
}


function removeFromCart(itemName){
    console.log(itemName);
    let name = itemName.id.split("button");
    console.log(name[0]);
    let addingObject = document.getElementById(name[0]);
    console.log(addingObject.dataset);
    console.log(addingObject.dataset.name);
    //name and added is all we want.
    let sendString = "";
    sendString = "name=" + addingObject.dataset.name + "&added=" + addingObject.dataset.added;

    postRemoveItem(sendString);
}



function postRemoveItem(item){
   
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.readyState);
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.responseText);
        
        }
      };
      xhttp.open("POST", "removeSessionVariables.php", false);//open(method, url, async);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      console.log(item);
      xhttp.send(item);
      location.reload();
}