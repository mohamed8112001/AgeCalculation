<?php require('layouts/header.php'); ?>

<div class="container">
  <div id="contact" class="page">
    <h2 class="calculate-title" data-aos="fade-up">تواصل معنا</h2>
    <div class="grid">
      <div class="card" data-aos="fade-up" data-aos-delay="100">
        <h3 class="card-title">أرسل لنا رسالة</h3>
        <div class="contact-form">
          <label for="contactName" class="input-label">الاسم:</label>
          <input type="text" id="contactName" class="input-field" required>
          <label for="email" class="input-label">البريد الإلكتروني:</label>
          <input type="email" id="email" class="input-field" required>
          <label for="message" class="input-label">الرسالة:</label>
          <textarea id="message" class="input-field" rows="5" required></textarea>
          <button onclick="submitContact()" class="btn btn-blue" data-aos="zoom-in">
            إرسال
          </button>
        </div>
      </div>
      <div class="card" data-aos="fade-up" data-aos-delay="200">
        <h3 class="card-title">اعثر علينا</h3>
        <p class="card-text">نحن هنا لمساعدتك! تواصل عبر النموذج أو اعثر علينا في:</p>
        <div class="map-placeholder">
          <p class="card-text">[عنصر نائب للخريطة]</p>
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