<?php
    //session_start();
    $_SESSION["counter"] = 0;
    $_SESSION["counter"] += 1;

?>

<!-- Start of Shop Page -->
<head>
    <title>Shop | Air Pollution </title>
</head>

<div id="shop-page">
    <br></br>
    <div class="jumbotron" id="shop-head">
        <h3 class="display-3 text-center" style="font-weight: 380;">Shop</h3>
        <p class="lead text-center jumbo-content">Purchase a Home Pollution Testing Kit Today!! </p>
    </div>
    <div class="container mt-5 mb-5">        
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="card bg-dark text-white" data-aos="flip-right" data-aos-duration="1500"  data-aos-easing="ease-out-cubic">
                <div>
                    <img class="card-img-top img-fluid shop-item" src="images/standard-airpollution-testing.jpg" alt="Standard Pollution Testing Kit">
                </div>    
                    <div class="card-body">
                        <h5 class="card-title p-3 h4 text-left">Standard Testing Kit</h5>
                        <p class="card-text pb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit quo, alias.</p>
                        <div class="text-center">
                            <a type="button" class="btn btn-secondary" title="Quick Shop">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a type="button" class="btn btn-primary" href="index1.php?page=checkout" title="Add to Cart">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <a type="button" class="btn btn-secondary" title="Add to Wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row card-footer p-3 pr-4 pl-4 h3">
                        <p class="col-sm-6 text-center"> &pound; 25.00 </p>
                        <p class="col-sm-6 text-center h6">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card bg-dark text-white" data-aos="flip-right" data-aos-duration="1500" data-aos-delay="300"  data-aos-easing="ease-out-cubic">
                <div>
                    <img class="card-img-top img-fluid shop-item" src="images/gold-airpollution-testing.jpg" alt="Gold Pollution Testing Kit">
                </div>    
                    <div class="card-body">
                        <h5 class="card-title p-3 h4 text-left">Gold Testing Kit</h5>
                        <p class="card-text pb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit quo, alias.</p>
                        <div class="text-center">
                            <a type="button" class="btn btn-secondary" title="Quick Shop">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a type="button" class="btn btn-primary" href="index1.php?page=checkout" title="Add to Cart">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <a type="button" class="btn btn-secondary" title="Add to Wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row card-footer p-3 pr-4 pl-4 h3">
                       <p class="col-sm-6 text-center"> &pound; 35.00 </p>
                       <p class="col-sm-6 text-center h6">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i> 
                       </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card bg-dark text-white" data-aos="flip-right" data-aos-duration="1500" data-aos-delay="500"  data-aos-easing="ease-out-cubic">
                <div>   
                    <img class="card-img-top img-fluid shop-item" src="images/platinum-airpollution-testing.jpg" alt="Platinum Pollution Testing Kit">
                </div>   
                    <div class="card-body">
                        <h5 class="card-title p-3 h4 text-left">Platinum Testing Kit</h5>
                        <p class="card-text pb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit quo, alias.</p>
                        <div class="text-center">
                            <a type="button" class="btn btn-secondary" title="Quick Shop">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a type="button" class="btn btn-primary" href="index1.php?page=checkout" title="Add to Cart">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <a type="button" class="btn btn-secondary" title="Add to Wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row card-footer p-3 pr-4 pl-4 h3">
                       <p class="col-sm-6 text-center"> &pound; 50.00 </p>
                       <p class="col-sm-6 text-center h6">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                       </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card bg-light mt-3 mr-5 ml-5 p-3 text-center h3 font-italic" >
        <div class="card-body">
            <div class="card-title">
                <?php
                    echo " <div> You are shop visitor number <span class='font-weight-bold'>". $_SESSION["counter"] ."</span> !<br> Please make a purchase.</div>";
                ?>
            </div> 
            
        </div>
    </div>
    <br><br>

</div>
<!--End of Shop Page-->