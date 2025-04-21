<?php require('layouts/header.php'); ?>

<div class="container">
  <div id="info" class="page">
    <h2 class="calculate-title" data-aos="fade-up">معلومات إضافية</h2>
    <div class="card" data-aos="fade-up" data-aos-delay="100">
      <h3 class="card-title">كيف يتم حساب العمر</h3>
      <p class="card-text">
        نستخدم التقويم الغريغوري لمقارنة تاريخ ميلادك بالتاريخ الحالي. يأخذ الحساب في الاعتبار السنوات الكبيسة وأطوال الأشهر المختلفة لضمان الدقة.
      </p>
      <p class="card-text">
        يقوم الخوارزم الخاص بنا بتعديل الأيام أو الأشهر السلبية لضمان نتائج دقيقة.
      </p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="200">
      <h3 class="card-title">السياق التاريخي للتقويمات</h3>
      <p class="card-text">
        تم تقديم التقويم الغريغوري في عام 1582، وهو الأكثر استخدامًا اليوم. كانت الأنظمة السابقة، مثل التقويم اليولياني، تحتوي على قواعد سنة كبيسة أقل دقة.
      </p>
    </div>
    <div class="card" data-aos="fade-up" data-aos-delay="300">
      <h3 class="card-title">أنظمة العمر حول العالم</h3>
      <table class="info-table">
        <thead>
          <tr>
            <th>النظام</th>
            <th>الوصف</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>العمر الغربي</td>
            <td>يحسب السنوات المكتملة منذ الولادة (يستخدم هنا).</td>
          </tr>
          <tr>
            <td>العمر الشرق آسيوي</td>
            <td>يحسب السنة الحالية كجزء من العمر، ويزيد في رأس السنة.</td>
          </tr>
          <tr>
            <td>العمر الكوري</td>
            <td>مشابه للشرق آسيوي ولكنه يزيد في 1 يناير.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require('layouts/footer.php'); ?>