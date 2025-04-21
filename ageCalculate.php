<?php require('layouts/header.php'); ?>

<div class="container">
  <div id="calculate" class="page">
    <h2 class="calculate-title" data-aos="fade-up">احسب عمرك</h2>
    <div class="card" data-aos="fade-up" data-aos-delay="100">
      <h3 class="card-title">كيف يعمل؟</h3>
      <p class="card-text">
        أدخل اسمك وتاريخ ميلادك أدناه، وسنحسب عمرك بناءً على تاريخ اليوم. ستحصل على النتائج بالسنين والأشهر والأيام فورًا!
      </p>
      <label for="name" class="input-label">اسمك:</label>
      <input type="text" id="name" class="input-field" required>
      <label for="birthdate" class="input-label">تاريخ الميلاد:</label>
      <input type="date" id="birthdate" class="input-field" required>
      <div class="button-group">
        <button onclick="calculateAge()" class="btn btn-blue" data-aos="zoom-in">
          احسب العمر
        </button>
        <button onclick="clearForm()" class="btn btn-gray" data-aos="zoom-in" data-aos-delay="100">
          مسح
        </button>
      </div>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="200">
      <h3 class="card-title">مثال على النتيجة</h3>
      <p class="card-text">مثال: إذا ولدت في 1 يناير 1995، فقد يكون عمرك اليوم <strong>30 سنة، 3 أشهر، و18 يومًا</strong>.</p>
      <p id="last-result" class="card-text"></p>
    </div>
  </div>
</div>

<script>
  window.onload = updateLastResult;
</script>

<?php require('layouts/footer.php'); ?>