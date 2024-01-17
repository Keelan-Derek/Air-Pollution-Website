<?php

    #PHP for sending the contact us form contents to the database's contact us table.

require('includes/database-connect.php');
$connection = db_connect();

$contact = "";

if(isset($_POST["contactForm"])){
    $contact = $_POST["contactForm"];
}

if($contact == "submitMsg") {
    $fullname = mysqli_real_escape_string($connection, $_POST["fullname"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $subject = mysqli_real_escape_string($connection, $_POST["subject"]);
    $message = mysqli_real_escape_string($connection, $_POST["message"]);

    $query = "INSERT INTO contact_us (fullname, email, phone, sub, msg) 
                VALUES ('$fullname', '$email', '$phone', '$subject', '$message')";
    $ret = mysqli_query($connection, $query);

    if($ret){
        $_SESSION["contact-status"] = '<div class="alert alert-success" role="alert">Your message has been sent! We will be in touch soon.</div>';
    } else {
        $_SESSION["contact-status"] = '<div class="alert alert-danger" role="alert">Unable to send message. Something went wrong:' .mysqli_error($connection); + '</div>';
    }
}

?>

<!-- Start of Contact Us Page-->

<head>
    <title> Contact Us | Air Pollution </title>
</head>

<div id="contact-us">

    <?php if (isset($_SESSION["contact-status"])) { ?>
        <?= $_SESSION["contact-status"] ?>
    <?php unset($_SESSION["contact-status"]); } ?>

    <br><br>
    <div class="jumbotron" id="contact-us-head">
        <h3 class="display-3 text-center" style="font-weight: 380;">Contact Us</h3>
        <p class="lead text-center jumbo-content">Here you can reach out to us and give any questions or commentaries you may have. </p>
    </div>

    <div class="container text-white" id="contact-us-content">
        <div class="row">
            <div class="col-12 col-md-4">
                <h4 class="text-uppercase font-weight-bold p-3">Contact Information</h4>
                <div id="contact-info-box">
                    <p class="p-3 ml-2 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Molestiae vitae necessitatibus sequi cumque expedita, voluptate. 
                    </p>
                    <hr class="contact-info-line">
                    <div class="p-3 text-dark ml-4">
                        <i class="fas fa-home"></i>&nbsp;&nbsp; Address
                        <br>
                        <i class="fas fa-envelope-open"></i>&nbsp;&nbsp; Email
                        <br>
                        <i class="fas fa-phone-alt"></i>&nbsp;&nbsp; Telephone Number
                        <br>
                    </div>
                    <hr class="contact-info-line">
                    <div class="ml-5">
                        <a href="https://twitter.com/" class="cicon" title="Twitter"><i class="fab fa-twitter-square text-dark"></i></a>
                        <a href="https://www.facebook.com/" class="cicon" title="Facebook"><i class="fab fa-facebook-square text-dark"></i></a>
                        <a href="https://www.instagram.com/" class="cicon" title="Instagram"><i class="fab fa-instagram text-dark"></i></a>
                        <a href="https://www.linkedin.com/" class="cicon" title="LinkedIn"><i class="fab fa-linkedin text-dark"></i></a>
                        <a href="https://www.youtube.com/" class="cicon" title="YouTube"><i class="fab fa-youtube-square text-dark"></i></a>
                    <br><br><br>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-8">
                <h4 class="text-uppercase font-weight-bold p-3">Contact Form</h4>
                <form action="#" method="POST" id="contact-us-form">
                    <div class="form-group col-12 col-md-12">
                        <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Full Name *" required>
                    </div>
                    <div class="form-row ml-2 mr-2">
                        <div class="form-group col-12 col-md-6">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email *" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone" optional>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-12">
                        <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" optional> 
                    </div>
                    <div class="form-group col-12 col-md-12">
                        <textarea class="form-control" name="message" id="message" placeholder="Message or Question *" rows="7" required></textarea>
                    </div>
                    <!-- Triggers the FAQ modal popup -->
                    <button type="button" class="btn btn-success btn-block mr-ml-3" data-toggle="modal" data-target="#FAQ">Send</button>

            </div>
        </div>
    </div>

    <!--  FAQ Modal -->
    <div class=" modal fade text-dark" id="FAQ" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalHead" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-dark display-4 font-weight-bold" id="modalHead">FAQ</h3>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead text-dark p-3 text-block" style="font-weight: 400;">
                        If you have questions, check here for possible answers before final submission of your question. <br>
                        Otherwise, if you have a message continue on with "Send Message".
                    </p>
                    <hr>

                    <div class="accordion" id="FAQcontent">
                        <div class="card">
                            <div class="card-header" id="FAQOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none;">
                                    <div class="text-dark font-weight-bold h3 mb-0">Our History</div>
                                </button>
                            </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="FAQOne" data-parent="#FAQcontent">
                            <div class="card-body">
                            Air Pollution is a good will initiative started back in 2015, as a means of trying to resolve the complex environmental issue that is air pollution. <br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                Fugit omnis alias ab illum! Nisi.
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="FAQTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-decoration: none;">
                                    <div class="text-dark font-weight-bold h3 mb-0">Our Vision</div>
                                </button>
                            </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="FAQTwo" data-parent="#FAQcontent">
                            <div class="card-body">
                            Our 2020 vision is to reduce worldwide air pollution levels to an Air Quality Index of 150 on average.
                            We are also looking to come up with concrete long-term solutions to teh air pollution issue with the help of our partners.
                            The only way that we can achieve our 2020 vision is if we all come together.<br><br>

                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                Fugit omnis alias ab illum! Nisi.
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="FAQThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="text-decoration: none;">
                                    <div class="text-dark font-weight-bold h3 mb-0">Our Mission</div>
                                </button>
                            </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="FAQThree" data-parent="#FAQcontent">
                            <div class="card-body">
                            Here at Air Pollution our mission is to make for an environment where the adverse effects of air pollution are
                            greatly reduced. <br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                Fugit omnis alias ab illum! Nisi.
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="FAQFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="text-decoration: none;">
                                    <div class="text-dark font-weight-bold h3 mb-0">Our Core Values</div>
                                </button>
                            </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="FAQFour" data-parent="#FAQcontent">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                Fugit omnis alias ab illum! Nisi.<br><br>
                                <ul>
                                    <li>Lorem ipsum dolor sit amet, consectetur</li>
                                    <li>Laborum asperiores aspernatur reprehenderit i</li>
                                    <li>Ipsa atque architecto expedita impedit dolores</li>
                                    <li>Fugit omnis alias ab illum! Nisi.</li>
                                    <li>Expedita impedit dolores tenetur, quam, laborum asperiores aspernatur reprehenderi</li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="FAQFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="text-decoration: none;">
                                    <div class="text-dark font-weight-bold h3 mb-0">What We Do</div>
                                </button>
                            </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="FAQFive" data-parent="#FAQcontent">
                            <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Ipsa atque architecto expedita impedit dolores tenetur, quam!<br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                Fugit omnis alias ab illum! Nisi.
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="FAQSix">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="text-decoration: none;">
                                    <div class="text-dark font-weight-bold h3 mb-0">How You Can Get Involved</div>
                                </button>
                            </h2>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="FAQSix" data-parent="#FAQcontent">
                            <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Ipsa atque architecto expedita impedit dolores tenetur, quam,
                            laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. <br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                Fugit omnis alias ab illum! Nisi.
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="FAQSeven">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="text-decoration: none;">
                                    <div class="text-dark font-weight-bold h3 mb-0">What is to Come</div>
                                </button>
                            </h2>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="FAQSeven" data-parent="#FAQcontent">
                            <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Ipsa atque architecto expedita impedit dolores tenetur, quam,
                            laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                            Fugit omnis alias ab illum! Nisi.<br><br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                Fugit omnis alias ab illum! Nisi.<br><br>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    Ipsa atque architecto expedita impedit dolores tenetur, quam,
                                    laborum asperiores aspernatur reprehenderit illo, ducimus facere alias. 
                                    Fugit omnis alias ab illum! Nisi.
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <input type="hidden" name="contactForm" value="submitMsg"> <br>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nevermind</button>
                        <button type="submit" class="btn btn-primary" value="submitMsg" name="sumbitMsg" id="submit-msg">Send Message</button>
                    </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>


    <br><br>
</div>

<!-- End of Contact Us Page-->