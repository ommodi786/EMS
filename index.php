<?php
session_start();
//datbase connection file
include('includes/config.php');
error_reporting(0);
// Code for Email Subscription
if (isset($_POST['subscribe'])) {

    // Getting Post values
    $emailid = $_POST['email'];
    // query for data insertion
    $sql = "INSERT INTO tblsubscriber(UserEmail) VALUES(:emailid)";
    //preparing the query
    $query = $dbh->prepare($sql);
    //Binding the values
    $query->bindParam(':emailid', $emailid, PDO::PARAM_STR);
    //Execute the query
    $query->execute();
    //Check that the insertion really worked
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo "<script>alert('Success : Successfully subscribed');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error : Something went wrong. Please try again');</script>";
    }
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Event Management System | Home Page </title>
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- icofont css -->
    <link rel="stylesheet" href="css/icofont.css">
    <!-- Nivo css -->
    <link rel="stylesheet" href="css/nivo-slider.css">
    <!-- animaton text css -->
    <link rel="stylesheet" href="css/animate-text.css">
    <!-- Metrial iconic fonts css -->
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- color css -->
    <link href="css/color/skin-default.css" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
    .slider {
        width: 100%;
        height: 100vh;
    }

    .swiper {
        width: 100%;
        height: 100vh;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #000;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100vh;
        object-fit: cover;
    }

    .autoplay-progress {
        position: absolute;
        right: 16px;
        bottom: 16px;
        z-index: 10;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: var(--swiper-theme-color);
    }

    .autoplay-progress svg {
        --progress: 0;
        position: absolute;
        left: 0;
        top: 0px;
        z-index: 10;
        width: 100%;
        height: 100%;
        stroke-width: 4px;
        stroke: var(--swiper-theme-color);
        fill: none;
        stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
        stroke-dasharray: 125.6;
        transform: rotate(-90deg);
    }

    .card-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        max-width: 1250px;
        margin: 150px auto;
        padding: 20px;
        gap: 20px;
    }

    .card-list .card-item {
        background: #fff;
        padding: 26px;
        border-radius: 8px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.04);
        list-style: none;
        cursor: pointer;
        text-decoration: none;
        border: 2px solid transparent;
        transition: border 0.5s ease;
    }

    .card-list .card-item:hover {
        border: 2px solid #000;
    }

    .card-list .card-item img {
        width: 100%;
        aspect-ratio: 16/9;
        border-radius: 8px;
        object-fit: cover;
    }

    .card-list span {
        display: inline-block;
        background: #F7DFF5;
        margin-top: 32px;
        padding: 8px 15px;
        font-size: 0.75rem;
        border-radius: 50px;
        font-weight: 600;
    }

    .card-list .developer {
        background-color: #F7DFF5;
        color: #B22485;
    }

    .card-list .designer {
        background-color: #d1e8ff;
        color: #2968a8;
    }

    .card-list .editor {
        background-color: #d6f8d6;
        color: #205c20;
    }

    .card-item h3 {
        color: #000;
        font-size: 1.438rem;
        margin-top: 28px;
        font-weight: 600;
    }

    .card-item .arrow {
        display: flex;
        align-items: center;
        justify-content: center;
        transform: rotate(-35deg);
        height: 40px;
        width: 40px;
        color: #000;
        border: 1px solid #000;
        border-radius: 50%;
        margin-top: 40px;
        transition: 0.2s ease;
    }

    .card-list .card-item:hover .arrow {
        background: #000;
        color: #fff;
    }

    @media (max-width: 1200px) {
        .card-list .card-item {
            padding: 15px;
        }
    }

    @media screen and (max-width: 980px) {
        .card-list {
            margin: 0 auto;
        }
    }
    </style>
</head>

<body>


    <!--slider header area are start-->
    <?php include_once('includes/header.php'); ?>
    <div class="slider">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="img/slider/hero1.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="img/slider/hero2.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="img/slider/hero3.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="img/slider/hero4.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="img/slider/hero5.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="img/slider/hero6.jpg" alt="">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
        </div>

    </div>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        on: {
            autoplayTimeLeft(s, time, progress) {
                progressCircle.style.setProperty("--progress", 1 - progress);
                progressContent.textContent = `${Math.ceil(time / 1000)}s`;
            }
        }
    });
    </script>

    <!--up comming events area-->
    <div class="col-lg-12">
        <h1 class="section-title">Up Comming Events</h1>
    </div>
    <div class="card-list">
        <?php
        // Fetching Upcomong events
        $isactive = 1;
        $sql = "SELECT EventName,EventLocation,EventStartDate,EventEndDate,EventImage,id from tblevents where IsActive=:isactive order by id desc limit 5";
        $query = $dbh->prepare($sql);
        $query->bindParam(':isactive', $isactive, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $row) {
        ?>
        <a href="event-details.php?evntid=<?php echo htmlentities($row->id); ?>" class="card-item">
            <img src="admin/eventimages/<?php echo htmlentities($row->EventImage); ?>"
                alt="<?php echo htmlentities($row->EventName); ?>" alt="Card Image">
            <span class="developer">
                <?php echo htmlentities($row->EventStartDate); ?>
                To
                <?php echo htmlentities($row->EventEndDate); ?>
            </span>
            <h3><?php echo htmlentities($row->EventName); ?></h3>
            <h3>Location : <?php echo htmlentities($row->EventLocation); ?></h3>
            <div class="arrow">
                <i class="fas fa-arrow-right card-icon"></i>
            </div>
        </a>
        <?php }
        } ?>

    </div>

    <!--up comming events area-->


    <!--Counter area start-->
    <div class="counter-area pb150">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="img/icon/count-01.png" alt="">
                        </div>
                        <h3><span class="counter2">50</span></h3>
                        <p>+ Events</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="img/icon/count-02.png" alt="">
                        </div>
                        <h3><span class="counter2">19</span></h3>
                        <p>+ Location</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="img/icon/count-03.png" alt="">
                        </div>
                        <h3><span class="counter2">12</span></h3>
                        <p>+ Newtwork</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="img/icon/count-04.png" alt="">
                        </div>
                        <h3><span class="counter2">90</span></h3>
                        <p>+ Countries</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="img/icon/count-05.png" alt="">
                        </div>
                        <h3><span class="counter2">5</span></h3>
                        <p>Live Telecast</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-12">
                    <div class="single-count text-center uppercase">
                        <div class="count-icon">
                            <img src="img/icon/count-06.png" alt="">
                        </div>
                        <h3><span class="counter2">200</span></h3>
                        <p>+Idea</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Counter area end-->





    <!--call to action area start-->
    <div class="call-to-action bg-overlay white-overlay pb100 pt85">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cal-to-wrap">
                        <h1 class="section-title">Enter Your Email Address For Events & News</h1>
                        <form method="post" name="subscribe">
                            <div class="input-box">
                                <input type="email" placeholder="Enter your E-mail Address" class="info" name="email"
                                    required="true">
                                <button type="submit" name="subscribe" class="send-btn"><i
                                        class="zmdi zmdi-mail-send"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--call to action area End-->

    <!--information area are start-->
    <?php include_once('includes/footer.php'); ?>
    <!--footer area are start-->
    </div>
    <!--body-wraper-are-end-->

    <!--==== all js here====-->
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- Nivo js -->
    <script src="js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    <script src="js/nivo-slider/nivo-active.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- Vedio js -->
    <script src="js/video.js"></script>
    <!-- Youtube Background JS -->
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <!-- datepicker js -->
    <script src="js/bootstrap-datepicker.js"></script>
    <!-- waypoint js -->
    <script src="js/waypoints.min.js"></script>
    <!-- onepage nav js -->
    <script src="js/jquery.nav.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
    <script src="js/google-map.js"></script>
    <!-- animate text JS -->
    <script src="js/animate-text.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
</body>

</html>