<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Each login starts a session and the session is destroyed when the user signs out
 */
//if no session, initialize $_SESSION['logged'] variable as false
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
$database = mysqli_connect('localhost', 'root', 'reynaldo123', 'goldenaroma');

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

//Contact Us page
if(isset($_POST['sendButton'])) {
    $senderName = $_POST['nameContact'];
    $senderEmail = $_POST['emailContact'];
    $subject = $_POST['subjectContact'];
    $senderMessage = $_POST['messageContact'];
    $recipient = 'goldenaroma@outlook.com';

    $mailBody = "<h1>From: $senderEmail<br></h1><p>To whom it may concern, <br><br> $senderMessage <br><br> Kind regards,<br> $senderName</p>";

    require_once('C:\Users\Fernando Winardi\PhpstormProjects\GoldenAroma\GoldenAroma\GA\backend\phpmailer\phpmailer\src\PHPMailer.php');
    require_once('C:\Users\Fernando Winardi\PhpstormProjects\GoldenAroma\GoldenAroma\GA\backend\phpmailer\phpmailer\src\Exception.php');
    require_once('C:\Users\Fernando Winardi\PhpstormProjects\GoldenAroma\GoldenAroma\GA\backend\phpmailer\phpmailer\src\SMTP.php');
    require('C:\Users\Fernando Winardi\PhpstormProjects\GoldenAroma\GoldenAroma\GA\backend\autoload.php');

    //PHPMailer Object
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'goldenaroma2@gmail.com';
    $mail->Password = 'Gund4la.';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
//From email address and name
    $mail->setFrom($senderEmail, $senderName);

//To address and name
    $mail->addAddress("goldenaroma@outlook.com");

//Send HTML or Plain Text email
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $mailBody;
    $mail->AltBody = "This is the plain text version of the email content";

    if(!$mail->send())
    {
        echo "There is an error when sending request";
    }
    else
    {
        echo "Successfully sent mail";
    }

}

//Welcome page buttons redirect pages
if(isset($_POST['shopCoffeeButton'])) {
    header('location: ../ShopCoffee/shopcoffee.php');
}

if(isset($_POST['shopTeaButton'])) {
    header('location: ../ShopTea/shoptea.php');
}

if(isset($_POST['rect1btn'])) {
    header('location: ../About/about.php');
}

if(isset($_POST['rect2btn'])) {
    header('location: ../ContactUs/contactus.php');
}


