<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>

    <title>High Park Hotel</title>
</head>

<body>

    <div class="page-wrapper">
        <!-- Header -->
        <?php include 'includes/header.php'; ?>

        <main class="main-content">

            <!-- Hero Section -->
            <section class="container-fluid p-0 position-relative">
                <img src="assets/images/logo.png" alt="Logo" class="hero-logo">

                <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <img src="assets/images/hero-mobile-1.jpg"
                                class="w-100 d-block d-md-none object-fit-cover slider-image"
                                alt="Hero Mobile 1">

                            <img src="assets/images/hero-1.jpg"
                                class="w-100 d-none d-md-block object-fit-cover slider-image"
                                alt="Hero Desktop 1">
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="assets/images/hero-mobile-2.jpg"
                                class="w-100 d-block d-md-none object-fit-cover slider-image"
                                alt="Hero Mobile 2">

                            <img src="assets/images/hero-2.jpg"
                                class="w-100 d-none d-md-block object-fit-cover slider-image"
                                alt="Hero Desktop 2">
                        </div>

                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="assets/images/hero-mobile-3.jpg"
                                class="w-100 d-block d-md-none object-fit-cover slider-image"
                                alt="Hero Mobile 3">

                            <img src="assets/images/hero-3.jpg"
                                class="w-100 d-none d-md-block object-fit-cover slider-image"
                                alt="Hero Desktop 3">
                        </div>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </section>

            <!-- Banner Section -->
            <section class="container-fluid p-0 reveal section_container">
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
                        <h1 class="text-center text-md-start text-white"><span class="fw-light">Book now before it’s too late! Contact Kurupa at</span><br><strong>+94 777 514 979</strong></h1>
                    </div>
            </section>

            <!-- Why Stay Section -->
            <section class="container px-4 section_container">
                <h1 class="heading reveal">Why Stay at <span class="blue-text">High Park Hotel</span></h1>
                <div class="row g-4 g-lg-5">
                    <div class="col-12 col-md-6 col-lg-4 order-1 reveal delay-1">
                        <h2 class="sub-heading2 my-4">Direct Beach Access</h2>
                        <div class="feature-card">
                            <img src="assets/images/card-1.jpg" class="img-fluid w-100">
                            <p>High Park Hotel offers direct beach access with a wide, open beachfront just steps from your room. Wake to ocean views, stroll straight onto soft sands, and enjoy uninterrupted sea breezes. Perfect for sunset walks, morning swims, and a truly relaxing seaside escape.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-2 order-md-3 order-lg-2 reveal delay-2">
                        <h2 class="sub-heading2 my-4">Relaxing Outdoor Garden</h2>
                        <div class="feature-card">
                            <img src="assets/images/card-2.jpg" class="img-fluid w-100">
                            <p>High Park Hotel features a spacious, beautifully landscaped garden designed for relaxation and leisure. Enjoy peaceful walks, open green spaces, and fresh air throughout the day. The garden offers the perfect setting for unwinding, outdoor dining, and quiet moments surrounded by nature.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 order-3 order-md-2 order-lg-3 reveal delay-3">
                        <h2 class="sub-heading2 my-4">Healing Spa Therapies</h2>
                        <div class="feature-card">
                            <img src="assets/images/card-3.png" class="img-fluid w-100">
                            <p>Experience complete relaxation with our in-house Healing Spa Therapies at High Park Hotel. Rejuvenate your body and mind with carefully curated treatments designed to restore balance, relieve stress, and enhance well-being, all within the comfort and privacy of the hotel.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Room Categories Section -->
            <section class="container p-0 section_container">
                <h1 class="heading px-4 px-md-0 reveal">A <span class="blue-text">Room</span> for Every Stay</h1>
                <h2 class="sub-heading1 reveal">six room categories</h2>
                <p class="text-center w-75 mx-auto mt-4 mb-5 reveal">High Park Hotel features six room categories designed to suit every guest. Choose spacious Duplex Rooms, elegant Suite Rooms, relaxing Cabana Rooms, or comfortable Standard Rooms with AC or non-AC options. For a true coastal escape, our Beach Rooms offer direct access to the sea. Whether you seek luxury, comfort, or simplicity, High Park Hotel has the perfect room for your ideal stay.</p>
                <div class="row g-0 reveal">
                    <div class="col-12 col-md-6"><img src="assets/images/room-1.jpg" class="img-fluid w-100 object-fit-cover"></div>
                    <div class="col-12 col-md-6"><img src="assets/images/room-2.jpg" class="img-fluid w-100 object-fit-cover"></div>
                </div>
            </section>

            <!-- Call to Action Section -->
            <section class="container-fluid reveal section_container">
                <h1 class="heading px-4 px-md-0">Book Your Stay and Indulge in <span class="blue-text">Total Relaxation</span> Today.</h1>
                <h2 class="sub-heading1">Contact +94 777 514 979</h2>
                <div></div>
            </section>

            <section class="container-fluid p-0 position-relative mb-5 reveal">
                <img src="assets/images/testimonials-1.jpg" class="img-fluid w-100 object-fit-cover" style="height: 60vh;">
                <div class="position-absolute bottom-0 start-0 w-100 text-white py-4 testimonial-banner">
                    <h1 class="heading px-2 mt-0 mb-0">What Our Guest Says</h1>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section class="container section_container">
                <div class="row g-3 g-md-5 px-4 px-md-0">

                    <div class="col-12 col-md-4 reveal delay-1">
                        <h5 class="d-flex align-items-center gap-2">
                            <span class="fi fi-at"></span><span class="fw-semibold">Melanie Krawina</span>
                        </h5>
                        <p>
                            We can highly recommend the High Park Hotel! First and foremost, the staff was OUTSTANDING.
                            Super helpful, very friendly .. for example, i had a sore throat and they made me some ayurvedic
                            medicine for all the days and nights
                        </p>
                    </div>

                    <div class="col-12 col-md-4 reveal delay-2">
                        <h5 class="d-flex align-items-center gap-2">
                            <span class="fi fi-lk"></span><span class="fw-semibold">Nafreez Mohamed</span>
                        </h5>
                        <p>
                            The High Park Hotel is a great place to stay. I really enjoyed my stay here.
                            The hotel was clean and beautiful. The rooms were spacious and comfortable.
                        </p>
                    </div>

                    <div class="col-12 col-md-4 reveal delay-3">
                        <h5 class="d-flex align-items-center gap-2">
                            <span class="fi fi-de"></span><span class="fw-semibold">1nilsp</span>
                        </h5>
                        <p>
                            we stayed here for 5 days and it was Amazing, i really dont understand all of these bad reviews,
                            the rooms were amazing and pretty big with direct access to the great pool.
                        </p>
                    </div>

                </div>
            </section>

            <!-- Booking Section -->
            <section class="container d-flex flex-column align-items-center reveal section_container">
                <h1 class="extra-heading px-2 px-md-0 mb-4">Secure your stay today and relax in style and comfort.</h1>
                <a href="" class="btn-booking">Check for Availability and Book </a>
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