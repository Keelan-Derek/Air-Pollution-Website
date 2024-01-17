<?php
ob_start();
    //session_start();
    include_once('includes/header.php');

    $form = $_POST["form"];
    require('includes/database-connect.php');
    $connection = db_connect();

    if ($form == "SignUp") {
        if(isset($_POST["SignUp"])){

            $firstname  = mysqli_real_escape_string($connection, $_POST["firstname"]);
            $lastname   = mysqli_real_escape_string($connection, $_POST["lastname"]);
            $email      = mysqli_real_escape_string($connection, $_POST["email"]);
            $dob        = mysqli_real_escape_string($connection, $_POST["dob"]);
            $gender     = mysqli_real_escape_string($connection, $_POST["gender"]);
            $address    = mysqli_real_escape_string($connection, $_POST["address"]);
            $postcode   = mysqli_real_escape_string($connection, $_POST["postcode"]);
            $username   = mysqli_real_escape_string($connection, $_POST["username"]);
            $password   = mysqli_real_escape_string($connection, $_POST["password"]);
            //$password = password_hash($password, PASSWORD_DEFAULT); 


            $query = "SELECT username, passw FROM members";
            $ret = mysqli_query($connection, $query);
            $num_rows = mysqli_num_rows($ret);
            $match = 0;
            $warning = "";

            //Code to Handle Attempting to Register an Existing Username
            for($i=0;$i < $num_rows; $i++){
                $row = mysqli_fetch_array($ret);
                if($row["username"]== $username){
                    $warning = "<div class='alert alert-danger mt-3' role='alert'>Username is already in use! Sorry :(</div>
                    <div class='alert alert-info mb-3' role='alert'> If the account with this username happens to be yours please <a href='index1.php?page=login' class='alert-link'>log in here</a>; otherwise try signing up again <a href='index1.php?page=signup' class='alert-link'>here</a>.</div>";
                    $match = 1;
                    echo $warning;
                }
            }

            //If Username Does Not Already Exist, then...
            //Code to Create a New User is Executed
            $message = "";
            if($match==0){
                $query = "INSERT INTO members (firstname, lastname, email, dob, gender, postal_address, postcode, username, passw)
                        VALUES ('$firstname', '$lastname', '$email', '$dob', '$gender', '$address', '$postcode', '$username', '$password')";
                $ret1 = mysqli_query($connection, $query);
                if($ret1){
                    $message="<div class='alert alert-success mt-3' role='alert'>New user account successfully created! You can now <a href='index1.php?page=login' class='alert-link'>Log In</a></div>";
                    echo $message;
                }else{
                    $message="<div class='alert alert-danger' role='alert'>There happens to have been an error: " . mysqli_error($connection); + "</div>";
                    echo $message;
                }
            }
        }
    }else if($form == "LogIn"){
        if(isset($_POST["LogIn"])){

            $username = mysqli_real_escape_string($connection, $_POST["username"]);
            $password = mysqli_real_escape_string($connection, $_POST["password"]);
            
            $query = "SELECT * FROM members WHERE username='".$username."' ";
            $ret = mysqli_query($connection, $query);
            $num_rows = mysqli_num_rows($ret);

           if ($ret) {
                if($num_rows > 0){
                    $row = mysqli_fetch_array($ret);
                    if ($password == $row["passw"]) {
                        $_SESSION["loggedin"] = true;
                        $_SESSION["login_success"] = 'Login Successful';
                        $_SESSION["userid"] = $row["member_ID"];
                        $_SESSION["username"] = $row["username"];
                        header('location:index1.php?page=myaccount');
                        unset($_SESSION['attempts']);
                
                    }
                    else {
                        $_SESSION["loggedin"] = false;
                        $_SESSION['attempts'] += 1;
                        $_SESSION['error'] = 'The provided password does not match the stored password. <a href="index1.php?page=login" class="alert-link">Try again</a>!';
                        header('location:index1.php?page=login'); 
                    }
                }
                else{
                    $_SESSION["loggedin"] = false;
                    $_SESSION['attempts'] += 1;
                    $_SESSION['error'] = 'No account with that username has been found. Try <a href="index1.php?page=signup" class="alert-link">signing up</a> first!';
                    header('location:index1.php?page=login'); 
                }
            }

            if($_SESSION['attempts'] >= 3){
                setcookie("lock", $username, time() + 600);
            }

            if (isset($_COOKIE["lock"])){
                $difference = time() - $_COOKIE["lock"];
                if ($difference > 600) {
                    unset ($_COOKIE["lock"]);
                    unset ($_SESSION["attempts"]);
                }
            }
        }
    }
        
    include_once('includes/footer.php');
ob_end_flush();
?>
