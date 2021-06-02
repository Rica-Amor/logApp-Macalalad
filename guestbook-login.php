<?php
	require('config/config.php');
	require('config/db.php');
	if(isset($_POST['submit'])){
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);

		if ($username != "" && $password != ""){

			$query = "select count(*) as cntUser from login where username='".$username."' and password='".$password."'";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result);

			$count = $row['cntUser'];

			if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: guestbook-list.php');
			}else{
				echo "Invalid username and password";
				}

		}

	}
	// Source: https://makitweb.com/create-simple-login-page-with-php-and-mysql/
?>
<?php include('inc/header.php'); ?>
  <br/>
  <div style="width:30%; margin: auto; text-align: center;">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
      <img class="mb-4" src="img/bootstrap.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      <br/><label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

    </form>
  </div>
<?php include('inc/footer.php'); ?>