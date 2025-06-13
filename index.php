<!-- PHP INCLUDES -->
<?php
session_start();
include "connect.php";
include "includes/header.php";
include "includes/navbar.php";

// if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
?>

<!-- Main Page Stylesheet -->
<link rel="stylesheet" href="css/main.css">

<html>

<!-- HOME SECTION -->
<section class="home-section" id="home">
    <div class="home-section-container">
        <div class="bg-image">
            <img src="design/barbers-2.jpg" alt="Snow" style="width:100%;">
        </div>

        <div class="bg-text card-header text-center"> Hi,
            <?php
            if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
                echo $_SESSION['username'];
            } else {
                echo "Customer";
            }
            ?>

            <span class="overlay-text text-center">
                - Welcome to Twin & Dad Barbershop, Kota Bharu
                <br><br>
                It's Not Just a Haircut, It's an Experience.
                <br>
                - Quality Over Quantity -
                <br><br>
                Our Booking Policy :
                <br>
                <div class="text-start pl-5">
                    1) Booking early a day
                    <br>
                    2) Just 3 barbers only set in booking system
                    <br>
                    3) 4 barbers are available for customer walk-in. So you can walk-in if not available in system
                    <br>
                    4) Contact Us if want to cancellation booking
                    <br>
            </span>
        </div>
        <div class="d-grid gap-2 mt-5">
            <a class="btn btn-light btn-lg" href="booking.php">BOOK NOW</a>
        </div>

    </div>
    <div>
</section>

<!-- PRICING SECTION  -->

<section class="pricing_section" id="pricing">


    <div class="grid-container mb-5">
        <div class="section_heading">
            <h3 style="color: whitesmoke; ">Men's Grooming Services</h3>
            <!-- <h2>Our Barber Pricing</h2> -->
            <div class="heading-line"></div>
        </div>
        <div class="row m-5">
            <?php
            $sql = "SELECT * FROM services";
            $result = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            while ($service =  mysqli_fetch_assoc($result)) {
            ?>

                <div class="col-sm-6 col-md-3 col-lg-2 d-flex justify-content-center mb-4">
                    <div class="card border-secondary shadow-lg" style="width: 18rem;">
                        <img src="design/services.jpg" class="card-img-top rounded mx-auto d-block" alt="Service Image">
                        <div class="card-body text-center text-dark">
                            <h5 class="card-title font-weight-bold">
                                <?php echo $service['service_name']; ?>
                            </h5>
                            <p class="card-text text-muted">RM <?php echo $service['service_price']; ?></p>
                            <p class="card-text text-muted"><?php echo $service['service_duration']; ?> min</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- STYLE for SERVICES SECTION -->
<style>
    * {
        box-sizing: border-box;
    }

    .gallery .column {
        float: left;
        width: 25%;
        padding: 15px;
    }

    /* Clearfix (clear floats) */
    .gallery::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

<!-- SERVICES SECTION -->
<section class="service-section" id="service">

    <div class="section_heading ">
        <h3>Our Gallery</h3>
    </div>

    <div class="row">

        <?php
        $sql = "SELECT * FROM services";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($row as $services) {
        ?>
            <!-- <div class="col-lg-4 col-md-6 sm-padding">
                        <div class="price_wrap">
                            <ul class="price_list">
                                <li>
                                    <h5><?php echo $services['service_name'] ?></h5>
                                    <p><?php echo $services['service_desc'] ?></p>
                                    <span class="price">RM<?php echo $services['service_price'] ?></span>
                                </li>
                            </ul>
                        </div>
                    </div> -->
            <!-- <div class="card m-3 g-col-6 " style="width: 18rem;">
                    <img src="design/haircolor.jpg" class="card-img-top" alt="hairstyle">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $services['service_name']; ?></h5>
                        <p class="card-text"> <?php echo $services['service_price']; ?><span class="dot-separator"> . </span><?php echo $services['service_duration']; ?></p>
                        <small><?php echo $services['service_desc']; ?></small>
                    </div>
                </div> -->

    </div>
<?php } ?>

<div class="gallery">
    <div class="column">
        <img src="design/haircolor.jpg" alt="hairstyle" style="width:100%">
    </div>

    <div class="column">
        <img src="design/haircolor-2.jpg" alt="hairstyle" style="width:100%">
    </div>

    <div class="column">
        <img src="design/haircut.jpg" alt="hairstyle" style="width:100%">
    </div>

    <div class="column">
        <img src="design/haircut-2.jpg" alt="hairstyle" style="width:100%">
    </div>

    <div class="column">
        <img src="design/hairperm.jpg" alt="hairstyle" style="width:100%">
    </div>

    <div class="column">
        <img src="design/haircurly.jpg" alt="hairstyle" style="width:100%">
    </div>

    <div class="column">
        <img src="design/hairline.jpg" alt="hairstyle" style="width:100%">
    </div>

    <div class="column">
        <img src="design/mullethair.jpg" alt="hairstyle" style="width:100%">
    </div>
</div>
</section>
<!-- END SERVICES SECTION -->

<!-- START BARBER SECTION -->
<section class="barber-section" id="barber">
    <div class="container">
        <div class="section_heading">
            <h3 style="color: grey;">Our Barbers</h3>
        </div>
        <div class="row">

            <?php
            $sql = "SELECT * FROM barbers";
            $result = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            while ($barber =  mysqli_fetch_assoc($result)) {


            ?>

                <div class="card col border-secondary pt-3 m-auto" style="width: 35%;">
                    <img src="design/barber-team.jpg" class="card-img-top rounded mx-auto d-block" alt="Team Member" style="width: 100%;">
                    <div class="card-body text-center">
                        <h5 class="card-title"> Barber <?php echo $barber['barber_name']; ?></h5>
                        <p class="card-text">Hi our customer, Have a nice dayy </p>
                    </div>
                </div>
            <?php } ?>

            <!-- </div>
                    <ul class="team_members col"> 
                        <li class="barber-info">
                            <div class="team_member">
                                <img src="design/team-1.jpg" alt="Team Member">
                            </div>
                        </li>
                        <li class="barber-info">
                            <div class="team_member">
                                <img src="design/team-2.jpg" alt="Team Member">
                            </div>
                        </li>
                    </ul>
                </div> -->
        </div>

    </div>
</section>
<!-- END BARBER SECTION -->


<!-- START CONTACT US SECTION -->
<section class="contact-section" id="contactus">
    <div class="container ">
        <h2 class="text-uppercase font-weight-bold text-center text-light mb-5">
            Get in touch with us today!
        </h2>
        <div class="row justify-content-center">
            <!-- Business Information -->
            <div class="col-lg-6">
                <h4 class="font-weight-bold text-light mb-4 text-shadow">
                    Twin & Dad Barbershop
                </h4>
                <a href="https://goo.gl/maps/XdmGpwy6BZKyj66U6" class="btn btn-danger mt-3">
                    <i class="fa fa-map-marker"></i> Twin & Dad Barbershop, Jalan Telipot, Kelantan
                </a>
                <!-- Social Media Links -->
                <div class="d-flex justify-content-start mt-4 flex-wrap">
                    <a href="https://www.facebook.com/twinanddad.barbershop" class="bg-light text-primary mx-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="https://wa.me/601139183821?text=Assalamualaikum" class="bg-light text-success mx-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-whatsapp fa-2x"></i>
                    </a>
                    <a href="https://instagram.com/twinanddad.barbershop" class="bg-light text-danger mx-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-instagram fa-2x"></i>
                    </a>
                    <a href="mailto:hr.twinanddadbarbershop@gmail.com" class="bg-light text-dark mx-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-o fa-2x"></i>
                    </a>
                </div>
            </div>

            <!-- Business Hours -->
            <div class="col-lg-6">
                <h4 class="text-center font-weight-bold text-light mb-5">Business Hours</h4>
                <table class="table table-striped table-bordered text-center bg-light">
                    <tbody>
                        <tr>
                            <td>Sunday - Thursday</td>
                            <td>12:00 PM - 9:30 PM</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td><span class="text-danger">Closed</span></td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>12:00 PM - 9:30 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT US SECTION -->

</html>

<!-- PHP INCLUDES -->
<?php
include "includes/footer.php";
?>