<!DOCTYPE html>
<html>
<head>
		  <meta charset="UTF-8">

	<title></title>
</head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<body>

	<div class="main">
		<!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php if($_GET['err']==True){
                                        echo '<span style="color:red;">Email already Exist</span>';} ?>
                        <form method="post"  action = "userFunction.php" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="full_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="full_name" id="full_name" placeholder="Your Full Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                           <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="tel" id="phone" name="phone"
                                     pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required placeholder="8777-555-44-33">
                            </div>
                            <div class="form-group">
                                <label for="age"><i class="zmdi zmdi-run"></i></label>
                                <input type="int" name="age" id="age" min="0" max="120" placeholder="Age " required/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin"></i></label>
                                <input type="text" name="address" id="address"  placeholder="Address " required/>
                            </div>
                    
                            <div class="form-group form-button">
                                <input type="submit" name="Register" id="Register" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/Ulan.png" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
	</div>
	    <script src="vendor/jquery/jquery.min.js"></script>

</body>
</html>