function addToCart(itemName){
    sessionArray = sessionStorage.getItem("items");
    console.log("session Data" + sessionArray[0].name);
    console.log(itemName);
    let object = document.getElementById(itemName.id);
    let data = object.getAttribute("data-object");
    console.log(data);
    //let phpObj = JSON.parse(object.getAttribute("data-object"));
    //console.log(phpObj);
   // let obj = JSON.parse(itemName);
    //console.log("This items: " + obj.price);
}



function postItem(item){
   
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log(this.readyState);
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
         
          
          
        }
      };
      xhttp.open("POST", "addToCart.php" + "?=" , true);//open(method, url, async);
      xhttp.send();
}