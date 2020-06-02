function verify_signup(username, password) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);

            let response_code = response.code;
            let msg = response.message;
        }
    }
    xhttp.open("POST", "team07_try_signup.php", true);
    xhttp.send("username=" + username + "&password=" + password + "&");
}