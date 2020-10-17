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
  

    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
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
      // password
      if(isset($_POST['password'])){
        //trim
        $password = trim($_POST['password']);
        // passwort gültig?
        if(empty($password) || !preg_match("/(?=^.{8,255}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)){
          $error .= "The password is not in the right format.<br />";
        }
      } else {
        $error .= "Fill out a password.<br />";
      }
      
      // kein fehler
      if(empty($error)){
      
        $query = "SELECT * FROM users WHERE username =?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
    
        //get_result: bekommt resultat von statemant zurück
        $result = $stmt->get_result();
        print_r($result);
        if($result->num_rows){
          while ($row = $result->fetch_assoc()){
            //überprüft ob Passswort übereinstimmt
            //password_verify: $passwoerd wo man in loginpage eingegeben hat $row... das wo in datenbank steht(gehashed )
            if(password_verify($password, $row['password'])){
              session_start();
    
              $_SESSION['username'] = $username;
              $_SESSION['logged_in'] = true;
    
              header('Location:./admin.php');
    
            }
            else{
              $error .= "Login is wrong";
            }
            $stmt->close();
          }
        }
        
    
      }
    }
    include('../components/header.php')
  ?>
  <main>
    <h1>Log In</h1>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <div class="form-group">
					<label for="username">Benutzername *</label>
					<input type="text" name="username" class="form-control" id="username"
						value=""
						placeholder="capital- and lowercase letters, min 6 charachter. "
						pattern="(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}"
						title="capital- and lowercase letters, min 6 charachter."
						maxlength="30" 
						required="true">
				</div>


        <div class="form-group">
					<label for="password">Password *</label>
					<input type="password" name="password" class="form-control" id="password"
						placeholder="capital- and lowercase letters, numbers, special letters, min. 8 charachter"
						pattern="(?=^.{8,}$)((?=.*\d+)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
						title="mindestens einen Gross-, einen Kleinbuchstaben, eine Zahl und ein Sonderzeichen, mindestens 8 Zeichen lang,keine Umlaute."
						maxlength="255"
						required="true">
				</div>

        <button type="submit" name="button" value="submit" class="btn btn-info">Login</button>


</body>
</html>