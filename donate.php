<?php
    //session_start();
    $_SESSION["counter"] = 0;
    $_SESSION["counter"] += 1;

    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
    }

    require_once('includes/database-connect.php');
    $connection = db_connect();

    $query = "SELECT * FROM campaigns WHERE campaign_id = 1";
    $ret = mysqli_query($connection, $query);
    if (mysqli_num_rows($ret) > 0) {
        $row = mysqli_fetch_array($ret);
    }

    $query = "SELECT * FROM campaigns WHERE campaign_id = 2";
    $ret = mysqli_query($connection, $query);
    if (mysqli_num_rows($ret) > 0) {
        $row2 = mysqli_fetch_array($ret);
    }

    $query = "SELECT * FROM campaigns WHERE campaign_id = 3";
    $ret = mysqli_query($connection, $query);
    if (mysqli_num_rows($ret) > 0) {
        $row3 = mysqli_fetch_array($ret);
    }

    $query1 = "SELECT * FROM members ORDER BY member_ID ASC";
    $ret1 = mysqli_query($connection, $query1); 
    if(mysqli_num_rows($ret1) > 0){
        $member = mysqli_fetch_array($ret);
    }
?>

<head>
    <title>Donate Now | Air Pollution</title>
</head>

<div id="donate">

    <div class="container-fluid">
        <br><br>
        <div class="jumbotron" id="donate-head">
            <h3 class="display-3 text-center" style="font-weight: 380;">Donate Now!</h3>
            <p class="lead text-center jumbo-content">Contribute to our cause by donating today.</p>
        </div>
        <?php
            if(isset($_POST["donate"])){
                
                $amount = mysqli_real_escape_string($connection, $_POST["amount"]);
                $campaign = mysqli_real_escape_string($connection, $_POST["hidden_campaign"]);
                $message = mysqli_real_escape_string($connection, $_POST["msg"]);
        
                if (isset($_SESSION["userid"])){
                    $query = "INSERT INTO donations(donation_amount, donated_at, msg, member_ID, campaign_id) VALUES ('$amount', NOW(), '$message', '$userid', '$campaign')";
                }
                else 
                {
                    $query = "INSERT INTO donations(donation_amount, donated_at, msg, campaign_id) VALUES ('$amount', NOW(), '$message', '$campaign')";
                }

                $ret = mysqli_query($connection, $query);
                if($ret){
                    echo "<div class='alert alert-success' role='alert'>Thank you for your donation.</div>";
                    
                } else {
                    echo "<div class='alert alert-danger' role='alert'>There happens to have been an error: " . mysqli_error($connection) ."</div>";
                }
  
            }
        ?>
    </div>
    <br><br>


        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <form method="POST" action=" " id="donation-form" class="border border-dark rounded p-5">
                        <hr>
                        <h2>Donation Details</h2>
                        <hr>
                        <label for="amount" class="font-weight-bold">Select an amount</label>
                        <div class="form-group">
                            <input type="radio" name="amount" value="25"> &pound;25&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="amount" value="50"> &pound;50&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="amount" value="100"> &pound;100&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="amount" value="250"> &pound;250&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="amount" value="500"> &pound;500&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="amount" value="1000"> &pound;1000&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="amount" value="1500"> &pound;1500&nbsp;&nbsp;&nbsp;
                        </div>
                        <!-- If any of the radios are selected, the field is disabled -->
                        <div class="form-group">
                            <label for="campaign-select" class="font-weight-bold">Select Campaign</label>
                            <select class="form-control" id="campaign-select" name="hidden_campaign" required>
                                <option>No specific campaign</option>
                                <option  value="<?php echo $row["campaign_id"];?>"><?php echo $row["campaign_title"]; echo "- "; echo "(Target: &pound;".$row['target_amount'].")"; ?></option>
                                <option value="<?php echo $row2["campaign_id"];?>"><?php echo $row2["campaign_title"]; echo "- "; echo "(Target: &pound;".$row2['target_amount'].")"; ?></option>
                                <option value="<?php echo $row3["campaign_id"];?>"><?php echo $row3["campaign_title"]; echo "- "; echo "(Target: &pound;".$row3['target_amount'].")"; ?></option>
                                   
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donation-message" class="font-weight-bold">Message</label>
                            <textarea class="form-control rounded" id="donation-message" name="msg" rows="3" placeholder="Your custom message text..."></textarea>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-info btn-lg pt-3 pb-3 pr-5 pl-5 rounded-pill" type="submit" name="donate" id="donate-action" value="Donate"><br>
                            <button  type="reset" class="btn btn-default mt-3"value="clearValues" title="Reset"><i class="fas fa-redo-alt"></i></button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
                
         <br><br>

         <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 mt-2 mb-2">
                    <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">Why We Collect Donations</h5>
                        <p class="card-text">While we do have the support of several sponsors, that allows us to get things done, we feel more of a need to actively involve the 
                            people who we strive to protect and help in bringing about a world with far less air pollution.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mt-2 mb-2">
                    <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">How Else Can You Contribute</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. In molestias neque rerum animi. 
                            Numquam rerum exercitationem autem voluptatibus aut est fugiat distinctio nisi ea, obcaecati laboriosam velit mollitia recusandae! Possimus.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    
    <br><br>

</div>


