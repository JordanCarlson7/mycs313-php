function request(){
  console.log("function")
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      console.log("make request");
      console.log(this.readyState);
      console.log(this.status);
      if (this.readyState == 4 && this.status == 200) {
          console.log("made it");
          format(xhttp.responseText);
        //document.getElementById("display").innerHTML = xhttp.responseText;
        //console.log(xhttp.responseText);
      }
    };
    
    xhttp.open("GET", "access_Progress_DB.php" , true);//open(method, url, async);
    xhttp.send();

    
}

function removeQuotes(dataPoint) {
  
  dataPointHere = dataPoint.replace(/["]+/g, "");
  dataPointArray = dataPointHere.split(',');
  console.log("DATAPOINT String: " + dataPointHere);
  return dataPointArray;

}


function format(jsonObj){
  console.log(jsonObj);
  theObj = JSON.parse(jsonObj);
  console.log(theObj);
  console.log("formatting");
  
  table = "<table><tr><th>User:</th><th>Password:</th><th>Schedule:</th><th>Img:</th></tr>";
  for (var i = 0; i < theObj.length; i++){

      /*remove extra quotations*/
      dataPointArray = removeQuotes(theObj[i].data_point);
  
      console.log(dataPointArray);
      console.log(theObj.length);
      console.log(theObj[i] + "\n");
      
      table += `<tr>
                  <td>${theObj[i].user_name}</td>
                  <td>${theObj[i].password}</td>
                  <td>${theObj[i].schedule_id}</td>
                  <td><img src="${dataPointArray[3]}" alt="${dataPointArray[3]}"></td>
                </tr>
               `
  }
  table += "</table>"

  document.getElementById("table").innerHTML = table;
}