<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
		$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);

		$query = "INSERT INTO PERSON(lastname, firstname,address,logdt) VALUES('$lastname', '$firstname', '$address', now())";

		if(mysqli_query($conn, $query)){
      header('Location: index.php');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>


<?php include('inc/header.php'); ?>
<div class="container">
<br/>
  <h2>Registration</h2>

  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="was-validated">
    <div class="form-group">
      <label for="uname">Last name:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter last name" name="lastname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="uname">First name:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="uname">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<?php include('inc/footer.php'); ?>

