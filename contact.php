<?php require('layouts/header.php'); ?>

<div class="container">
  <div id="contact" class="page">
    <h2 class="calculate-title" data-aos="fade-up">تواصل معنا</h2>
    <?php
    // Display errors if they exist
    if (isset($_GET['error'])) {
        $errors = explode("|", urldecode($_GET['error']));
        foreach ($errors as $error) {
            echo "<p class='error-message' data-aos='fade-in'>$error</p>";
        }
    }
    ?>
    <div class="grid">
      <div class="card" data-aos="fade-up" data-aos-delay="100">
        <h3 class="card-title">أرسل لنا رسالة</h3>
        <div class="contact-form">
          <form action="process_contact.php" method="POST">
            <label for="contactName" class="input-label">الاسم:</label>
            <input type="text" id="contactName" name="contactName" class="input-field" value="<?php echo isset($_POST['contactName']) ? htmlspecialchars($_POST['contactName']) : ''; ?>" required>
            <label for="email" class="input-label">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" class="input-field" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
            <label for="message" class="input-label">الرسالة:</label>
            <textarea id="message" name="message" class="input-field" rows="5" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
            <button type="submit" class="btn btn-blue" data-aos="zoom-in">إرسال</button>
          </form>
        </div>
      </div>
      <div class="card" data-aos="fade-up" data-aos-delay="200">
        <h3 class="card-title">اعثر علينا</h3>
        <p class="card-text">نحن هنا لمساعدتك! تواصل عبر النموذج أو اعثر علينا في:</p>
        <div class="map-placeholder">
          <p class="card-text"><a href="https://www.google.com/maps/place/Cairo" target="_blank">View Map</a></p>
        </div>
        <p class="card-text">تابعنا على وسائل التواصل الاجتماعي:</p>
        <div class="social-links">
          <a href="#">فيسبوك</a>
          <a href="#">تويتر</a>
          <a href="#">إنستغرام</a>
        </div>
      </div>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="300">
      <h3 class="card-title">الأسئلة الشائعة</h3>
      <p class="card-text"><strong>س: ما مدى دقة الحاسبة؟</strong></p>
      <p class="card-text">ج: أداتنا دقيقة للغاية، حيث تأخذ في الاعتبار السنوات الكبيسة وتغيرات التقويم.</p>
      <p class="card-text"><strong>س: هل يمكنني حفظ نتائجي؟</strong></p>
      <p class="card-text">ج: يتم حفظ آخر نتيجة محليًا وتظهر في صفحة الحساب.</p>
    </div>
  </div>
</div>

<?php require('layouts/footer.php'); ?>