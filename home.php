<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo.svg" />
</head>


<body>

    <div class="container">
        <div class="row">
            <?php include "header.php" ?>
            <hr />

            <div class="col-12 justify-content-center">
                <div class="row mb-3">
                    <div class="offset-4 offset-lg-1 col-lg-1 logo" style="height: 60px;"></div>

                    <div class="col-12 col-lg-6">
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" />

                            <select class="form-select" style="max-width:250px;">
                                <option value="0">All Categories</option>
                                <option value="1">Smart Phones</option>
                                <option value="2">Laptops</option>
                                <option value="3">Cameras</option>
                                <option value="4">Drone</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-lg-2 d-grid">
                        <button class="btn btn-primary mt-3 mb-3" type="button">Search</button>
                    </div>

                    <div class="col-12 col-lg-2 mt-2 mt-lg-4 text-center text-lg-start">
                        <a href="#" class="text-decoration-none link-secondary fw-bold">Advanced</a>

                    </div>

                </div>

                <hr />
                <div class="col-12" id="basicSearchResult">

                    <div class="row">

                        <!-- carousal -->
                        <div id="carouselExampleCaptions" class="offset-2 col-8 carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <img src="resources/slider images/posterimg.jpg" class="d-block poster-img-1"/>
                                    <div class="carousel-caption d-none d-md-block poster-caption">
                                        <h5 class="poster-titel" >Welcome to eShop</h5>
                                        <p class="poster-txt" >The World's Best Online Store By One Click.</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="resources/slider images/posterimg2.jpg" class="d-block poster-img-1" />
                                    
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="resources/slider images/posterimg3.jpg" class="d-block poster-img-1" >
                                    <div class="carousel-caption d-none d-md-block poster-caption-1">
                                        <h5 class="poster-titel">Be Free.....</h5>
                                        <p class="poster-txt">Experience the lowest Delivery cost with us</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- carousal -->

                    </div>

                </div>

                <?php include "footer.php" ?>
            </div>

        </div>



        <script src="script.js"></script>

</body>

</html>