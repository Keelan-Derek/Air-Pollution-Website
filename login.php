<!-- Start Log In Page-->

<head>
    <title> Log In! | Air Pollution </title>
</head>

    <div id="log-in">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                    <br><br>
                    <?php if (isset($_SESSION["error"])) { ?>
                        <div class='alert alert-danger' role='alert'><?= $_SESSION["error"] ?></div>
                    <?php unset($_SESSION["error"]); } ?>
                    <?php
                        if (isset($_COOKIE["lock"])){
                            echo "<div class='alert alert-danger' role='alert'>You have made 3 unsuccessful login attempts. Please wait for 10 minutes before trying again.</div>";
                            echo '<div class="alert alert-info" role="alert">It may seem that you do not have an account. Please try <a href="index1.php?page=signup" class="alert-link">signing up</a> if this is the case!</div>';
                        }
                        else {  //Execute rest of page
                    ?>
                    
                    <form action="db-signup-login.php" method="POST" name="LogIn" id="login-form" class="mt-5">  
                    <h1 class="mb-4">Account Login</h1>
                        <div class="form-group mb-4">
                            <input class="form-control" type="text" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-11 col-md-11">
                                <input class="form-control" type="password" name="password" id="log-pass" placeholder="Password" required>
                            </div>
                            <!-- Toggler for Viewing the Entered Password -->
                            <div class="col-1 col-md-1 mt-2" onClick="togglePassword()"> 
                                <i id="cover1" class="far fa-eye"></i>
                                <i id="cover2" class="far fa-eye-slash"></i>

                                <script>
                                    function togglePassword(){
                                        var x = document.getElementById("log-pass");
                                        var y = document.getElementById("cover1");
                                        var z = document.getElementById("cover2");

                                        if(x.type === 'password'){
                                            x.type = "text";
                                            y.style.display = "block";
                                            z.style.display = "none";
                                        }
                                        else{
                                            x.type = "password";
                                            y.style.display = "none";
                                            z.style.display = "block";
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="form" value="LogIn">
                            <button type="submit" class="btn btn-primary mt-2" value="LogIn" name="LogIn" id="confirm-login"><i class="fas fa-sign-in-alt"></i> Log In</button> <br>
                            <button  type="reset" class="btn btn-default mt-3 mb-0" value="clearValues" title="Reset"><i class="fas fa-redo-alt"></i></button>                           
                        </div>
                    </form>
                
                    <p class="text-center mt-3 mb-5">
                        Don't have an account? <a href="index1.php?page=signup">Sign Up Here</a>
                    </p>

                    
                    <?php } ?>
                    <div class="mb-5"></div>
                </div>
                <br><br> <br><br> <br><br>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </div>

<!-- End Log In Page-->

