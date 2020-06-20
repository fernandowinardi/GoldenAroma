<!DOCTYPE html>
<script src="https://use.fontawesome.com/9aaf325104.js"></script>
<form method="post">
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
			<a href="signin.php" class="login">Sign in/Sign up</a>
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
                <input type="text" style="text-indent: 80px;" class="emailText" placeholder="Example@email.com" name="email">
                <img src="mail.png" class="mailImg">
            </div>
            <div class="inputContainer">
                <input type="password" style="text-indent: 80px;" class="passwordText" placeholder="password..." name="pwd">
                <img src="lock.png" class="pwdImg">
            </div>

            <a class="forgetPw">Forget Password?</a>

            <button class="signInBtn">Sign In</button>
        </div>
	</body>
</form>
</html>
<script>
    document.getElementById("signUp").onclick = function () {
        location.href = "signup.php"
    }
</script>