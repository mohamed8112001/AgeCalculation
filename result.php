<?php require('layouts/header.php'); ?>

<div class="container">
  <div id="result" class="page">
    <h2 class="calculate-title" data-aos="fade-up">نتيجة حساب العمر</h2>
    <div id="ageCard" data-aos="zoom-in">
      <h3 class="card-title">نتيجة العمر</h3>
      <p id="nameResult"></p>
      <p id="birthdateResult"></p>
      <p id="ageResult"></p>
      <p id="detailedAgeResult"></p>
      <p id="quoteResult" class="italic"></p>
      <button onclick="exportCard()" class="btn btn-yellow">
        تصدير كصورة
      </button>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="100">
      <h3 class="card-title">حقيقة ممتعة عن سنة ميلادك</h3>
      <p id="fun-fact" class="card-text"></p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="200">
      <h3 class="card-title">إلهام لك</h3>
      <p id="quote" class="card-text italic"></p>
    </div>
    <div class="button-group">
      <button onclick="window.location.href='calculate.php'" class="btn btn-blue" data-aos="zoom-in">
        احسب مرة أخرى
      </button>
      <button onclick="shareResult()" class="btn btn-green" data-aos="zoom-in" data-aos-delay="100">
        مشاركة النتيجة
      </button>
    </div>
  </div>
</div>

<script>
  window.onload = function() {
    const ageData = JSON.parse(localStorage.getItem('ageResult'));
    if (ageData) {
      document.getElementById('nameResult').textContent = `الاسم: ${ageData.name}`;
      document.getElementById('birthdateResult').textContent = `تاريخ الميلاد: ${ageData.birthdate}`;
      document.getElementById('ageResult').textContent = `العمر: ${ageData.years} سنة، ${ageData.months} شهر، ${ageData.days} يوم`;
      document.getElementById('detailedAgeResult').textContent = `عشت: ${ageData.totalDays} يوم، ${ageData.totalMinutes} دقيقة، ${ageData.totalSeconds} ثانية`;
      document.getElementById('quoteResult').textContent = `إلهام: ${ageData.quote}`;
      document.getElementById('fun-fact').textContent = ageData.funFact;
      document.getElementById('quote').textContent = ageData.quote;
    } else {
      document.getElementById('nameResult').textContent = 'لا توجد نتائج متاحة. يرجى حساب العمر أولاً.';
      document.getElementById('birthdateResult').textContent = '';
      document.getElementById('ageResult').textContent = '';
      document.getElementById('detailedAgeResult').textContent = '';
      document.getElementById('quoteResult').textContent = '';
      document.getElementById('fun-fact').textContent = '';
      document.getElementById('quote').textContent = '';
    }
  };
</script>

<?php require('layouts/footer.php'); ?>