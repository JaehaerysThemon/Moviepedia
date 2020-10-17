<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/header.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/yourcode.js"></script>
  <title>Moviepedia</title>
</head>
<body>
  <?php
	

	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		// username
		if(isset($_POST['username'])){
			//trim
			$username = trim($_POST['username']);
			
			// prüfung benutzername
			if(empty($username) || !preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,30}/", $username)){
				$error .= "The username is not in the right format.<br />";
			}
		} else {
			$error .= "Fill out a username.<br />";
		}

		if(isset($_POST['prename'])){
			//trim
			$username = trim($_POST['prename']);
			
			// prüfung benutzername
			if(empty($prename) || !preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,30}/", $prename)){
				$error .= "The prename is not in the right format.<br />";
			}
		} else {
			$error .= "Fill out a prename.<br />";
		}

		if(isset($_POST['name'])){
			//trim
			$username = trim($_POST['name']);
			
			// prüfung benutzername
			if(empty($name) || !preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,30}/", $name)){
				$error .= "The name is not in the right format.<br />";
			}
		} else {
			$error .= "Fill out a name.<br />";
		}

		if(isset($_POST['password'])){
			//trim
			$password = trim($_POST['password']);
			// passwort gültig?
			if(empty($password) || !preg_match("/(?=^.{8,255}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
				$error .= "Das Passwort entspricht nicht dem geforderten Format.<br />";
			}
		} else {
			$error .= "Geben Sie bitte das Passwort an.<br />";
		}

		if(isset($_POST['email'])){
			//trim
			$username = trim($_POST['email']);
			
			// prüfung benutzername
			if(empty($email) || !preg_match("/(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,30}/", $email)){
				$error .= "The email is not in the right format.<br />";
			}
		} else {
			$error .= "Fill out a email.<br />";
		}




	}
include('../components/header.php')

    ?>
  <main><h1>
    Register
  </h1></main>

  <div class="form-group">
					<label for="username">Username *</label>
					<input type="text" name="username" class="form-control" id="username"
						value=""
						placeholder="capital- and lowercase letters, min 6 charachter. "
						pattern="(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}"
						title="capital- and lowercase letters, min 6 charachter."
						maxlength="30" 
						required="true">
				</div>

        <div class="form-group">
					<label for="prename">Prename *</label>
					<input type="text" name="prename" class="form-control" id="prename"
						value=""
						placeholder="prename"
						title="prename"
						maxlength="30" 
						required="true">
				</div>

        <div class="form-group">
					<label for="name">Name *</label>
					<input type="text" name="name" class="form-control" id="name"
						value=""
						placeholder="name"			
						title="name"
						maxlength="30" 
						required="true">
				</div>

        <div class="form-group">
					<label for="password">Password *</label>
					<input type="password" name="password" class="form-control" id="password"
						placeholder="capital- and lowercase letters, numbers, specialsigns, min. 8 charachters. "
						pattern="(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
						title="capital- and lowercase letters, numbers, specialsigns, min. 8 charachters."
						maxlength="255"
						required="true">
				</div>

        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" name="email" class="form-control" id="email"
            placeholder="Enter yout Email adress."
            maxlength="100"
            required="true">
        </div>

		<button type="submit" name="button" value="submit" class="btn btn-info">Register</button>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>