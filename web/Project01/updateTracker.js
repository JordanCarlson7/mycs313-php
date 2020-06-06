function postRequest(postData, url){
    console.log("function")
    var xhttp = new XMLHttpRequest();
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
    //table = "<table><tr><th>Title:</th><th>Description:</th><th>Date:</th><th>Attach1:</th><th>Attach2:</th><th>Attach3:</th></tr>";
    let dataDiv = `
    <div id="dataTimeline">`
    
    for (var i = 0; i < response.length; i++){
        dataDiv += 
        `<div class="dataPoint">
            <div class="dataHeader"><h4 class="left">${response[i].title}</h4><h4 class="right">${response[i].data_d}</h4></div>
            <p>${response[i].description}</p>
            <img src="../Photos/${response[i].attach1}" alt="${response[i].attach1}">
            <img src="../Photos/${response[i].attach2}" alt="${response[i].attach2}">
            <img src="../Photos/${response[i].attach3}" alt="${response[i].attach3}">
            <button type="button" id="${response[i].title}" onclick="removeItem(this.id)">-</button>
          </div>`
    }
    dataDiv += `</div>`
    document.getElementById("dataPointBars").innerHTML = dataDiv;
  }


function postUpdateQuery(child) {
    let form = document.getElementById(child).parentElement;
    let query = '';
    let projectE = document.getElementById('projectSelect');
    let project = projectE.options[projectE.selectedIndex].value;
    let inputs = form.getElementsByTagName('input');
    for(let element of inputs) {
        query += element.id + "=" + element.value + "&"; 
    } 
    query += "projectp=" + project + "&"; 
    query += "delete=false";
    postRequest(query, "DB_updateAJAX.php");
    selectProgress();

}

function postSingleUpdateQuery(child) {
  let form = document.getElementById(child).parentElement;
  let query = '';
  let projectE = document.getElementById('projectSelect');
  let project = projectE.options[projectE.selectedIndex].value;
  let inputs = form.getElementsByTagName('input');
  for(let element of inputs) {
      query += element.id + "=" + element.value + "&"; 
  } 
  query += "projectp=" + project + "&"; 
  query += "delete=false";
  postRequest(query, "DB_singleDataAJAX.php");
  selectProgress();

}

function removeItem(elementId){
  let username = document.getElementById('username').value;
  let element = document.getElementById(elementId).parentElement;
  element.style.display = "hidden";
  let query = "username=" + username + "&" + "dataPointDelete=" + elementId;
  postRequest(query, "DB_singleDataAJAX.php");
  selectProgress();

}