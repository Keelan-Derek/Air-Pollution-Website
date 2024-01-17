<!--Start of SignUp Page -->
<head>
    <title> Sign Up! | Air Pollution </title>
</head>
        
    <div id="signup">

        <br>
        <br>

        <div class="container" id="signup-box">
            <form action="db-signup-login.php" method="POST" id="signup-form" name="signup-form">
                <h1 class="display-2 text-center">Create Account</h1>
                <hr>
                <h2 class="display-4">Personal Details</h2>
                <hr>
                <div class="form-row">
                    <div class="form-group col-12 col-md-6">
                        <label for="firstname">First Name</label>
                        <input class="form-control" type="text" name="firstname" required>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="lastname">Last Name</label> 
                        <input class="form-control" type="text" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="SampleMail@mail.com" required>
                </div>
                <div class="form row">
                    <div class="form-group col-6 col-md-7">
                        <label for="dob">Date of Birth</label>
                        <input class="form-control" type="text" name="dob" placeholder="YYYY-MM-DD" required> 
                    </div>
                    <div class="form-group col-6 col-md-5">
                        <label for="gender">Gender</label>
                        <div class="form group mt-2">
                            <input type="radio" name="gender" value="Male" optional>
                            <label for="male">Male</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="Female" optional>
                            <label for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6 col-md-8">
                        <label for="address">Postal Address</label>
                        <input class="form-control" type="text" name="address" placeholder="Street, City" optional>
                    </div>
                    <div class="form-group col-6 col-md-4">
                        <label for="postcode">Postcode</label>
                        <input class="form-control" type="text" name="postcode" placeholder="XXXXX XXX" optional>
                    </div>
                </div>
                <hr>
                <h2 class="display-4">Account Credentials</h2>
                <hr>
                <div class="form-group">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-11 col-md-6">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <!-- Toggler for Viewing of Password-->
                    <div class="col-1 col-md-1 mt-2 text-center" onClick="togglePassword()"> 
                        <i id="hide1" class="far fa-eye"></i>
                        <i id="hide2" class="far fa-eye-slash"></i>

                        <script>
                            function togglePassword(){
                                var x = document.getElementById("password");
                                var y = document.getElementById("hide1");
                                var z = document.getElementById("hide2");

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
                    <!-- End  -->
                    <div class="form-group col-12 col-md-5">
                        <input class="form-control" type="password" onfocusout="password_match()" name="confirm-password" id="confirm-password"placeholder="Confirm Password" required> 
                        
                        <!-- To Check If the Passwords Match on Submission -->
                        <div id="show-result"></div>
                        <script>
                            function password_match(){
                                var password = document.getElementById('password').value;
                                var confirmed_password = document.getElementById('confirm-password').value;

                                $.post("psw-check.php", {
                                    pass: password, cpass: confirmed_password
                                },
                                
                                    function(data, status){
                                        document.getElementById('show-result').innerHTML = data;
                                    }

                                )
                            }
                        </script>
                        <!-- End -->
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="formCheck" required>
                        <label class="form-check-label" for="formCheck"> 
                            I agree to all <a href="#">Terms and Conditions</a> involved in becoming an Air Pollution member!
                        </label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input class="register" type="hidden" name="form" value="SignUp"> <br>
                    <button type="submit" class="btn btn-primary mt-3" value="SignUp" name="SignUp" id="confirm-signup">Sign Up</button> <br>
                    <button  type="reset" class="btn btn-default mt-3"value="clearValues" title="Reset"><i class="fas fa-redo-alt"></i></button>
                </div>
            </form> 
            <p class="text-center mt-5 mb-5">
                Already have an account? <a href="index1.php?page=login">Log In Here</a>
            </p>
        </div>

        <br>
        <br>

    </div>
<!-- End of SignUp Page-->




























