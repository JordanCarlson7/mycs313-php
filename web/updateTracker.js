function request(postData, url){
    console.log("function")
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log("make request");
        console.log(this.readyState);
        console.log(this.status);
        if (this.readyState == 4 && this.status == 200) {
            console.log("made it");
            console.log(xhttp.responseText);
            formatView(JSON.parse(xhttp.responseText));
        }
      };
      
      xhttp.open("POST", url , true);//open(method, url, async);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(postData);
  
      
  }
  
  function updateView(){
    let username = document.getElementById('username').value;   
    let scheduleE = document.getElementById('scheduleSelect');
    let schedule = scheduleE.options[scheduleE.selectedIndex].value;
    let projectE = document.getElementById('projectSelect');
    let project = projectE.options[projectE.selectedIndex].value;
    let query = "username=" + username + "&schedule=" + schedule + "&project=" + project;
    console.log(query);
    request(query, 'access_Progress_DB.php'); 
  }

  function formatView(response) {
    table = "<table><tr><th>Title:</th><th>Description:</th><th>Date:</th><th>Attach1:</th><th>Attach2:</th><th>Attach3:</th></tr>";
    for (var i = 0; i < response.length; i++){
        table += `<tr>
                    <td>${response[i].title}</td>
                    <td>${response[i].description}</td>
                    <td>${response[i].data_d}</td>
                    <td><img src="${response.attach1}" alt="${response.attach1}"></td>
                    <td><img src="${response.attach2}" alt="${response.attach2}"></td>
                    <td><img src="${response.attach3}" alt="${response.attach3}"></td>
                  </tr>
                 `
    }
    table += "</table>"
    document.getElementById("table").innerHTML = table;
  }


function postQuery() {
    let query = '';
    let form = document.getElementById('updateForm');
    let inputs = form.getElementsByTagName('input');
    for(let element of inputs) {
        query += element.id + "=" + element.value + "&"; 
    }  
    query += "delete=false";
    request(query, "updateProgress.php");

}