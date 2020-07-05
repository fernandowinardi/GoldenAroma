<?php include('../../../backend/src/server.php')?>
<!DOCTYPE html>
<script src="https://use.fontawesome.com/9aaf325104.js"></script>
<form action="" name="welcome" method="post">
	<head>
		<title>Golden Aroma</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header>
			<a href="welcome.php"><img class="logo" src="../../Images/logo.png" alt="(GA logo)"></a>
			<nav>
				<ul class="navbar">
					<li><a href="welcome.php" class="active">Welcome</a></li>
					<li><a href="../ShopTea/shoptea.php" class="option">Shop Tea</a></li>
					<li><a href="../ShopCoffee/shopcoffee.php" class="option">Shop Coffee</a></li>
					<li><a href="../About/about.php" class="option">About</a></li>
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

        <div class="coffeeadvertisement">
            <p class="coffeetext1">Coffee fresh from the fields</p>
            <p class="coffeetext2">Discover our wide range of coffees freshly picked</p>
            <p class="coffeetext3">and chosen by our dedicated farmer.</p>
            <button class="shopcoffeebtn" name="shopCoffeeButton">Discover Now</button>
            <a href="#"><img class="coffeepicture" src="../../Images/coffeeworker.jpg" alt="(Coffeeworker)"></a>
        </div>

        <hr class="line2">
        <div class="teaadvertisement">
            <a href="#"><img class="teapicture" src="../../Images/teaworker.jpg" alt="(Teaworker)"></a>
            <p class="teatext1">Tea for life</p>
            <p class="teatext2">Discover our wide range of teas hand picked</p>
            <p class="teatext3">specially for our customers.</p>
            <button class="shopteabtn" name="shopTeaButton">Discover Now</button>
        </div>

        <div class="rectangle1">
            <a><img class="rec1photo" src="../../Images/logooriginal.png" alt="(ga logo ori)"></a>
            <p class="rec1text">Learn more about how our brand was formed and a little bit about our history.</p>
            <button class="rec1btn" name="rect1btn">About Us</button>
        </div>
        <div class="rectangle2">
            <a><img class="rec2photo" src="../../Images/ctcus.jpg" alt="(contact us)"></a>
            <p class="rec2text">Got any questions?</p>
            <button class="rec2btn" name="rect2btn">Contact Us</button>
        </div>
        <div class="rectangle3">
            <a><img class="rec3photo" src="../../Images/jointeam.jpg" alt="(Join team)"></a>
            <p class="rec2text">Want to be a part of our awesome team?</p>
            <button class="rec3btn" name="rect3btn">Browse career</button>
        </div>
        <div class="botnav">
            <p class="paymentopt">Payment option: </p>
            <a><img class="visaimg" src="../../Images/visa.png" alt="(visa)"></a>
            <a><img class="mastercardimg" src="../../Images/mastercard.png" alt="(mastercard)"></a>
            <a><img class="paypalimg" src="../../Images/paypal.png" alt="(paypal)"></a>
            <p class="connectwithus">Connect With Us: </p>
            <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
            <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>
            <p class="subtous">Subscribe to Us: </p>
            <input type="text" class="subinput" placeholder="Enter your Email" style="text-indent: 30px">
            <button class="subbtn" style="text-indent: 18px">Subscribe</button>
            <p class="copyright">Copyright</p>
            <a><img class="copyrightc" src="../../Images/copyright.png" alt="(copyright)"></a>
            <a><img class="minilogo" src="../../Images/logo.png" alt="(logo)"></a>
            <p class="ARStext">All Rights Reserved</p>
        </div>
	</body>
</form>
</html>

<script type = text/javascript>

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