
function check_valid_pwd(password) {
    if (password.match('/^(?=\D*\d)[\w\d]{7,}$/') != password) {
        return false;
    }
    return true;
}

function check_valid_username(username) {
    return true;
}

function verify_signup(username_ID, password_ID, verify_ID, message_ID) {
    let username = document.getElementById(username_ID).value;
    let password = document.getElementById(password_ID).value;
    let verify = document.getElementById(verify_ID).value;

    if (!check_valid_pwd(password) || !check_valid_username(username)
    || password != verify) {
        document.getElementById(message_ID).innerText = "Invalid Usrname or Password";
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let response = JSON.parse(this.responseText);

            let response_code = response.code;
            console.log(response_code);
            let msg = response.msg;
        
            // Give the user the response message
            document.getElementById(message_ID).innerText = msg;

            // Code 1 = Success
            if (response_code === 1) {
                // Redirect to login
                console.log("redirecting to login.php");
                window.location.replace("team07Login.php");
                return;
            }
            // Any other code means failure.
        }
    }


    xhttp.open("POST", "team07_try_signup.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username + "&password=" + password + "&verify_password=" + verify);
    return false;
}