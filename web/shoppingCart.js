function addToCart(itemName){
    console.log(itemName);
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