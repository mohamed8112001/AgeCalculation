<?php
// Initialize variables
$username = '';
$birthdate = '';
$ageDetails = null;
$errors = [];

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

<div class="container">
  <div class="page">
    <h2 class="calculate-title" data-aos="fade-up">
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
    </h2>

    <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p class="error-message" data-aos="fade-in"><?php echo htmlspecialchars($error); ?></p>
      <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($ageDetails !== null && empty($errors)): ?>
      <div id="ageCard" data-aos="zoom-in">
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
      </div>
    <?php endif; ?>

    <div class="button-group">
      <a href="index.php" class="btn btn-blue" data-aos="zoom-in"> العوده الى الصفحه الرئيسية</a>
    </div>
  </div>
</div>

<?php require('layouts/footer.php'); ?>