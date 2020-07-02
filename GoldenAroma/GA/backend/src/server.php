<?php

session_start();

if(!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}

//initializing variables
$firstname = "";
$lastname = "";
$email = "";
$password = "";
$confirmpsw = "";
$errors = array();

//connect to your own mysql database
/**
 * Database type
 * CREATE DATABASE goldenaroma
 */
/**
 * Table to store website users type
 * CREATE TABLE users(
 * firstname varchar(30),
 * lastname varchar(30),
 * email varchar(30),
 * password varchar(255));
 */
$database = mysqli_connect('localhost', 'root', 'Binary10mil', 'goldenaroma');

//sign up - if signUpButton id from signup.php is clicked
if(isset($_POST['signUpButton'])) {
    //Read user input in all textfields
    $firstname = mysqli_real_escape_string($database, $_POST['signUpFirst']);
    $lastname = mysqli_real_escape_string($database, $_POST['signUpSecond']);
    $email = mysqli_real_escape_string($database, $_POST['signUpEmail']);
    $password = mysqli_real_escape_string($database, $_POST['signUpPassword']);
    $confirmpsw = mysqli_real_escape_string($database, $_POST['signUpConfirm']);

    //Check to see if user exists using sql query
    $query1 ="SELECT * FROM users WHERE email='$email'";
    $result_set =mysqli_query($database, $query1);//store query results in $result_set
    $user = mysqli_fetch_assoc($result_set);

    if (!empty($user) && $user['email'] === $email) {
        array_push($errors, "Email is already used");
    }

    //if no errors
    if(empty($errors)) {
        $password_encrypt = md5($password);//encrypt user password input
        //inserting all the variables into sql table
        $query2 = "INSERT INTO users(firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password_encrypt')";
        mysqli_query($database, $query2);
        //record current user session
        $_SESSION['firstname'] = $firstname;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are logged in";
        //if succeed, move to welcome.php
        header('location: ../Welcome/welcome.php');
        $_SESSION['logged'] = true;
    }
}

//sign in - if signInButton id form signin.php is clicked
if(isset($_POST['signInButton'])) {

    //Read user input from all textfields
    $email = mysqli_real_escape_string($database, $_POST['signInEmail']);
    $password = mysqli_real_escape_string($database, $_POST['signInPassword']);

    //if no errors
    if(count($errors) == 0) {
        $password = md5($password);//encrypt password
        //find user inputs from sql table and store it in $result_set
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        //$firstnameQuery is used to retrieve signed in user first name to be displayed in "Welcome back!"
        $firstnameQuery = mysqli_query($database, "SELECT firstname FROM users WHERE email='$email'");
        $result_set = mysqli_query($database, $query);
        if(mysqli_num_rows($result_set) == 1 && $row = $firstnameQuery->fetch_assoc()) {
            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['success'] = "Successfully logged in";
            header('location: ../Welcome/welcome.php');
            $_SESSION['logged'] = true;
        } else {
            //else incorrect email and password combination
            array_push($errors, "Incorrect email and password combination");
        }
    }
}

//if signout is clicked, set $_SESSION['logged'] as false.
if(isset($_POST['signOut'])) {
    header('location: ../SignIn/signin.php');
    session_destroy();
    $_SESSION['logged'] = false;
}
