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
    $treatment_date = isset($_POST['treatment_date']) ? trim($_POST['treatment_date']) : '';
    $treatment_time = isset($_POST['treatment_time']) ? trim($_POST['treatment_time']) : '';
    $package = isset($_POST['package']) ? trim($_POST['package']) : '';
    $special_requests = isset($_POST['special_requests']) ? trim($_POST['special_requests']) : '';
    
    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($treatment_date) || empty($treatment_time) || empty($package)) {
        $message = 'Please fill in all required fields.';
        $messageType = 'error';
    } else {
        // Prepare email
        $to = 'kiru2003@yahoo.co.uk';
        $subject = 'Ayurveda Treatment Booking Request - High Park Hotel';
        
        $email_body = "New Ayurveda Treatment Booking Request\n\n";
        $email_body .= "Guest Details:\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        $email_body .= "Phone: " . $phone . "\n\n";
        $email_body .= "Treatment Details:\n";
        $email_body .= "Treatment Package: " . $package . "\n";
        $email_body .= "Date: " . $treatment_date . "\n";
        $email_body .= "Time: " . $treatment_time . "\n";
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
            $message = 'Thank you! Your Ayurveda treatment booking request has been sent successfully. We will contact you soon to confirm your appointment.';
            $messageType = 'success';
            // Clear form data
            $name = $email = $phone = $treatment_date = $treatment_time = $package = $special_requests = '';
        } else {
            $message = 'Sorry, there was an error sending your booking request. Please try again or contact us directly at +94 777 204 519.';
            $messageType = 'error';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/head.php'; ?>

    <title>Book Ayurveda Treatment | High Park Hotel - Nilaveli Beach, Trincomalee</title>
    <meta name="description" content="Book your Ayurveda treatment at High Park Hotel's beachfront Wellness Center in Nilaveli, Trincomalee. Traditional massages and holistic wellness treatments.">
    <meta name="keywords" content="book Ayurveda treatment Nilaveli, spa booking Trincomalee, wellness center booking, High Park Hotel spa reservation">
    <link rel="canonical" href="https://highparkhotel.com/ayurveda-booking.php">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://highparkhotel.com/ayurveda-booking.php">
    <meta property="og:title" content="Book Ayurveda Treatment | High Park Hotel - Nilaveli Beach">
    <meta property="og:description" content="Book your Ayurveda treatment at High Park Hotel's beachfront Wellness Center in Nilaveli, Trincomalee.">
    <meta property="og:image" content="https://highparkhotel.com/assets/images/spa-hero.jpg">
</head>

<body>

    <div class="page-wrapper">
        <!-- Header -->
        <?php include 'includes/header.php'; ?>

        <main class="main-content">

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

            <!-- Booking Form Section -->
            <section class="container px-4 section_container" style="padding-top: 200px;">
                <h1 class="heading reveal">Book Your <span class="blue-text">Treatment</span></h1>
                <p class="text-center w-75 mx-auto mt-4 mb-5 reveal">Fill out the form below to request an Ayurveda treatment booking. We will confirm your appointment and contact you shortly.</p>
                
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
                                
                                <!-- Treatment Details -->
                                <div class="col-12 mt-3">
                                    <h3 class="mb-3">Treatment Details</h3>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="package" class="form-label">Treatment Package <span class="text-danger">*</span></label>
                                    <select class="form-select" id="package" name="package" required>
                                        <option value="">Select Treatment Package</option>
                                        <option value="Aloe Vera Full Body Massage (60 min - LKR 12,000)" <?php echo (isset($package) && $package === 'Aloe Vera Full Body Massage (60 min - LKR 12,000)') ? 'selected' : ''; ?>>Aloe Vera Full Body Massage (60 min - LKR 12,000)</option>
                                        <option value="Ayurveda Back and Shoulders Massage (30 min - LKR 6,000)" <?php echo (isset($package) && $package === 'Ayurveda Back and Shoulders Massage (30 min - LKR 6,000)') ? 'selected' : ''; ?>>Ayurveda Back and Shoulders Massage (30 min - LKR 6,000)</option>
                                        <option value="Ayurveda Full Body Massage and Fomentation (90 min - LKR 17,500)" <?php echo (isset($package) && $package === 'Ayurveda Full Body Massage and Fomentation (90 min - LKR 17,500)') ? 'selected' : ''; ?>>Ayurveda Full Body Massage and Fomentation (90 min - LKR 17,500)</option>
                                        <option value="Ayurvedic Body Polish (30 min - LKR 9,000)" <?php echo (isset($package) && $package === 'Ayurvedic Body Polish (30 min - LKR 9,000)') ? 'selected' : ''; ?>>Ayurvedic Body Polish (30 min - LKR 9,000)</option>
                                        <option value="Ayurvedic Face Massage (30 min - LKR 7,000)" <?php echo (isset($package) && $package === 'Ayurvedic Face Massage (30 min - LKR 7,000)') ? 'selected' : ''; ?>>Ayurvedic Face Massage (30 min - LKR 7,000)</option>
                                        <option value="Ayurvedic Facial (60 min - LKR 10,000)" <?php echo (isset($package) && $package === 'Ayurvedic Facial (60 min - LKR 10,000)') ? 'selected' : ''; ?>>Ayurvedic Facial (60 min - LKR 10,000)</option>
                                        <option value="Ayurvedic Foot Massage (45 min - LKR 3,500)" <?php echo (isset($package) && $package === 'Ayurvedic Foot Massage (45 min - LKR 3,500)') ? 'selected' : ''; ?>>Ayurvedic Foot Massage (45 min - LKR 3,500)</option>
                                        <option value="Ayurvedic Full Body Massage (60 min - LKR 12,000)" <?php echo (isset($package) && $package === 'Ayurvedic Full Body Massage (60 min - LKR 12,000)') ? 'selected' : ''; ?>>Ayurvedic Full Body Massage (60 min - LKR 12,000)</option>
                                        <option value="Ayurvedic Full Body Massage and Steam (75 min - LKR 15,000)" <?php echo (isset($package) && $package === 'Ayurvedic Full Body Massage and Steam (75 min - LKR 15,000)') ? 'selected' : ''; ?>>Ayurvedic Full Body Massage and Steam (75 min - LKR 15,000)</option>
                                        <option value="Ayurvedic Head Massage (LKR 5,000)" <?php echo (isset($package) && $package === 'Ayurvedic Head Massage (LKR 5,000)') ? 'selected' : ''; ?>>Ayurvedic Head Massage (LKR 5,000)</option>
                                        <option value="Ayurvedic Kati Vashti (30 min - LKR 12,000)" <?php echo (isset($package) && $package === 'Ayurvedic Kati Vashti (30 min - LKR 12,000)') ? 'selected' : ''; ?>>Ayurvedic Kati Vashti (30 min - LKR 12,000)</option>
                                        <option value="Ayurvedic Reflexology (30 min - LKR 7,500)" <?php echo (isset($package) && $package === 'Ayurvedic Reflexology (30 min - LKR 7,500)') ? 'selected' : ''; ?>>Ayurvedic Reflexology (30 min - LKR 7,500)</option>
                                        <option value="Ayurvedic Reflexology (60 min - LKR 12,500)" <?php echo (isset($package) && $package === 'Ayurvedic Reflexology (60 min - LKR 12,500)') ? 'selected' : ''; ?>>Ayurvedic Reflexology (60 min - LKR 12,500)</option>
                                        <option value="Herbal Steam Bath with Full Body Massage (LKR 22,000)" <?php echo (isset($package) && $package === 'Herbal Steam Bath with Full Body Massage (LKR 22,000)') ? 'selected' : ''; ?>>Herbal Steam Bath with Full Body Massage (LKR 22,000)</option>
                                        <option value="Sesame Oil Bath (30 min - LKR 7,500)" <?php echo (isset($package) && $package === 'Sesame Oil Bath (30 min - LKR 7,500)') ? 'selected' : ''; ?>>Sesame Oil Bath (30 min - LKR 7,500)</option>
                                        <option value="Shirodhara Treatment (35 min - LKR 16,000)" <?php echo (isset($package) && $package === 'Shirodhara Treatment (35 min - LKR 16,000)') ? 'selected' : ''; ?>>Shirodhara Treatment (35 min - LKR 16,000)</option>
                                    </select>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="treatment_date" class="form-label">Treatment Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="treatment_date" name="treatment_date" value="<?php echo isset($treatment_date) ? htmlspecialchars($treatment_date) : ''; ?>" required>
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="treatment_time" class="form-label">Treatment Time <span class="text-danger">*</span></label>
                                    <select class="form-select" id="treatment_time" name="treatment_time" required>
                                        <option value="">Select Time</option>
                                        <option value="09:00 AM" <?php echo (isset($treatment_time) && $treatment_time === '09:00 AM') ? 'selected' : ''; ?>>09:00 AM</option>
                                        <option value="10:00 AM" <?php echo (isset($treatment_time) && $treatment_time === '10:00 AM') ? 'selected' : ''; ?>>10:00 AM</option>
                                        <option value="11:00 AM" <?php echo (isset($treatment_time) && $treatment_time === '11:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                                        <option value="12:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '12:00 PM') ? 'selected' : ''; ?>>12:00 PM</option>
                                        <option value="01:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '01:00 PM') ? 'selected' : ''; ?>>01:00 PM</option>
                                        <option value="02:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '02:00 PM') ? 'selected' : ''; ?>>02:00 PM</option>
                                        <option value="03:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '03:00 PM') ? 'selected' : ''; ?>>03:00 PM</option>
                                        <option value="04:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '04:00 PM') ? 'selected' : ''; ?>>04:00 PM</option>
                                        <option value="05:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '05:00 PM') ? 'selected' : ''; ?>>05:00 PM</option>
                                        <option value="06:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '06:00 PM') ? 'selected' : ''; ?>>06:00 PM</option>
                                        <option value="07:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '07:00 PM') ? 'selected' : ''; ?>>07:00 PM</option>
                                        <option value="08:00 PM" <?php echo (isset($treatment_time) && $treatment_time === '08:00 PM') ? 'selected' : ''; ?>>08:00 PM</option>
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                    <label for="special_requests" class="form-label">Special Requests</label>
                                    <textarea class="form-control" id="special_requests" name="special_requests" rows="4" placeholder="Any special requests or additional information..."><?php echo isset($special_requests) ? htmlspecialchars($special_requests) : ''; ?></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn-booking w-100">Submit Booking Request</button>
                                </div>
                                
                                <div class="col-12">
                                    <p class="text-muted text-center small mb-0">* Required fields. We will contact you to confirm your appointment.</p>
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
        document.getElementById('treatment_date').setAttribute('min', today);
        
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

