
<div class="uk-position-relative">
    <div class="uk-cover-container uk-box-shadow-large uk-height-large uk-position-relative uk-visible-toggle uk-light  uk--shadow-large" tabindex="-1" uk-slideshow="animation: scale" style="border-bottom-left-radius:40px;border-bottom-right-radius:40px">
        <ul class="uk-cover-container  uk-height-large uk-slideshow-items uk-box-shadow-large" style="border-bottom-left-radius:40px;border-bottom-right-radius:40px">
            <li>
                <img src="assets/img/banner.jpg" alt="" uk-cover >
            </li>
            <li>
                <img src="assets/img/banner1.jpg" alt="" uk-cover>
            </li>
            <li>
                <img src="assets/img/banner2.jpg" alt="" uk-cover>
            </li>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
    <div class="uk-position-top">

<nav style="background: none" class="uk-navbar-container uk-visible@s" uk-navbar>
   
    <div class="uk-navbar-left">
        <a href="index.php"><img src="assets/img/blvckp.png" width="70px" alt=""></a>
    </div>
    <div class="uk-navbar-left" >
        <ul class="uk-navbar-nav">
            <li ><a href="index.php" style="color:white">HOME</a></li>
            <?php if($loginLink==0){
                ?>
                <li ><a href="#modal-example" uk-toggle style="color:white">Sign IN</a></li>
                <?php
            } 
            ?>
            <li><a style="color:white ; text-decoration: none;" href="panier.php" class="uk-icon-link" uk-icon="cart" id="pannel"><?=$nbr?></a></li>
            <?php if($loginLink==1){
                ?>
                <li><a style="color:white"> <?=$_SESSION['nom'] ?> </a></li>
                <li ><a class="uk-navbar-right" href="index.php?logout=1" uk-toggle style="color:white">LOGOUT!</a></li>
                <?php
            } 
            ?>
            
        </ul>
    </div>
    
</nav>
</div>
</div>

<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">LOGIN</h2>
        <form method="post" action="index.php">
            <div class="uk-margin">
                <input class="uk-input uk-form-width-large" name="user" type="text" placeholder="username">
            </div>
            <div class="uk-margin">
                <input class="uk-input uk-form-width-large" name="pass" type="text" placeholder="password">
            </div>
            <input class='uk-button uk-button-secondary uk-button-large uk-margin' type='submit' name="login" value='login'>
        </form>
    </div>
</div>

<!--Mobile-->
<div class="uk-position-top">

    <nav class="uk-navbar-transparent uk-navbar-container uk-hidden@s">
        <div class="uk-navbar-left">
            <a class="uk-navbar-toggle" href="#" uk-toggle="target: #offcanvas-nav">
                <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
            </a>
        </div>
    </nav>

    <div class="uk-light" id="offcanvas-nav" uk-offcanvas="overlay: true" >
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">
            <ul class="uk-navbar-nav">
                <li ><a href="index.php" style="color:white">HOME</a></li>
                <li><a href="products.php" style="color:white">PRODUCTS</a></li>
                <li><a href="about-us.php" style="color:white">ABOUT US</a></li>
                <li><a href="contact-us.php" style="color:white">CONTACT US</a></li>
                <li><a href="services.php" style="color:white">SERVICES</a></li>
                <li><a style="color:white" href="panier.php" class="uk-icon-link"  uk-icon="cart; ratio:2" id="pannel"></a></li>
            </ul>
        </div>
    </div>
</div>

<script>

</script>