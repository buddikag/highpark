<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>

    <title>High Park Hotel | Rooms</title>
</head>

<body>

    <div class="page-wrapper">
        <!-- Header -->
        <?php include 'includes/header.php'; ?>

        <main class="main-content">

            <!-- Hero Section -->
            <section class="container-fluid p-0 position-relative">
                <img src="assets/images/logo.png" alt="Logo" class="hero-logo">
                <div class="position-relative">
                    <img src="assets/images/hero-mobile-1.jpg"
                        class="w-100 d-block d-md-none object-fit-cover slider-image"
                        alt="Rooms Hero Mobile">
                    <img src="assets/images/hero-1.jpg"
                        class="w-100 d-none d-md-block object-fit-cover slider-image"
                        alt="Rooms Hero Desktop">
                    <div class="position-absolute bottom-0 start-0 w-100 text-white py-4 px-4" style="background: linear-gradient(to top, rgba(1, 17, 31, 0.8), transparent);">
                        <h1 class="heading mb-0 text-white">Our <span class="blue-text">Rooms</span></h1>
                    </div>
                </div>
            </section>

            <!-- Introduction Section -->
            <section class="container px-4 section_container" style="padding-top: 80px;">
                <h1 class="heading reveal">Something for <span class="blue-text">Everyone</span></h1>
                <p class="text-center w-75 mx-auto mt-4 mb-5 reveal">At High Park Hotel, we believe every guest deserves the perfect accommodation. Our five distinct room categories are thoughtfully designed to cater to different preferences, group sizes, and budgets. From cozy standard rooms to luxurious suites and beachfront cabanas, find your ideal beachfront escape.</p>
            </section>

            <!-- Rooms Section -->
            <section class="container px-4 section_container">
                
                <!-- Standard Rooms -->
                <div class="room-category-section mb-5 reveal">
                    <h2 class="sub-heading1 mb-4">Standard <span class="blue-text">Rooms</span></h2>
                    <div class="room-slider-wrapper">
                        <div id="standardCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/16.jpg" class="d-block w-100 room-slider-image" alt="Standard Room 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/17.jpg" class="d-block w-100 room-slider-image" alt="Standard Room 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/18.jpg" class="d-block w-100 room-slider-image" alt="Standard Room 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/19.jpg" class="d-block w-100 room-slider-image" alt="Standard Room 4">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#standardCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#standardCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="room-category-description mt-4">
                        <p class="text-center">Comfortable and well-appointed standard rooms with modern amenities. Perfect for couples or solo travelers seeking quality accommodation at great value.</p>
                    </div>
                </div>

                <!-- Duplex Rooms -->
                <div class="room-category-section mb-5 reveal">
                    <h2 class="sub-heading1 mb-4">Duplex <span class="blue-text">Rooms</span></h2>
                    <div class="room-slider-wrapper">
                        <div id="duplexCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                               
                                <div class="carousel-item active">
                                    <img src="assets/images/22.jpg" class="d-block w-100 room-slider-image" alt="Duplex Room 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/24.jpg" class="d-block w-100 room-slider-image" alt="Duplex Room 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/25.jpg" class="d-block w-100 room-slider-image" alt="Duplex Room 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/26.jpg" class="d-block w-100 room-slider-image" alt="Duplex Room 5">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/27.jpg" class="d-block w-100 room-slider-image" alt="Duplex Room 6">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/47.jpg" class="d-block w-100 room-slider-image" alt="Duplex Room 7">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/48.jpg" class="d-block w-100 room-slider-image" alt="Duplex Room 8">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#duplexCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#duplexCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="room-category-description mt-4">
                        <p class="text-center">Spacious two-level accommodations perfect for families or groups. Features comfortable living spaces with modern amenities and enhanced privacy.</p>
                    </div>
                </div>

                <!-- Beach Rooms -->
                <div class="room-category-section mb-5 reveal">
                    <h2 class="sub-heading1 mb-4">Beach <span class="blue-text">Rooms</span></h2>
                    <div class="room-slider-wrapper">
                        <div id="beachCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/44.jpg" class="d-block w-100 room-slider-image" alt="Beach Room 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/46.jpg" class="d-block w-100 room-slider-image" alt="Beach Room 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/49.jpg" class="d-block w-100 room-slider-image" alt="Beach Room 3">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#beachCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#beachCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="room-category-description mt-4">
                        <p class="text-center">Premium beachfront accommodation with stunning ocean views. Wake up to the sound of waves and enjoy breathtaking sunsets from your room.</p>
                    </div>
                </div>

                <!-- Suite Rooms -->
                <div class="room-category-section mb-5 reveal">
                    <h2 class="sub-heading1 mb-4">Suite <span class="blue-text">Rooms</span></h2>
                    <div class="room-slider-wrapper">
                        <div id="suiteCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/15.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 1">
                                </div>

                                <div class="carousel-item">
                                    <img src="assets/images/50.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/51.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 4">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/52.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 5">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/45.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 6">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/53.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 7">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/54.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 8">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/55.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 9">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/56.jpg" class="d-block w-100 room-slider-image" alt="Suite Room 10">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#suiteCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#suiteCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="room-category-description mt-4">
                        <p class="text-center">Luxurious suite accommodations with premium amenities and spacious layouts. Perfect for those seeking the ultimate comfort and elegance during their stay.</p>
                    </div>
                </div>

                <!-- Cabana -->
                <div class="room-category-section mb-5 reveal">
                    <h2 class="sub-heading1 mb-4">Cabana</h2>
                    <div class="room-slider-wrapper">
                        <div id="cabanaCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/58.jpg" class="d-block w-100 room-slider-image" alt="Cabana 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/59.jpg" class="d-block w-100 room-slider-image" alt="Cabana 2">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/60.jpg" class="d-block w-100 room-slider-image" alt="Cabana 3">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/61.jpg" class="d-block w-100 room-slider-image" alt="Cabana 4">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#cabanaCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#cabanaCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="room-category-description mt-4">
                        <p class="text-center">Relax in our charming cabana rooms, offering a cozy retreat with comfortable accommodations. Perfect for couples seeking a romantic beachfront getaway.</p>
                    </div>
                </div>

            </section>

            <!-- Call to Action Section -->
            <section class="container-fluid reveal section_container">
                <div class="row g-0">
                    <div class="col-12 col-md-7 py-4 d-flex align-items-center justify-content-center banner-bg">
                        <div class="row g-0">
                            <div class="col-12 col-md-4 p-0 d-flex align-items-center justify-content-center">
                                <img src="assets/images/offer.png" class="img-fluid">
                            </div>
                            <div class="col-12 col-md-8 p-0 d-flex align-items-center justify-content-center text-center text-md-start">
                                <h1 class="display-5 fw-bold text-white m-0 ps-3">Book 6 Nights and <br class="d-block d-md-none d-lg-block">Get 1 Night Free</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center p-4 p-lg-5 banner-cta">
                        <h1 class="text-center text-md-start text-white"><span class="fw-light">Book now before it's too late! Contact Kurupa at</span><br><a href="tel:+94777204519" class="text-white text-decoration-none"><strong>+94 777 204 519</strong></a></h1>
                    </div>
                </div>
            </section>

            <!-- Booking Section -->
            <section class="container d-flex flex-column align-items-center reveal section_container">
                <h1 class="extra-heading px-2 px-md-0 mb-4">Find your perfect room and start your beachfront adventure today.</h1>
                <a href="" class="btn-booking">Check for Availability and Book</a>
            </section>

        </main>


        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>

        <!-- Move to Top Button -->
        <button id="moveToTop" class="btn">
            <i class="bi bi-arrow-up"></i>
        </button>

    </div>

</body>

</html>