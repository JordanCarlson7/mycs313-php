function postRequest(postData, url){
    console.log("function")
    var xhttp = new XMLHttppostRequest();
    xhttp.onreadystatechange = function() {
        console.log("make postRequest");
        if (this.readyState == 4 && this.status == 200) {
            console.log("made it");
            console.log(xhttp.responseText);
            if (xhttp.responseText != "") {
                displayDataPoints(JSON.parse(xhttp.responseText));
                //check for return data? or use a get instead of a post
            }
            
        }
      };
      
      xhttp.open("POST", url , true);//open(method, url, async);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(postData);
  
      
  }
  
  function selectProgress(){
    let username = document.getElementById('username').value;   
    //let scheduleE = document.getElementById('scheduleSelect');
    //let schedule = scheduleE.options[scheduleE.selectedIndex].value;
    let projectE = document.getElementById('projectSelect');
    let project = projectE.options[projectE.selectedIndex].value;
    let query = "username=" + username + "&project=" + project;
    console.log(query);
    postRequest(query, 'DB_SelectAJAX.php'); 
  }

  function displayDataPoints(response) {
    table = "<table><tr><th>Title:</th><th>Description:</th><th>Date:</th><th>Attach1:</th><th>Attach2:</th><th>Attach3:</th></tr>";
    for (var i = 0; i < response.length; i++){
        table += `<tr>
                    <td>${response[i].title}</td>
                    <td>${response[i].description}</td>
                    <td>${response[i].data_d}</td>
                    <td><img src="${response[i].attach1}" alt="${response[i].attach1}"></td>
                    <td><img src="${response[i].attach2}" alt="${response[i].attach2}"></td>
                    <td><img src="${response[i].attach3}" alt="${response[i].attach3}"></td>
                  </tr>
                 `
    }
    table += "</table>"
    document.getElementById("table").innerHTML = table;
  }


function postUpdateQuery() {
    let query = '';
    let form = document.getElementById('updateForm');
    let inputs = form.getElementsByTagName('input');
    for(let element of inputs) {
        query += element.id + "=" + element.value + "&"; 
    }  
    query += "delete=false";
    postRequest(query, "DB_updateAJAX.php");

}