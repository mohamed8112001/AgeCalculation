<?php require('layouts/header.php'); ?>

<div class="container">
  <div id="home" class="page">
    <div class="home-content" data-aos="fade-up">
      <h2 class="calculate-title" data-aos="fade-up">اكتشف عمرك بدقة</h2>
      <p class="home-description">
        يوفر موقعنا طريقة دقيقة وسهلة لحساب عمرك بالسنين والأشهر والأيام بناءً على تاريخ ميلادك. سواء للتسلية أو التخطيط أو الفضول، ابدأ الآن!
      </p>
      <button onclick="window.location.href='ageCalculate.php'" class="btn btn-blue">
        احسب عمرك الآن
      </button>
    </div>
    <div class="grid">
      <div class="card" data-aos="fade-up" data-aos-delay="100">
        <h3 class="card-title">لماذا تحسب عمرك؟</h3>
        <p class="card-text">
          معرفة عمرك الدقيق يساعد في تخطيط الأحداث، تحديد المراحل الحياتية، أو إشباع فضولك. أداتنا سريعة، دقيقة، ومجانية!
        </p>
      </div>
      <div class="card" data-aos="fade-up" data-aos-delay="200">
        <h3 class="card-title">الأسئلة الشائعة</h3>
        <p class="card-text">
          هل تتساءل عن كيفية حساب العمر أو أهمية تاريخ الميلاد؟ اطلع على صفحة <a href="info.php" class="card-link">معلومات إضافية</a> للحصول على الإجابات!
        </p>
      </div>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="300">
      <h3 class="card-title">آراء المستخدمين</h3>
      <p class="card-text italic">"هذه الأداة سهلة الاستخدام للغاية وقدمت لي عمري الدقيق في ثوانٍ! أنصح بها بشدة!" — سارة، 28</p>
    </div>
  </div>
</div>


<?php require('layouts/footer.php'); ?> 