<!DOCTYPE html>
<html>
<head>
		  <meta charset="UTF-8">

	<title></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<body>
  
	<div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/book2.png" alt="sing up image"></figure>
                        <a href="singin.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>

                        <form method="post" action="userFunction.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email: " required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" required />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            <?php if($_GET['err']==True){
                                        echo '<span style="color:red;">Password or Email Inccorrect</span>';} ?>
                        </form>
                    </div>
                </div>
            </div>
        </section>
	</div>

</body>
</html>