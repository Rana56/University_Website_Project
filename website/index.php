<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>Aston University - Events</title>

    <script src="js/navigation.js"></script>
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="css/headers.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <!--header-->
    <?php
        include("php/header.php")
    ?>

    <!--Carousel, slide: transition and animation effect, data-ride: animates carousel when page loads-->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <!--Indicators are the little dots at the bottom of the slide-->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <!--Wrapper for sildes-->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/main/football.jpg" alt="Sports">

                <!--Heading and other text-->
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Participate in sport activities.</h1>
                        <p>Come join a range of activities that'll be sure to make you have fun and active.</p>
                        <p><a class="btn btn-lg btn-primary" href="events.php">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/main/talk.jpeg" alt="Talk">

                <div class="container">
                    <div class="carousel-caption">
                        <h1>Relax and have fun with our other events.</h1>
                        <p>From live music to talks, an enjoyable place to be in.</p>
                        <p><a class="btn btn-lg btn-primary" href="events.php">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/main/art.jpg" alt="Arts">

                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Have a look around the arts.</h1>
                        <p>We have a beautiful collection of arts that you wouldn't want to miss.</p>
                        <p><a class="btn btn-lg btn-primary" href="events.php">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!--Left and right controls-->
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">

        <!--FEATURETTES -->
        <div class="row featurette text-center">
            <div class="col-md-12">
                <h2 class="main-featurette-heading">Aston Festival.</h2>
                <p class="lead">We welcome you to our Aston Festival 2021! Come join us and have a look at all the attractions we have to offer. It's a fun and exciting event to be part of, so why not bring your friends and family along too. We've got a packed schedule of events that will definitely have something in store for you. </p>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Sports. <span class="muted">Be competitive.</span></h2>
                <p class="lead">We have plenty of sports events organised for you, such as football, tennis and volleyball. There will definitely be events that will suit your needs, so why not come and participate? Have fun while playing and meet new people. It doesn't get better than that.</p>
            </div>
            <div class="col-md-5">
                <img src="images/main/tennis.jpg" alt="tennis">

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Cultures. <span class="muted">See it for yourself.</span></h2>
                <p class="lead">Have a look at our outstanding arts and crafts created and curated by our talented students and staff. Of course, you can create your masterpiece as well. Not only that, but you can experience the remarkable historical and theatrical works too! </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="images/main/theatre.jpg" alt="theatre">

            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Others. <span class="muted">What else is there to do?</span></h2>
                <p class="lead">The fun and enjoyment don't stop there. We have talks, live music and many more lined up for you! Whether you want to learn, sing or dance, all of these great activities are waiting for you at the Aston Festival. What more could one ask?</p>
            </div>
            <div class="col-md-5">
                <img src="images/main/guitar.jpg" alt="Music">

            </div>
        </div>

        <hr class="featurette-divider">
    </div>

    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Back to top</a></p>
        <p><img src="images/logo.png" width="40" height="40"  alt="icon" id="logo"> - 2021 - Built by Chirag Rana</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
