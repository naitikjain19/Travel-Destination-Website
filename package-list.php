<?php
session_start();
error_reporting(1);
include('config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>TMS | Package List</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <!-- <link href="css/font-awesome.css" rel="stylesheet"> -->
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
</head>

<body>
    <section class="header">
        <div class="container">
            <img src="./images/logo.jpg">
            <a href="login.php"><button type="button" onclick="toggle()" class="login-btn" id="login-btn">Login</button></a>
            <a href="register.php"><button type="button" onclick="toggle()" class="login-btn" id="login-btn">Register</button></a>
            <a href="package-list.php"><button type="button" onclick="toggle()" class="login-btn" id="login-btn">All Packages</button></a>
            <button type="button" onclick="toggle()" class="login-btn" id="login-btn">Contact</button>
            <button type="button" onclick="toggle()" class="login-btn" id="login-btn">About Us</button>
            <a href="index.html"><button type="button" onclick="toggle()" class="login-btn" id="login-btn">Home</button></a>

        </div>
    </section>
    <!--- banner ---->
    <section class="body">
        <div class="banner-3">
            <div class="container">
                <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> TMS- Package List</h1>
            </div>
        </div>
        <!--- /banner ---->
        <!--- rooms ---->
        <div class="rooms">
            <div class="container">

                <div class="room-bottom">
                    <h3>Package List</h3>


                    <?php $sql = "SELECT * from tbltourpackages";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) {    ?>
                            <div class="rom-btm">
                                <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                                    <img src="pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
                                    <h4>Package Name: <?php echo htmlentities($result->PackageName); ?></h4>
                                    <h6>Package Type : <?php echo htmlentities($result->PackageType); ?></h6>
                                    <p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
                                    <p><b>Features</b> <?php echo htmlentities($result->PackageFetures); ?></p>
                                </div>
                                <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
                                    <h5>USD <?php echo htmlentities($result->PackagePrice); ?></h5>
                                    <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="view">Details</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                    <?php }
                    } ?>



                </div>
            </div>
        </div>
    </section>

</body>

</html>