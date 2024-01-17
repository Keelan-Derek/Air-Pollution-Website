<?php

    require_once('includes/database-connect.php');
    $connection = db_connect();
    //session_start(); *Session Started in header.php
    if(isset($_SESSION["userid"])){
        global $userid;
        $userid = $_SESSION["userid"];
    }
    
    $query = "SELECT * FROM members WHERE member_ID" . "= \"$userid\"";
    $ret = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($ret);

?>

<!-- *Start of MyAccount Page* -->

<head>
    <title>MyAccount | Air Pollution </title>
</head>

<div id="myaccount">

<!-- PHP For Updating the Various Fields-->

<?php

    $update = "";

    if (isset($_POST["form"])){
        $update = $_POST["form"];
    }

    if ($update == "firstname"){
        if(isset($_POST["newfirstname"])) {
            $firstname = mysqli_real_escape_string($connection, $_POST["newfirstname"]);
            $query = "UPDATE members SET firstname = '$firstname' WHERE member_ID = \"$userid\"";
            $ret = mysqli_query($connection, $query);
            if ($ret) {
                echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
            }
        }
    } else if ($update == "lastname") {
        if(isset($_POST["newlastname"])) {
            $lastname = mysqli_real_escape_string($connection, $_POST["newlastname"]);
            $query = "UPDATE members SET lastname = '$lastname' WHERE member_ID = \"$userid\"";
            $ret = mysqli_query($connection, $query);
            if ($ret) {
                echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
            }
        }
    } else if ($update == "email") {
        if(isset($_POST["newemail"])){
            $email = mysqli_real_escape_string($connection, $_POST["newemail"]);
            $query = "UPDATE members SET email = '$email' WHERE member_ID = \"$userid\"";
            $ret = mysqli_query($connection, $query);
            if ($ret) {
                echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
            }
        }
    } else if ($update == "dob") {
        if(isset($_POST["newdob"])){
            $dob = mysqli_real_escape_string($connection, $_POST["newdob"]);
            $query = "UPDATE members SET dob = '$dob' WHERE member_ID = \"$userid\"";
            $ret = mysqli_query($connection, $query);
            if ($ret) {
                echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
            }
        }
    } else if ($update == "address"){
        if(isset($_POST["newaddress"])){
            $address = mysqli_real_escape_string($connection, $_POST["newaddress"]);
            $query = "UPDATE members SET postal_address = '$address' WHERE member_ID = \"$userid\"";
            $ret = mysqli_query($connection, $query);
            if ($ret) {
                echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
            }
        }
    } else if ($update == "postcode"){
        if(isset($_POST["newcode"])){
            $postcode = mysqli_real_escape_string($connection, $_POST["newcode"]);
            $query = "UPDATE members SET postcode = '$postcode' WHERE member_ID = \"$userid\"";
            $ret = mysqli_query($connection, $query);
            if ($ret) {
                echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
                }
            }
        } else if ($update == "user"){
            if(isset($_POST["newuser"])){
                $username = mysqli_real_escape_string($connection, $_POST["newuser"]);
                $query = "UPDATE members SET username = '$username' WHERE member_ID = \"$userid\"";
                $ret = mysqli_query($connection, $query);
                if ($ret) {
                    echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
                }
            }
        } else {
            if(isset($_POST["newpass"])){
                $password = mysqli_real_escape_string($connection, $_POST["newpass"]);
                $query = "UPDATE members SET passw = '$password' WHERE member_ID = \"$userid\"";
                $ret = mysqli_query($connection, $query);
                if ($ret) {
                    echo '<div class="alert alert-success" role="alert"><span class="font-weight-bold">Update succesfully made.</span> &nbsp; Please reload page to see change.</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">Error' . mysqli_error($connection) . '</div>';
                }
            }
        }
?>


<!-- PHP For Deleting the User in the Database -->  
    <?php
    if(isset($_POST["delete"])) {
        $query1 = "DELETE FROM members WHERE member_ID = '$userid'";
        $ret1 = mysqli_query($connection, $query1);
        if ($ret1) {
            if (isset($_SESSION["loggedin"])) {
                $_SESSION["loggedin"] == false;
            }
            unset($_SESSION["loggedin"]);
            unset($_SERVER["userid"]);
        }
    }
    ?> 

        <div class="container-fluid">

            <?php if (isset($_SESSION["login_success"])) { ?>
                <div class='alert alert-success' role='alert'><?= $_SESSION["login_success"] ?></div>
            <?php unset($_SESSION["login_success"]); } ?>
            
            <h1 class="display-3 mb-3" style="font-weight: 400;">My Account</h1>
            <div class="jumbotron" id="myaccount-head">
            
                <h3 class="display-4 text-center" style="font-size:20; font-weight: 350;">Welcome to Your Account Page, <span class="font-italic text-capitalize"> <?php if(isset($_SESSION["loggedin"])){ echo $_SESSION["username"]; } else {echo "NO USER";} ?>  !</span></h3>
                <div class="text-center mt-3 mb-3" id="logout-link"> <a href="logout.php">Log Out</a></div>'
                
                <p class="lead jumbo-content">Here you can view your account details, as well as edit your information, create and query your data stored in the database, and delete your account.</p>
                
                <?php
                if(!isset($_SESSION["loggedin"])){
                    echo '<br><div class="alert alert-warning" role="alert">You are not logged in.  <a href="index1.php?page=login" class="alert-link">Log In</a></div>
                              <div class="alert alert-info" role="alert"> If you have deleted your account, try <a href="index1.php?page=signup" class="alert-link">creating another one.</a></div>';
                }
                 else {
                ?>

            </div>  

            <br>  
            <div class="container mb-3" id="personal-info">
                <hr>
                <h2 class="display-4 ml-3" id="personal-info-head">Personal Information</h2>
                <hr>
                <div class="table-responsive">
                    <table class="account table table-borderless table-striped table-dark mt-3" id="tb-user-info">
                        <tr>
                            <td style="font-weight: bold;">Account ID:</td>
                            <td><?php echo $row["member_ID"] ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">First Name:</td>
                            <td><?php echo $row["firstname"] ?></td>
                            <td><button class="button btn btn-outline-success" data-toggle="modal" data-target="#mfirstname"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Last Name:</td>
                            <td><?php echo $row["lastname"] ?></td>
                            <td><button class="button btn btn-outline-success" data-toggle="modal" data-target="#mlastname"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Email:</td>
                            <td><?php echo $row["email"] ?></td>
                            <td><button class="button btn btn-outline-success" data-toggle="modal" data-target="#memail"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Date of Birth:</td>
                            <td><?php echo $row["dob"] ?></td>
                            <td><button class="button btn btn-outline-success" data-toggle="modal" data-target="#mdob"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Postal Address:</td>
                            <td><?php echo $row["postal_address"]; if($row["postal_address"] == ""){ echo "<div class='font-italic'>BLANK in DB</div>";} ?></td>
                            <td><button class="button btn btn-outline-success" data-toggle="modal" data-target="#maddress"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Postcode:</td>
                            <td><?php echo $row["postcode"]; if($row["postcode"] == ""){ echo "<div class='font-italic'>BLANK in DB</div>";} ?></td>
                            <td><button class="button btn btn-outline-success" data-toggle="modal" data-target="#mpostcode"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="container mt-3" id="account-settings">
                <hr>
                <h2 class="display-4 ml-3" id="account-settings-head">Account Settings</h2>
                <hr>
                <div class="table-responsive">
                    <table class="account table table-borderless table-striped table-light mt-3" id="tb-account-set">
                        <tr>
                            <td style="font-weight: bold;">Username:</td>
                            <td><?php echo $row["username"] ?></td>
                            <td><button class="button btn btn-outline-primary" data-toggle="modal" data-target="#muser"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Password:</td>
                            <td><?php echo $row["passw"] ?></td>
                            <td><button class="button btn btn-outline-primary" data-toggle="modal" data-target="#mpass"><i class="fas fa-edit"></i> Update</button></td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="form-group">
                    <form method="POST" action="#">
                        <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#mdeleteAccount" value="Delete Account">
                    </form>
                </div>
            </div>

            <br><br><br>                      
        </div>


        <!-- Account Deletion Modal -->
        <div class="modal fade" id="mdeleteAccount" data-toggle="modal" data-backdrop="static" tab-index="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="deleteAccount"> Account Deletion</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">
                    
                        <div class="text-center display-3 mb-4"><i class="fas fa-exclamation-circle"></i></div>
                        <p class="lead font-weight-bold h3"> Do you really want to delete your account? </p>
                        <p class="">There is no going back if you do.</p>
                    
                    </div>
                    <div class="modal-footer">
                        <form action="#" method="POST">
                            <button type="submit" class="btn btn-danger" id="delete" name="delete">Yes, delete!</button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-dismiss="modal" onClick="return alert('Account deletion aborted. Thanks for staying with us!')">No way, cancel!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Firstname Modal -->
        <div class="modal fade" id="mfirstname" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changeFname" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changeFname">Change Firstname</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newfirstname" class="col-form-label font-weight-bold">Updated First Name: </label>
                                <div>
                                    <input class="form-control" type="text" name="newfirstname" id="newfirstname" placeholder="Enter New Value" required>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="firstname">
                            <button type="submit" class="btn btn-success" name="firsname" value="firstname">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Last Name Modal -->
        <div class="modal fade" id="mlastname" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changeLname" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changeLname">Change Lastname</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newlastname" class="col-form-label font-weight-bold">Updated Last Name: </label>
                                <div>
                                    <input class="form-control" type="text" name="newlastname" id="newlastname" placeholder="Enter New Value" required>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="lastname">
                            <button type="submit" class="btn btn-success" name="lastname" value="lastname">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Email Modal -->
        <div class="modal fade" id="memail" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changeEmail" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changeEmail">Change Email Address</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newemail" class="col-form-label font-weight-bold">New Email Address: </label>
                                <div>
                                    <input class="form-control" type="email" name="newemail" id="newemail" placeholder="Enter New Value" required>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="email">
                            <button type="submit" class="btn btn-success" name="email" value="email">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Date of Birth Modal -->
        <div class="modal fade" id="mdob" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changeDOB" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changeDOB">Change Date of Birth</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newdob" class="col-form-label font-weight-bold">Enter Updated Date of Birth: </label>
                                <div>
                                    <input class="form-control" type="text" name="newdob" id="newdob" placeholder="YYYY-MM-DD" required>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="dob">
                            <button type="submit" class="btn btn-success" name="dob" value="dob">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Postal Address Modal -->
        <div class="modal fade" id="maddress" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changeAddress" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changeAddress">Change Postal Address</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newaddress" class="col-form-label font-weight-bold">New Postal Address: </label>
                                <div>
                                    <input class="form-control" type="text" name="newaddress" id="newaddress" placeholder="Enter New Value" required>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="address">
                            <button type="submit" class="btn btn-success" name="address" value="address">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Postcode Modal-->
        <div class="modal fade" id="mpostcode" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changePostcode" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changePostcode">Change Postcode</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newcode" class="col-form-label font-weight-bold">New Postcode: </label>
                                <div>
                                    <input class="form-control" type="text" name="newcode" id="newcode" placeholder="Enter New Value" required>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="postcode">
                            <button type="submit" class="btn btn-success" name="postcode" value="postcode">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Update Username Modal -->
        <div class="modal fade" id="muser" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changeUsername" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changeUsername">Change Username</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newuser" class="col-form-label font-weight-bold">New Username: </label>
                                <div>
                                    <input class="form-control" type="text" name="newuser" id="newuser" placeholder="Enter New Value" required>
                                </div>
                            </div>
                
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="user">
                            <button type="submit" class="btn btn-primary" name="user" value="user">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update Password Modal -->
        <div class="modal fade" id="mpass" data-toggle="modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changePassword" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title font-weight-bold" id="changePassword">Change Password</h3>
                        <button type="button" class="close" data-toggle="modal" data-dismiss="modal" aria-label="Close" title="Cancel">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body bg-light p-5">

                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newpass" class="col-form-label font-weight-bold">New Password: </label>
                                <div>
                                    <input class="form-control" type="password" name="newpass" id="newpass" placeholder="Enter New Value" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center" onClick="togglePassword()"> 
                                    <i id="cover1" class="far fa-eye"></i>
                                    <i id="cover2" class="far fa-eye-slash"></i>

                                    <script>
                                        function togglePassword(){
                                            var x = document.getElementById("newpass");
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

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="hidden" name="form" value="pass">
                            <button type="submit" class="btn btn-primary" name="pass" value="pass">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

<!--End of MyAccout Page-->

