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
					<li><a href="../About/about.php" class="option">About</a></li>
					<li><a href="contactus.php" class="active">Contact us</a></li>
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
        <p class="getInTouch">Get In Touch</p>

    <div class="rectangle1">
        <a class="nameLabel">Name:</a>
        <input type="text" class="contactName" name="nameContact" placeholder="Your Name" style="text-indent: 10px">
        <a class="emailLabel">Email:</a>
        <input type="text" class="contactEmail" name="emailContact" placeholder="Your Email" style="text-indent: 10px">
        <a class="subjectLabel">Subject:</a>
        <input type="text" class="contactSubject" name="subjectContact" placeholder="Your Enquiry" style="text-indent: 10px">
        <a class="messageLabel">Message:</a>
        <textarea class="contactMessage" name="messageContact" placeholder="Your Message" style="text-indent: 10px"></textarea>
        <button class="fa fa-paper-plane fa-3x" name="sendButton" aria-hidden="true"></button>
    </div>

    <div class="rectangle2">
        <a class="contactInfo">Contact Information</a>
        <i class="fa fa-map-marker fa-2x" aria-hidden="true">: Kompleks Malibu Blok A23</i>
        <i class="fa fa-phone fa-2x" aria-hidden="true">: 08116152263</i>
        <i class="fa fa-instagram fa-2x" aria-hidden="true">: @Oceanryan</i>
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