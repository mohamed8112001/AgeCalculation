<?php
require('config.php');

// Initialize variables for errors and data
$errors = [];
$name = $email = $message = '';
$submitted = false;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $name = filter_input(INPUT_POST, 'contactName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validation
    if (empty($name)) {
        $errors[] = "الاسم مطلوب.";
    } elseif (strlen($name) < 2) {
        $errors[] = "الاسم يجب أن يكون أكثر من حرفين.";
    }

    if (empty($email)) {
        $errors[] = "البريد الإلكتروني مطلوب.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "البريد الإلكتروني غير صالح.";
    }

    if (empty($message)) {
        $errors[] = "الرسالة مطلوبة.";
    } elseif (strlen($message) < 10) {
        $errors[] = "الرسالة يجب أن تكون 10 أحرف على الأقل.";
    }

    // If no errors, save to database
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $submitted = true; // Mark as submitted to display the data
        } else {
            $errors[] = "خطأ أثناء حفظ الرسالة: " . $conn->error;
        }

        $stmt->close();
    }
}

// Fetch all reviews from the contacts table
$reviews = [];
$result = $conn->query("SELECT name, email, message, created_at FROM contacts ORDER BY created_at DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
    $result->free();
}

require('layouts/header.php');
?>

<div class="container">
  <div id="contact-result" class="page">
    <h2 class="calculate-title" data-aos="fade-up">
      <?php echo empty($errors) && $submitted ? "تم الإرسال بنجاح" : ""; ?>
    </h2>

    <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p class="error-message" data-aos="fade-in"><?php echo htmlspecialchars($error); ?></p>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($submitted): ?>
      <div class="submitted-message" data-aos="zoom-in">
        <h3 class="submitted-title">رسالتك</h3>
        <div class="message-content">
          <div class="message-field">
            <span class="field-label">الاسم:</span>
            <span class="field-value"><?php echo htmlspecialchars($name); ?></span>
          </div>
          <div class="message-field">
            <span class="field-label">البريد الإلكتروني:</span>
            <span class="field-value"><?php echo htmlspecialchars($email); ?></span>
          </div>
          <div class="message-field">
            <span class="field-label">الرسالة:</span>
            <span class="field-value"><?php echo htmlspecialchars($message); ?></span>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <div class="reviews-section">
      <h3 class="section-title" data-aos="fade-up">جميع الرسائل</h3>
      <?php if (empty($reviews)): ?>
        <p class="card-text" data-aos="fade-up">لا توجد رسائل بعد.</p>
      <?php else: ?>
        <div class="reviews-grid">
          <?php foreach ($reviews as $index => $review): ?>
            <div class="review-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
              <div class="review-header">
                <span class="review-icon">📩</span>
                <h4 class="review-name"><?php echo htmlspecialchars($review['name']); ?></h4>
              </div>
              <div class="review-content">
                <div class="review-field">
                  <span class="field-label">البريد الإلكتروني:</span>
                  <span class="field-value"><?php echo htmlspecialchars($review['email']); ?></span>
                </div>
                <div class="review-field">
                  <span class="field-label">الرسالة:</span>
                  <span class="field-value"><?php echo htmlspecialchars($review['message']); ?></span>
                </div>
                <div class="review-field">
                  <span class="field-label">التاريخ:</span>
                  <span class="field-value"><?php echo date('Y-m-d H:i', strtotime($review['created_at'])); ?></span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="button-group">
      <a href="contact.php" class="btn btn-blue" data-aos="zoom-in">إرسال رسالة أخرى</a>
      <a href="index.php" class="btn btn-green" data-aos="zoom-in" data-aos-delay="100">العودة إلى الرئيسية</a>
    </div>
  </div>
</div>

<?php require('layouts/footer.php'); ?>