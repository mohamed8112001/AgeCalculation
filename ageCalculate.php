<?php
// Initialize variables
$username = '';
$birthdate = '';
$ageDetails = null;
$errors = [];

// Inspirational quotes array in Arabic
$inspirationalQuotes = [
    "كل يوم هو فرصة جديدة لتحقيق أحلامك.",
    "العمر ليس سوى رقم، الشغف هو ما يحييك.",
    "لا تنتظر الفرصة، اصنعها بنفسك.",
    "النجاح هو رحلة، ليس وجهة.",
    "كل خطوة تقربك من هدفك، فلا تتوقف."
];

// Select a random quote
$randomQuote = $inspirationalQuotes[array_rand($inspirationalQuotes)];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING);

    if (empty($username)) {
        $errors[] = "الاسم مطلوب.";
    } elseif (strlen($username) < 2) {
        $errors[] = "الاسم يجب أن يكون أكثر من حرفين.";
    }

    if (empty($birthdate)) {
        $errors[] = "تاريخ الميلاد مطلوب.";
    } else {
        // Calculate age
        $birthDateTime = new DateTime($birthdate);
        $currentDateTime = new DateTime();
        
        if ($birthDateTime > $currentDateTime) {
            $errors[] = "تاريخ الميلاد لا يمكن أن يكون في المستقبل.";
        } else {
            $interval = $currentDateTime->diff($birthDateTime);
            $ageDetails = [
                'years' => $interval->y,
                'months' => $interval->m,
                'days' => $interval->d,
                'hours' => $interval->h,
                'minutes' => $interval->i,
                'seconds' => $interval->s,
                'totalDays' => $interval->days,
                'totalHours' => floor(($currentDateTime->getTimestamp() - $birthDateTime->getTimestamp()) / 3600),
                'totalMinutes' => floor(($currentDateTime->getTimestamp() - $birthDateTime->getTimestamp()) / 60),
                'totalSeconds' => $currentDateTime->getTimestamp() - $birthDateTime->getTimestamp()
            ];
        }
    }
}

require('layouts/header.php');
?>

<!-- Add Google Fonts for a decorative Arabic font -->
<link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

<!-- Add html2canvas library for exporting the card as an image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<div class="container">
  <div class="page">
    <h2 class="calculate-title" data-aos="fade-up">
      <?php echo empty($errors) && $ageDetails !== null ? "نتيجة حساب العمر" : "حساب العمر"; ?>
    </h2>

    <!-- Move the form outside of h2 -->
    <?php if ($ageDetails === null || !empty($errors)): ?>
      <div class="card" data-aos="fade-up" data-aos-delay="100">
        <form method="POST" action="ageCalculate.php">
          <label class="input-label" for="username">الاسم:</label>
          <input type="text" id="username" name="username" class="input-field" placeholder="أدخل اسمك" required>
          
          <label class="input-label" for="birthdate">تاريخ الميلاد:</label>
          <input type="date" id="birthdate" name="birthdate" class="input-field" required>
          
          <div class="button-group">
            <button type="submit" class="btn btn-blue">احسب العمر</button>
          </div>
        </form>
      </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p class="error-message" data-aos="fade-in"><?php echo htmlspecialchars($error); ?></p>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($ageDetails !== null && empty($errors)): ?>
      <div id="ageCard" class="decorative-font" data-aos="zoom-in">
        <!-- Add "أبجد هوز ggo'" as a decorative subtitle -->
        <h3 class="card-title">مرحبًا، <?php echo htmlspecialchars($username); ?>!</h3>
        <p class="decorative-text">عمرك هو:</p>
        <div class="age-details">
          <div class="age-field">
            <span class="field-label">بالسنوات والأشهر والأيام:</span>
            <span class="field-value"><?php echo $ageDetails['years']; ?> سنة، <?php echo $ageDetails['months']; ?> أشهر، <?php echo $ageDetails['days']; ?> أيام</span>
          </div>
          <div class="age-field">
            <span class="field-label">بالساعات والدقائق والثواني:</span>
            <span class="field-value"><?php echo $ageDetails['hours']; ?> ساعات، <?php echo $ageDetails['minutes']; ?> دقائق، <?php echo $ageDetails['seconds']; ?> ثواني</span>
          </div>
          <div class="age-field">
            <span class="field-label">إجمالي الأيام:</span>
            <span class="field-value"><?php echo $ageDetails['totalDays']; ?> أيام</span>
          </div>
          <div class="age-field">
            <span class="field-label">إجمالي الساعات:</span>
            <span class="field-value"><?php echo $ageDetails['totalHours']; ?> ساعات</span>
          </div>
          <div class="age-field">
            <span class="field-label">إجمالي الدقائق:</span>
            <span class="field-value"><?php echo $ageDetails['totalMinutes']; ?> دقيقة</span>
          </div>
          <div class="age-field">
            <span class="field-label">إجمالي الثواني:</span>
            <span class="field-value"><?php echo $ageDetails['totalSeconds']; ?> ثانية</span>
          </div>
        </div>
        <!-- Inspirational Quote Section -->
        <div class="inspirational-quote">
          <p class="quote-text"><?php echo htmlspecialchars($randomQuote); ?></p>
        </div>
      </div>
      <div class="button-group">
        <button id="downloadBtn" class="btn btn-yellow" data-aos="zoom-in">تنزيل كصورة</button>
        <a style="height:50px" href="ageCalculate.php" class="btn btn-blue" data-aos="zoom-in" data-aos-delay="100">احسب مرة أخرى</a>
        <a style="height:50px" href="index.php" class="btn btn-blue" data-aos="zoom-in" data-aos-delay="200">العودة إلى الصفحة الرئيسية</a>
      </div>
    <?php endif; ?>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<script>
document.getElementById('downloadBtn')?.addEventListener('click', function() {
    const ageCard = document.getElementById('ageCard');
    
    // Use html2canvas to capture the card as an image
    html2canvas(ageCard, {
        scale: 2, // Increase resolution for better quality
        backgroundColor: null // Keep the background transparent if needed
    }).then(canvas => {
        // Convert the canvas to a downloadable image
        const link = document.createElement('a');
        link.download = 'age_card.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    }).catch(error => {
        console.error('Error generating image:', error);
        alert('حدث خطأ أثناء تنزيل الصورة. حاول مرة أخرى.');
    });
});
</script>

<?php require('layouts/footer.php');?>