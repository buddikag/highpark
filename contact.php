<?php
// Include email configuration and SMTP mailer
require_once 'includes/email_config.php';
require_once 'includes/smtp_mailer.php';

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message_text = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Validation
    if (empty($name) || empty($email) || empty($subject) || empty($message_text)) {
        $message = 'Please fill in all required fields.';
        $messageType = 'error';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
        $messageType = 'error';
    } else {
        // Prepare email
        $to = CONTACT_EMAIL;
        $email_subject = 'Contact Form Inquiry - High Park Hotel';
        
        // Map subject values to readable text
        $subject_map = [
            'booking' => 'Room Booking',
            'spa' => 'Wellness Center Services',
            'restaurant' => 'Restaurant Inquiry',
            'facilities' => 'Facilities & Amenities',
            'general' => 'General Inquiry',
            'other' => 'Other'
        ];
        $subject_display = isset($subject_map[$subject]) ? $subject_map[$subject] : ucfirst($subject);
        
        $email_body = "New Contact Form Inquiry\n\n";
        $email_body .= "Contact Details:\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        if (!empty($phone)) {
            $email_body .= "Phone: " . $phone . "\n";
        }
        $email_body .= "Subject: " . $subject_display . "\n\n";
        $email_body .= "Message:\n" . $message_text . "\n";
        
        // Initialize SMTP Mailer
        $mailer = new SMTPMailer(
            SMTP_HOST,
            SMTP_PORT,
            SMTP_USERNAME,
            SMTP_PASSWORD,
            SMTP_FROM_EMAIL,
            SMTP_FROM_NAME
        );
        
        // Send email via SMTP
        if ($mailer->send($to, $email_subject, $email_body, $email)) {
            $message = 'Thank you for your message! We will get back to you soon.';
            $messageType = 'success';
            // Clear form data
            $name = $email = $phone = $subject = $message_text = '';
        } else {
            $message = 'Sorry, there was an error sending your message. Please try again or contact us directly at +94 777 204 519.';
            $messageType = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>

    <title>Contact Us | High Park Hotel - Nilaveli Beach, Trincomalee</title>
    <meta name="description" content="Contact High Park Hotel in Nilaveli Beach, Trincomalee. Get in touch for bookings, inquiries, or visit us at our beachfront location. Find us on Google Maps.">
    <meta name="keywords" content="contact High Park Hotel, Nilaveli hotel contact, Trincomalee hotel booking, High Park Hotel address, hotel phone number">
    <link rel="canonical" href="https://highparkhotel.com/contact.php">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://highparkhotel.com/contact.php">
    <meta property="og:title" content="Contact Us | High Park Hotel - Nilaveli Beach, Trincomalee">
    <meta property="og:description" content="Contact High Park Hotel in Nilaveli Beach, Trincomalee for bookings and inquiries.">
    <meta property="og:image" content="https://highparkhotel.com/assets/images/hero-1.jpg">
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
                        alt="Contact Hero Mobile">
                    <img src="assets/images/hero-1.jpg"
                        class="w-100 d-none d-md-block object-fit-cover slider-image"
                        alt="Contact Hero Desktop">
                    <div class="position-absolute bottom-0 start-0 w-100 text-white py-4 px-4" style="background: linear-gradient(to top, rgba(1, 17, 31, 0.8), transparent);">
                        <h1 class="heading mb-0 text-white">Contact <span class="blue-text">Us</span></h1>
                        <p class="text-center mb-0 mt-2" style="font-size: 1.5rem; font-weight: 300;">Get in Touch with High Park Hotel</p>
                    </div>
                </div>
            </section>

            <!-- Contact Information Section -->
            <section class="container px-4 section_container" style="padding-top: 80px;">
                <h1 class="heading reveal">Get in <span class="blue-text">Touch</span></h1>
                        <p class="text-center w-75 mx-auto mt-4 mb-5 reveal">We're here to help you plan your perfect stay at High Park Hotel. Whether you have questions about our rooms, Wellness Center services, restaurant, or need assistance with your booking, our team is ready to assist you. Reach out to us through any of the following ways.</p>
                
                <div class="row g-4 g-lg-5 mt-4">
                    <div class="col-12 col-md-6 col-lg-4 reveal delay-1">
                        <div class="spa-feature-card text-center">
                            <div class="spa-feature-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <h3 class="spa-feature-title">Our Address</h3>
                            <p class="spa-feature-text">Nilaveli-01,<br>Trincomalee,<br>Sri Lanka</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 reveal delay-2">
                        <div class="spa-feature-card text-center">
                            <div class="spa-feature-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <h3 class="spa-feature-title">Call Us</h3>
                            <p class="spa-feature-text">
                                <a href="tel:+94777204519" class="text-decoration-none">+94 777 204 519</a><br>
                                <span style="font-size: 0.9rem;">+94 262 232 466</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 reveal delay-3">
                        <div class="spa-feature-card text-center">
                            <div class="spa-feature-icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <h3 class="spa-feature-title">Email Us</h3>
                            <p class="spa-feature-text">
                                <a href="mailto:info@highparkhotel.com" class="text-decoration-none">info@highparkhotel.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 reveal delay-4">
                        <div class="spa-feature-card text-center">
                            <div class="spa-feature-icon">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <h3 class="spa-feature-title">WhatsApp</h3>
                            <p class="spa-feature-text">
                                <a href="tel:+94777204519" class="text-decoration-none">+94 777 204 519</a><br>
                                <span style="font-size: 0.9rem;">+44 793 206 3398</span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Form & Map Section -->
            <section class="container px-4 section_container">
                <div class="row g-4 g-lg-5 align-items-start">
                    <!-- Contact Form -->
                    <div class="col-12 col-lg-6 reveal">
                        <h2 class="sub-heading1 mb-4">Send Us a <span class="blue-text">Message</span></h2>
                        <p class="mb-4">Fill out the form below and we'll get back to you as soon as possible. For immediate assistance, please call us directly.</p>
                        
                        <?php if ($message): ?>
                            <div class="alert alert-<?php echo $messageType === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                                <?php echo htmlspecialchars($message); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="" id="contactForm" class="contact-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                <select class="form-control" id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="booking" <?php echo (isset($subject) && $subject === 'booking') ? 'selected' : ''; ?>>Room Booking</option>
                                    <option value="spa" <?php echo (isset($subject) && $subject === 'spa') ? 'selected' : ''; ?>>Wellness Center Services</option>
                                    <option value="restaurant" <?php echo (isset($subject) && $subject === 'restaurant') ? 'selected' : ''; ?>>Restaurant Inquiry</option>
                                    <option value="facilities" <?php echo (isset($subject) && $subject === 'facilities') ? 'selected' : ''; ?>>Facilities & Amenities</option>
                                    <option value="general" <?php echo (isset($subject) && $subject === 'general') ? 'selected' : ''; ?>>General Inquiry</option>
                                    <option value="other" <?php echo (isset($subject) && $subject === 'other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="5" required><?php echo isset($message_text) ? htmlspecialchars($message_text) : ''; ?></textarea>
                            </div>
                            <button type="submit" class="btn-booking w-100">Send Message</button>
                        </form>
                    </div>

                    <!-- Google Maps -->
                    <div class="col-12 col-lg-6 reveal delay-1">
                        <h2 class="sub-heading1 mb-4">Find Us on <span class="blue-text">Google Maps</span></h2>
                        <p class="mb-4">Visit us at our beautiful beachfront location in Nilaveli, Trincomalee. Click on the map to get directions.</p>
                        
                        <div class="map-container" style="position: relative; width: 100%; height: 450px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            <!-- 
                                To get the embed code:
                                1. Open https://maps.app.goo.gl/ufAaFWV5dcjZUHgv6
                                2. Click "Share" button
                                3. Select "Embed a map" tab
                                4. Copy the iframe src URL and replace the src below
                            -->
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.1234567890123!2d81.23456789012345!3d8.567890123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMzQnMDQuNCJOIDgxwrAxNCcwNC40IkU!5e0!3m2!1sen!2slk!4v1234567890123!5m2!1sen!2slk"
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                title="High Park Hotel Location">
                            </iframe>
                            <div class="map-overlay" style="position: absolute; top: 10px; right: 10px; z-index: 10;">
                                <a href="https://maps.app.goo.gl/ufAaFWV5dcjZUHgv6" target="_blank" class="btn btn-light btn-sm" style="box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                    <i class="bi bi-arrow-up-right-square"></i> Open in Maps
                                </a>
                            </div>
                        </div>
                        <p class="mt-3 text-center" style="font-size: 0.85rem; color: #666;">
                            <i class="bi bi-info-circle"></i> To get the exact embed code, open the map link above, click "Share" → "Embed a map", and replace the iframe src in the code.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Additional Contact Info Section -->
            <section class="container px-4 section_container">
                <div class="row g-4">
                    <div class="col-12 col-md-6 reveal">
                        <h2 class="sub-heading1 mb-4">Operating <span class="blue-text">Hours</span></h2>
                        <div class="spa-booking-card">
                            <p class="mb-2"><strong>Reception:</strong> 24/7</p>
                            <p class="mb-2"><strong>Wellness Center Services:</strong> Daily 9:00 AM - 8:00 PM</p>
                            <p class="mb-2"><strong>Restaurant:</strong> Daily 7:00 AM - 10:00 PM</p>
                            <p class="mb-0"><strong>Check-in:</strong> 2:00 PM | <strong>Check-out:</strong> 11:00 AM</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 reveal delay-1">
                        <h2 class="sub-heading1 mb-4">Quick <span class="blue-text">Contact</span></h2>
                        <div class="spa-booking-card">
                            <p class="mb-3">For immediate assistance or to make a reservation, call us directly:</p>
                            <a href="tel:+94777204519" class="btn-booking w-100 text-center d-block mb-3">Call Now: +94 777 204 519</a>
                            <p class="mb-0 text-center" style="font-size: 0.9rem;">We're available 24/7 to assist you</p>
                        </div>
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
                                <h1 class="display-5 fw-bold text-white m-0 ps-3">Ready to Book Your <br class="d-block d-md-none d-lg-block">Stay?</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center p-4 p-lg-5 banner-cta">
                        <h1 class="text-center text-md-start text-white"><span class="fw-light">Contact us now</span><br><a href="tel:+94777204519" class="text-white text-decoration-none"><strong>+94 777 204 519</strong></a></h1>
                    </div>
                </div>
            </section>

        </main>

        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>

        <!-- Move to Top Button -->
        <button id="moveToTop" class="btn">
            <i class="bi bi-arrow-up"></i>
        </button>

    </div>

    <script>
        // Scroll to form message if there's an alert
        <?php if ($message): ?>
        window.addEventListener('load', function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
        <?php endif; ?>
    </script>

</body>

</html>

