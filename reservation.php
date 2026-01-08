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
    $room_type = isset($_POST['room_type']) ? trim($_POST['room_type']) : '';
    $number_of_rooms = isset($_POST['number_of_rooms']) ? trim($_POST['number_of_rooms']) : '';
    $meal_plan = isset($_POST['meal_plan']) ? trim($_POST['meal_plan']) : '';
    $check_in = isset($_POST['check_in']) ? trim($_POST['check_in']) : '';
    $check_out = isset($_POST['check_out']) ? trim($_POST['check_out']) : '';
    $guests = isset($_POST['guests']) ? trim($_POST['guests']) : '';
    $whale_dolphin_watching = isset($_POST['whale_dolphin_watching']) ? 'Yes' : 'No';
    $airport_transfer = isset($_POST['airport_transfer']) ? 'Yes' : 'No';
    $special_requests = isset($_POST['special_requests']) ? trim($_POST['special_requests']) : '';
    
    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($room_type) || empty($number_of_rooms) || empty($meal_plan) || empty($check_in) || empty($check_out) || empty($guests)) {
        $message = 'Please fill in all required fields.';
        $messageType = 'error';
    } else {
        // Prepare email
        $to = RESERVATION_EMAIL;
        $subject = 'Room Reservation Request - High Park Hotel';
        
        $email_body = "New Room Reservation Request\n\n";
        $email_body .= "Guest Details:\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        $email_body .= "Phone: " . $phone . "\n\n";
        $email_body .= "Reservation Details:\n";
        $email_body .= "Room Type: " . $room_type . "\n";
        $email_body .= "Number of Rooms: " . $number_of_rooms . "\n";
        $email_body .= "Meal Plan: " . $meal_plan . "\n";
        $email_body .= "Check-in Date: " . $check_in . "\n";
        $email_body .= "Check-out Date: " . $check_out . "\n";
        $email_body .= "Number of Guests: " . $guests . "\n";
        $email_body .= "Whale/Dolphin Watching: " . $whale_dolphin_watching . "\n";
        $email_body .= "Airport Transfer: " . $airport_transfer . "\n";
        if (!empty($special_requests)) {
            $email_body .= "Special Requests: " . $special_requests . "\n";
        }
        
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
        if ($mailer->send($to, $subject, $email_body, $email)) {
            $message = 'Thank you! Your reservation request has been sent successfully. We will contact you soon.';
            $messageType = 'success';
            // Clear form data
            $name = $email = $phone = $room_type = $number_of_rooms = $meal_plan = $check_in = $check_out = $guests = $whale_dolphin_watching = $airport_transfer = $special_requests = '';
        } else {
            $message = 'Sorry, there was an error sending your reservation request. Please try again or contact us directly at +94 777 204 519.';
            $messageType = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>

    <title>Room Reservation | High Park Hotel - Book Your Stay in Nilaveli</title>
    <meta name="description" content="Book your stay at High Park Hotel in Nilaveli, Trincomalee. Reserve Standard Rooms, Duplex Rooms, Beach Rooms, Suite Rooms, or Cabana accommodations.">
    <meta name="keywords" content="book hotel Nilaveli, hotel reservation Trincomalee, High Park Hotel booking, Nilaveli hotel reservation">
    <link rel="canonical" href="https://highparkhotel.com/reservation.php">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://highparkhotel.com/reservation.php">
    <meta property="og:title" content="Room Reservation | High Park Hotel - Book Your Stay in Nilaveli">
    <meta property="og:description" content="Book your stay at High Park Hotel in Nilaveli, Trincomalee. Reserve your room today.">
    <meta property="og:image" content="https://highparkhotel.com/assets/images/hero-1.jpg">
    
    <!-- Structured Data - ReservationPage -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ReservationPackage",
      "name": "High Park Hotel Room Reservation",
      "description": "Book your stay at High Park Hotel in Nilaveli, Trincomalee",
      "url": "https://highparkhotel.com/reservation.php",
      "provider": {
        "@type": "Hotel",
        "name": "High Park Hotel",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Nilaveli-01",
          "addressLocality": "Trincomalee",
          "addressCountry": "LK"
        }
      }
    }
    </script>
</head>

<body>

    <div class="page-wrapper">
        <!-- Header -->
        <?php include 'includes/header.php'; ?>

        <main class="main-content">

            <!-- Hero Section -->
            <section class="container-fluid p-0 position-relative">
                <div class="position-relative">
                    <img src="assets/images/hero-reservation.jpg"
                        class="w-100 d-block d-md-none object-fit-cover slider-image"
                        alt="Reservation Hero Mobile">
                    <img src="assets/images/hero-reservation.jpg"
                        class="w-100 d-none d-md-block object-fit-cover slider-image"
                        alt="Reservation Hero Desktop">
                    <div class="position-absolute bottom-0 start-0 w-100 text-white py-4 px-4" style="background: linear-gradient(to top, rgba(1, 17, 31, 0.8), transparent);">
                        <h1 class="heading mb-0 text-white">Room <span class="blue-text">Reservation</span></h1>
                    </div>
                </div>
            </section>

            <!-- Success Message Modal Overlay -->
            <?php if ($message && $messageType === 'success'): ?>
                <div id="successModal" class="position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="z-index: 9999; background: rgba(0, 0, 0, 0.5);">
                    <div class="bg-white rounded shadow-lg p-5 mx-3" style="max-width: 500px; width: 100%; animation: fadeIn 0.3s ease-in;">
                        <div class="text-center">
                            <div class="mb-4">
                                <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                            </div>
                            <h2 class="mb-3 text-success">Success!</h2>
                            <p class="mb-4" style="font-size: 1.1rem; color: #333;"><?php echo htmlspecialchars($message); ?></p>
                            <button type="button" class="btn-booking" onclick="closeSuccessModal()">Close</button>
                        </div>
                    </div>
                </div>
                <style>
                    @keyframes fadeIn {
                        from { opacity: 0; transform: scale(0.9); }
                        to { opacity: 1; transform: scale(1); }
                    }
                </style>
            <?php endif; ?>

            <!-- Reservation Form Section -->
            <section class="container px-4 section_container" style="padding-top: 80px;">
                <h1 class="heading reveal">Book Your <span class="blue-text">Stay</span></h1>
                <p class="text-center w-75 mx-auto mt-4 mb-5 reveal">Fill out the form below to request a reservation. We will confirm your booking and contact you shortly.</p>
                
                <?php if ($message && $messageType === 'error'): ?>
                    <div class="alert alert-danger alert-dismissible fade show w-75 mx-auto" role="alert">
                        <?php echo htmlspecialchars($message); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <form method="POST" action="" class="reservation-form reveal">
                            <div class="row g-4">
                                <!-- Guest Information -->
                                <div class="col-12">
                                    <h3 class="mb-3">Guest Information</h3>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
                                </div>
                                
                                <!-- Reservation Details -->
                                <div class="col-12 mt-3">
                                    <h3 class="mb-3">Reservation Details</h3>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="room_type" class="form-label">Room Type <span class="text-danger">*</span></label>
                                    <select class="form-select" id="room_type" name="room_type" required>
                                        <option value="">Select Room Type</option>
                                        <option value="Standard Rooms" <?php echo (isset($room_type) && $room_type === 'Standard Rooms') ? 'selected' : ''; ?>>Standard Rooms</option>
                                        <option value="Duplex Rooms" <?php echo (isset($room_type) && $room_type === 'Duplex Rooms') ? 'selected' : ''; ?>>Duplex Rooms</option>
                                        <option value="Beach Rooms" <?php echo (isset($room_type) && $room_type === 'Beach Rooms') ? 'selected' : ''; ?>>Beach Rooms</option>
                                        <option value="Suite Rooms" <?php echo (isset($room_type) && $room_type === 'Suite Rooms') ? 'selected' : ''; ?>>Suite Rooms</option>
                                        <option value="Cabana" <?php echo (isset($room_type) && $room_type === 'Cabana') ? 'selected' : ''; ?>>Cabana</option>
                                    </select>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="number_of_rooms" class="form-label">Number of Rooms <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="number_of_rooms" name="number_of_rooms" min="1" max="10" value="<?php echo isset($number_of_rooms) ? htmlspecialchars($number_of_rooms) : ''; ?>" required>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="meal_plan" class="form-label">Meal Plan <span class="text-danger">*</span></label>
                                    <select class="form-select" id="meal_plan" name="meal_plan" required>
                                        <option value="">Select Meal Plan</option>
                                        <option value="Room Only" <?php echo (isset($meal_plan) && $meal_plan === 'Room Only') ? 'selected' : ''; ?>>Room Only</option>
                                        <option value="Bed and Breakfast" <?php echo (isset($meal_plan) && $meal_plan === 'Bed and Breakfast') ? 'selected' : ''; ?>>Bed and Breakfast</option>
                                    </select>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="guests" class="form-label">Number of Guests <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="guests" name="guests" min="1" max="10" value="<?php echo isset($guests) ? htmlspecialchars($guests) : ''; ?>" required>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="check_in" class="form-label">Check-in Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="check_in" name="check_in" value="<?php echo isset($check_in) ? htmlspecialchars($check_in) : ''; ?>" required>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="check_out" class="form-label">Check-out Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="check_out" name="check_out" value="<?php echo isset($check_out) ? htmlspecialchars($check_out) : ''; ?>" required>
                                </div>
                                
                                <!-- Additional Services -->
                                <div class="col-12 mt-3">
                                    <h3 class="mb-3">Additional Services</h3>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="whale_dolphin_watching" name="whale_dolphin_watching" value="1" <?php echo (isset($_POST['whale_dolphin_watching'])) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="whale_dolphin_watching">
                                            Whale/Dolphin Watching
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="airport_transfer" name="airport_transfer" value="1" <?php echo (isset($_POST['airport_transfer'])) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="airport_transfer">
                                            Airport Transfer
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="special_requests" class="form-label">Special Requests</label>
                                    <textarea class="form-control" id="special_requests" name="special_requests" rows="4" placeholder="Any special requests or additional information..."><?php echo isset($special_requests) ? htmlspecialchars($special_requests) : ''; ?></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn-booking w-100">Submit Reservation Request</button>
                                </div>
                                
                                <div class="col-12">
                                    <p class="text-muted text-center small mb-0">* Required fields. We will contact you to confirm your reservation.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Contact Information Section -->
            <section class="container px-4 section_container reveal">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 text-center">
                        <h2 class="sub-heading1 mb-4">Need Immediate Assistance?</h2>
                        <p class="mb-4">For immediate booking or inquiries, please contact us directly:</p>
                        <div class="d-flex flex-column flex-md-row gap-3 justify-content-center align-items-center">
                            <a href="tel:+94777204519" class="btn-booking">Call: +94 777 204 519</a>
                            <a href="contact.php" class="btn-booking">Contact Us</a>
                        </div>
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
        // Set minimum date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('check_in').setAttribute('min', today);
        document.getElementById('check_out').setAttribute('min', today);
        
        // Validate check-out date is after check-in date
        document.getElementById('check_in').addEventListener('change', function() {
            const checkInDate = this.value;
            document.getElementById('check_out').setAttribute('min', checkInDate);
        });
        
        // Close success modal function
        function closeSuccessModal() {
            const modal = document.getElementById('successModal');
            if (modal) {
                modal.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(function() {
                    modal.remove();
                }, 300);
            }
        }
        
        // Close modal when clicking outside
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('successModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeSuccessModal();
                    }
                });
                
                // Scroll to top to show the modal
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    </script>
    <style>
        @keyframes fadeOut {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.9); }
        }
    </style>

</body>

</html>

