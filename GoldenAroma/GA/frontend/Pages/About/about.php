<?php include('../../../backend/src/server.php')?>
<!DOCTYPE html>
<script src="https://use.fontawesome.com/9aaf325104.js"></script>
<form action="" name="signIn" method="post">
	<head>
		<title>Golden Aroma</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header>
			<a href="../Welcome/welcome.php"><img class="logo" src="../../Images/logo.png" alt="(GA logo)"></a>
			<nav>
				<ul class="navbar">
					<li><a href="../Welcome/welcome.php" class="option">Welcome</a></li>
					<li><a href="../ShopTea/shoptea.php" class="option">Shop Tea</a></li>
					<li><a href="../ShopCoffee/shopcoffee.php" class="option">Shop Coffee</a></li>
					<li><a href="about.php" class="active">About</a></li>
					<li><a href="../ContactUs/contactus.php" class="option">Contact us</a></li>
				</ul>
			</nav>
            <?php if ($_SESSION['logged']==false) :?>
                <a href="../SignIn/signin.php" class="login">Sign in/Sign up</a>
            <?php elseif ($_SESSION['logged']==true) :?>
                <div id="signedIn">
                    <a class="welcomeBack">Welcome Back! <br> <?php echo $_SESSION['firstname'];?> <i class="fa fa-angle-down" onclick="drop()" style="font-size:24px"></i></a>
                    <div id="myDropdown" class="dropdown-content">
                        <p class="myAccount">My Account</p>
                        <a href="../Personalinfo/personalinfo.php" name="personalInfo">Personal Information</a>
                        <a href="../OrderHistory/orderhistory.php" name="orderHistory">Order History</a>
                        <a href="../Changepw/changepw.php" name="changePwd">Change my password</a>
                        <button name="signOut" id="signOut">Sign Out</button>
                    </div>

                </div>
            <?php endif; ?>
			<a href="#"><img class="basket" src="../../Images/basket.svg" alt="(basket logo)"></a>
		</header>
		<hr class="line1">
        <div class="rectangleHeader">
            <p class="para1">About Golden Aroma</p>
            <a class="para2">Quality Tea and Coffee</a>
        </div>
        <a><img class="logoPhoto" src="../../Images/logooriginal.png" alt="(ga logo ori)"></a>
        <div class="aimDiv">
            <p class="aimPara">What is our aim?</p>
            <hr class="line3">
            <p class="aimPara2">Having experienced in our fields for over 5 years, our aim is to
            provide the best quality of both service and products to our customers.</p>
        </div>
        <div class="ourProducts">
            <p class="ourProductLabel">Our Products</p>
            <a><img class="coffeeTea" src="../../Images/coffeeandtea.jpeg" alt="(coffee tea)"></a>
            <p class="coffeeLabel">Coffee</p>
            <p class="aboutCoffee">Our Coffee originated from Indonesia where it is a country
            rich in coffee.</p>
            <p class="teaLabel">Tea</p>
            <p class="aboutTea">Our tea is originated from different regions across asia and
             it is hand-picked to ensure the quality of the tea leaves.</p>
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
</script>