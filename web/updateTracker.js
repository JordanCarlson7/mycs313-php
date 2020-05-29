function request(postData){
    console.log("function")
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log("make request");
        console.log(this.readyState);
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
            console.log("made it");
            console.log(xhttp.responseText);
          //document.getElementById("display").innerHTML = xhttp.responseText;
          //console.log(xhttp.responseText);
        }
      };
      
      xhttp.open("POST", "updateProgress.php" , true);//open(method, url, async);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(postData);
  
      
  }
  

function postQuery() {
    let query = '';
    let form = document.getElementById('updateForm');
    let inputs = form.getElementsByTagName('input');
    inputs.forEach(element => {
        query += element.id + "=" + element.value + "&"; 
    });

        query += "delete=false";
    request(query);

}