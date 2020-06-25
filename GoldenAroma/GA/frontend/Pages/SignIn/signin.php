<?php include('../../../backend/src/server.php')?>
<!DOCTYPE html>
<script src="https://use.fontawesome.com/9aaf325104.js"></script>
<form action="" name="signIn" method="post">
    <?php include('../../../backend/src/error.php'); ?>
	<head>
		<title>Golden Aroma</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header>
			<a href="#"><img class="logo" src="../../Images/logo.png" alt="(GA logo)"></a>
			<nav>
				<ul class="navbar">
					<li><a href="../Welcome/welcome.php" class="option">Welcome</a></li>
					<li><a href="../ShopTea/shoptea.php" class="option">Shop Tea</a></li>
					<li><a href="../ShopCoffee/shopcoffee.php" class="option">Shop Coffee</a></li>
					<li><a href="../About/about.php" class="option">About</a></li>
					<li><a href="../ContactUs/contactus.php" class="option">Contact us</a></li>
				</ul>
			</nav>
            <?php if ($_SESSION['logged']==false) :?>
			<a href="signin.php" class="login">Sign in/Sign up</a>
            <?php elseif ($_SESSION['logged']==true) :?>
            <div id="signedIn">
                <a class="welcomeBack">Welcome Back! <br> <?php echo $_SESSION['firstname'];?> <i class="fa fa-angle-down" onclick="drop()" style="font-size:24px"></i></a>
                <div id="myDropdown" class="dropdown-content">
                    <p class="myAccount">My Account</p>
                    <a name="personalInfo">Personal Information</a>
                    <a name="orderHistory">Order History</a>
                    <a name="changePwd">Change my password</a>
                    <button name="signOut" id="signOut">Sign Out</button>
                </div>

            </div>
            <?php endif; ?>
			<a href="#"><img class="basket" src="../../Images/basket.svg" alt="(basket logo)"></a>
		</header>
		<hr class="line1">

        <p class="welcomeClass">Welcome Back</p>
        <div class="rectangle1">
            <p class="signInSocMed">Sign in with Facebook or Google</p>
            <button class="facebookButton"><span><i class="fa fa-facebook-square" aria-hidden="true"></i> </span>Sign In with Facebook</button>
            <button class="googleButton"><span><i class="fa fa-google" aria-hidden="true"></i></span>Sign In with Google</button>
            <a class="newUser">New User?<span><a class="signUpHere" id="signUp"> Create an account</a> </span></a>
        </div>
        <div class="rectangle2">
            <p class="signInNormal">Sign in with Email</p>
            <div class="inputContainer">
                <input type="text" style="text-indent: 80px;" class="emailText" name="signInEmail" placeholder="Example@email.com" name="email">
                <img src="../../Images/mail.png" class="mailImg">
            </div>
            <div class="inputContainer">
                <input type="password" style="text-indent: 80px;" class="passwordText" name="signInPassword" placeholder="password..." name="pwd">
                <img src="../../Images/lock.png" class="pwdImg">
            </div>

            <a class="forgetPw">Forget Password?</a>

            <button class="signInBtn" name="signInButton" id="signIn">Sign In</button>
        </div>
	</body>
</form>
</html>
<script>
    document.getElementById("signUp").onclick = function () {
        location.href = "../SignUp/signup.php"
    }

    function drop() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
        if(!event.target.matches('.fa-angle-down')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for(i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if(openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

    document.getElementById("signIn").onclick = function validateForm() {

        var email = document.forms["signIn"]["signInEmail"].value;
        var password = document.forms["signIn"]["signInPassword"].value;

        if(email == null || email == "", password == null || password == "") {
            alert("Please fill all required fields");
            return false;
        }

        return true;
    }

</script>