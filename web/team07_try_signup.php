<?php
require 'accessDB.php';

const CODE_SUCCESS  = 1;
const CODE_NO_ENTRY = 2;
const CODE_INV_PWD  = 3;
const CODE_INV_USR  = 4;

const MSG_SUCCESS  = "Success!";
const MSG_NO_ENTRY = "No username or password entered! Please enter a username and password!";
const MSG_INV_PWD  = "Invalid password";
const MSG_INV_USR  = "Invalid username";
const MSG_INV_USR_EXISTS  = "Invalid username. User already exists!";

function check_valid_pwd($password) {
    return true;
}

function check_valid_username($username) {
    return true;
}

function send_response($code, $msg) {
    $response = json_encode(array('code' => $code, 'msg' => $msg));
    echo $response;
}


// Get the database
$db = getDB();

// Verify username and password were received
if (!isset($_POST['password']) || !isset($_POST['username'])) {
    send_response(CODE_NO_ENTRY, MSG_NO_ENTRY);
    die();
}

$raw_password = $_POST['password'];

// Verify the password is valid
if (!check_valid_pwd($raw_password)) {
    send_response(CODE_INV_PWD, MSG_INV_PWD);
    die();
}

// Verify the username is valid
$username = $_POST['username'];
if (!check_valid_username($username)) {
    send_response(CODE_INV_USR, MSG_INV_USR);
    die();
}

// Hash the password
$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

// Verify there isn't a user with that name
$query = "SELECT * FROM users WHERE username = :username;";
$stmt = $db->prepare($query);
$stmt->execute([':username' => $username]);

if (count($stmt->fetchAll(PDO::FETCH_ASSOC)) > 0) {
    send_response(CODE_INV_USR, MSG_INV_USR_EXISTS);
    die();
}


// Success, add username and hashed password to DB
send_response(CODE_SUCCESS, MSG_SUCCESS);
$query = "INSERT INTO users (username, password) VALUES (:username, :password)";
$stmt = $db->prepare($query);
$stmt->execute([':username' => $username, ':password' => $hashed_password]);

die();
