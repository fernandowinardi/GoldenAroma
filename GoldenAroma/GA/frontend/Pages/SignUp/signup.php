<?php include('../../../backend/src/server.php')?>
<!DOCTYPE html>
<script src="https://use.fontawesome.com/9aaf325104.js"></script>
<form action="" name="signUp" method="post">
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
                <li><a href="../About/about.php" class="option>About</a></li>
                <li><a href="../ContactUs/contactus.html" class="option">Contact us</a></li>
            </ul>
        </nav>
        <?php if ($_SESSION['logged']==false) :?>
            <a href="../SignIn/signin.php" class="login">Sign in/Sign up</a>
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

    <div class="rectangleSignUp">
        <p class="signUpLabel">Sign Up</p>
        <a class="fillupLabel">Please fill up the form to create an account</a>
        <hr class="line2">
        <input type="text" class="firstName" id="signUpFirst" name="signUpFirst" placeholder="First Name" style="text-indent: 30px">
        <input type="text" class="lastName" id="signUpSecond" name="signUpSecond" placeholder="Last Name" style="text-indent: 30px">
        <input type="text" class="emailSignUp" id="signUpEmail" name="signUpEmail" placeholder="Email" style="text-indent: 30px">
        <input type="password" class="pwdSignUp" id="signUpPassword" name="signUpPassword" placeholder="Password" style="text-indent: 30px">
        <input type="password" class="pwdConfirm" id="signUpConfirm" name="signUpConfirm" placeholder="Confirm Password" style="text-indent: 30px">
        <a class="bySigningLabel">By signing up you agree to the <span class="terms"> terms of use </span> and our <span class="terms">privacy policy</span> </a>
        <button class="signUpBtn" name="signUpButton" id="signUp">Sign Up</button>
    </div>

    </body>
    </form>
</html>

<script type="text/javascript">

    document.getElementById('signUp').onclick = function validateForm() {
        var first = document.forms["signUp"]["signUpFirst"].value;
        var second = document.forms["signUp"]["signUpSecond"].value;
        var email = document.forms["signUp"]["signUpEmail"].value;
        var password = document.forms["signUp"]["signUpPassword"].value;
        var confirm = document.forms["signUp"]["signUpConfirm"].value;

        if(first == null || first == "", second == null || second == "", email == null || email == "", password == null || password == "", confirm == null || confirm == "") {
            alert("Please fill all required fields");
            return false;
        }

        if(password != confirm) {
            alert("Password does not match");
            return false;
        }
        return true;
    }

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
</script>