<!DOCTYPE html>
<html>
<head>
	<title>User Registration and Login</title>
</head>
<body>

	<!-- Registration form -->
	<h2>Register</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" required><br>

		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" required><br>

		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br>

		<label for="confirmpassword">Confirm Password:</label>
		<input type="password" name="confirmpassword" required><br>

		<input type="submit" name="register" value="Register">
	</form>

	<?php
		// Registration form validation
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
			$firstname = $_POST["firstname"];
			$lastname = $_POST["lastname"];
			$email = $_POST["email"];
			$password = $_POST["password"];
			$confirmpassword = $_POST["confirmpassword"];

			if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirmpassword)) {
				echo "<p>Please fill in all fields.</p>";
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<p>Please enter a valid email address.</p>";
			} elseif ($password != $confirmpassword) {
				echo "<p>Passwords do not match.</p>";
			} else {
				// Successful registration
				echo "<p>Registration successful. Welcome, $firstname!</p>";
			}
		}
	?>

	<!-- Login form -->
	<h2>Login</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="email">Email:</label>
		<input type="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" name="password" required><br>

		<input type="submit" name="login" value="Login">
	</form>

	<?php
		// Login form validation and redirection
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
			$email = $_POST["email"];
			$password = $_POST["password"];

			// Check if email and password are valid
			// This is just a sample check, need a database to store
			if ($email == "user@example.com" && $password == "password") {
				// Successful login
				header("Location: welcome.php?firstname=User");
				exit;
			} else {
				// Invalid credentials
				echo "<p>Invalid email or password.</p>";
			}
		}
	?>

</body>
</html>
