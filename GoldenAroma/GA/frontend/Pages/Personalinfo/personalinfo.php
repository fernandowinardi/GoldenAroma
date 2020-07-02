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

        <div class="rectangle1">
            <p class="personalinfo">Personal Information</p>
            <input type="text" class="firstName" id="firstname" name="firstname" placeholder="First Name" style="text-indent: 30px">
            <input type="text" class="lastName" id="lastname" name="secondname" placeholder="Last Name" style="text-indent: 30px">
            <input type="text" class="email" id="email" name="email" placeholder="Email" style="text-indent: 30px">
            <input type="text" class="phonenum" id="phonenum" name="phonenum" placeholder="Phone Number" style="text-indent: 30px">
            <input type="text" class="country" id="country" name="country" placeholder="Country" style="text-indent: 30px">
            <input type="text" class="state" id="state" name="state" placeholder="State" style="text-indent: 30px">
            <input type="text" class="city" id="city" name="city" placeholder="City" style="text-indent: 30px">
            <input type="text" class="zipcode" id="zipcode" name="zipcode" placeholder="Zipcode" style="text-indent: 30px">
            <input type="text" class="address1" id="address1" name="address1" placeholder="Address1" style="text-indent: 30px">
            <input type="text" class="address2" id="address2" name="address2" placeholder="Address2" style="text-indent: 30px">
            <button class="savebutton" name="savebutton" id="savebutton">Save Changes</button>
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