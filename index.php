<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>حساب العمر</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #e0f7fa, #80deea);
      min-height: 100vh;
    }

    /* Navigation Bar */
    nav {
      background-color: #2563eb;
      color: white;
      padding: 1rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1.5rem;
    }

    .nav-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .nav-title {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .desktop-menu {
      display: none;
      list-style: none;
    }

    .desktop-menu li {
      margin-left: 1rem;
    }

    .desktop-menu a {
      color: white;
      text-decoration: none;
    }

    .desktop-menu a:hover {
      text-decoration: underline;
    }

    .hamburger {
      display: block;
      background: none;
      border: none;
      color: white;
      cursor: pointer;
    }

    .hamburger svg {
      width: 1.5rem;
      height: 1.5rem;
    }

    .mobile-menu {
      display: none;
      margin-top: 1rem;
      text-align: right;
    }

    .mobile-menu a {
      display: block;
      padding: 0.5rem 1rem;
      color: white;
      text-decoration: none;
    }

    .mobile-menu a:hover {
      background-color: #1d4ed8;
    }

    /* Pages */
    .page {
      display: none;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .page.active {
      display: block;
      opacity: 1;
    }

    /* Home Page */
    .home-content {
      text-align: center;
      margin-bottom: 3rem;
    }

    .home-title {
      font-size: 2.25rem;
      font-weight: bold;
      color: #2563eb;
      margin-bottom: 1rem;
    }

    .home-description {
      font-size: 1.125rem;
      color: #4b5563;
      margin-bottom: 1.5rem;
    }

    .btn {
      padding: 0.75rem 1.5rem;
      border-radius: 0.5rem;
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .btn-blue {
      background-color: #2563eb;
    }

    .btn:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn:active {
      transform: scale(0.95);
    }

    .grid {
      display: grid;
      gap: 2rem;
    }

    .card {
      background-color: white;
      padding: 1.5rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 2rem;
      transform: scale(0.95);
      opacity: 0;
      animation: fadeScaleIn 0.6s ease-out forwards;
    }

    @keyframes fadeScaleIn {
      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    .card-delay-1 {
      animation-delay: 0.2s;
    }

    .card-delay-2 {
      animation-delay: 0.4s;
    }

    .card-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #2563eb;
      margin-bottom: 0.5rem;
    }

    .card-text {
      color: #4b5563;
    }

    .card-link {
      color: #2563eb;
      text-decoration: underline;
    }

    /* Calculate Page */
    .calculate-title {
      font-size: 1.875rem;
      font-weight: bold;
      color: #2563eb;
      margin-bottom: 1rem;
    }

    .input-label {
      display: block;
      color: #4b5563;
      margin-bottom: 0.5rem;
    }

    .input-field {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      margin-bottom: 1rem;
    }

    .button-group {
      display: flex;
      gap: 1rem;
    }

    .btn-green {
      background-color: #16a34a;
    }

    .btn-gray {
      background-color: #9ca3af;
    }

    #ageCard {
      background: linear-gradient(135deg, #4b6cb7, #182848);
      color: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      transform: scale(0.95);
      opacity: 0;
      transition: all 0.5s ease;
      padding: 1.5rem;
      margin-bottom: 2rem;
    }

    #ageCard.show {
      transform: scale(1);
      opacity: 1;
    }

    #ageCard p {
      margin-bottom: 1rem;
      text-align: center;
    }

    #ageCard.hidden {
      display: none;
    }

    .btn-yellow {
      background-color: #eab308;
      margin: 1rem auto;
      display: block;
    }

    /* Result Page */
    .result-text {
      font-size: 1.125rem;
      color: #4b5563;
    }

    /* Info Page */
    .info-table {
      width: 100%;
      border-collapse: collapse;
    }

    .info-table th,
    .info-table td {
      padding: 0.5rem;
      border: 1px solid #d1d5db;
      text-align: right;
    }

    .info-table thead {
      background-color: #dbeafe;
    }

    /* Contact Page */
    .contact-form textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      margin-bottom: 1rem;
      resize: vertical;
    }

    .map-placeholder {
      background-color: #e5e7eb;
      height: 12rem;
      border-radius: 0.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
    }

    .social-links {
      display: flex;
      gap: 1rem;
    }

    .social-links a {
      color: #2563eb;
      text-decoration: none;
    }

    .social-links a:hover {
      color: #1d4ed8;
    }

    /* Responsive Design */
    @media (min-width: 768px) {
      .desktop-menu {
        display: flex;
      }

      .hamburger {
        display: none;
      }

      .grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2.5rem;
      }

      .card {
        margin-bottom: 2.5rem;
      }
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav>
    <div class="container nav-content">
      <h1 class="nav-title">حساب العمر</h1>
      <ul class="desktop-menu">
        <li><a href="#" onclick="showPage('home')">الرئيسية</a></li>
        <li><a href="#" onclick="showPage('calculate')">احسب عمرك</a></li>
        <li><a href="#" onclick="showPage('info')">معلومات إضافية</a></li>
        <li><a href="#" onclick="showPage('contact')">تواصل معنا</a></li>
      </ul>
      <button class="hamburger" onclick="toggleMenu()">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
    <div id="mobileMenu" class="mobile-menu">
      <a href="#" onclick="showPage('home'); toggleMenu()">الرئيسية</a>
      <a href="#" onclick="showPage('calculate'); toggleMenu()">احسب عمرك</a>
      <a href="#" onclick="showPage('info'); toggleMenu()">معلومات إضافية</a>
      <a href="#" onclick="showPage('contact'); toggleMenu()">تواصل معنا</a>
    </div>
  </nav>

  <!-- Pages -->
  <div class="container">
    <!-- Home Page -->
    <div id="home" class="page active">
      <div class="home-content">
        <h2 class="home-title">اكتشف عمرك بدقة</h2>
        <p class="home-description">
          يوفر موقعنا طريقة دقيقة وسهلة لحساب عمرك بالسنين والأشهر والأيام بناءً على تاريخ ميلادك. سواء للتسلية أو التخطيط أو الفضول، ابدأ الآن!
        </p>
        <button onclick="showPage('calculate')" class="btn btn-blue">
          احسب عمرك الآن
        </button>
      </div>
      <div class="grid">
        <div class="card">
          <h3 class="card-title">لماذا تحسب عمرك؟</h3>
          <p class="card-text">
            معرفة عمرك الدقيق يساعد في تخطيط الأحداث، تحديد المراحل الحياتية، أو إشباع فضولك. أداتنا سريعة، دقيقة، ومجانية!
          </p>
        </div>
        <div class="card card-delay-1">
          <h3 class="card-title">الأسئلة الشائعة</h3>
          <p class="card-text">
            هل تتساءل عن كيفية حساب العمر أو أهمية تاريخ الميلاد؟ اطلع على صفحة <a href="#" onclick="showPage('info')" class="card-link">معلومات إضافية</a> للحصول على الإجابات!
          </p>
        </div>
      </div>
      <div class="card card-delay-2">
        <h3 class="card-title">آراء المستخدمين</h3>
        <p class="card-text italic">"هذه الأداة سهلة الاستخدام للغاية وقدمت لي عمري الدقيق في ثوانٍ! أنصح بها بشدة!" — سارة، 28</p>
      </div>
    </div>

    <!-- Calculate Age Page -->
    <div id="calculate" class="page">
      <h2 class="calculate-title">احسب عمرك</h2>
      <div class="card">
        <h3 class="card-title">كيف يعمل؟</h3>
        <p class="card-text">
          أدخل اسمك وتاريخ ميلادك أدناه، وسنحسب عمرك بناءً على تاريخ اليوم. ستحصل على النتائج بالسنين والأشهر والأيام فورًا!
        </p>
        <label for="name" class="input-label">اسمك:</label>
        <input type="text" id="name" class="input-field" required>
        <label for="birthdate" class="input-label">تاريخ الميلاد:</label>
        <input type="date" id="birthdate" class="input-field" required>
        <div class="button-group">
          <button onclick="calculateAge()" class="btn btn-blue">
            احسب العمر
          </button>
          <button onclick="showAgeCard()" class="btn btn-green">
            عرض البيانات
          </button>
          <button onclick="clearForm()" class="btn btn-gray">
            مسح
          </button>
        </div>
      </div>
      <div id="ageCard" class="hidden">
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
      <div class="card card-delay-1">
        <h3 class="card-title">مثال على النتيجة</h3>
        <p class="card-text">مثال: إذا ولدت في 1 يناير 1995، فقد يكون عمرك اليوم <strong>30 سنة، 3 أشهر، و18 يومًا</strong>.</p>
        <p id="last-result" class="card-text"></p>
      </div>
    </div>

    <!-- Result Page -->
    <div id="result" class="page">
      <h2 class="calculate-title">نتيجة حساب العمر</h2>
      <div id="result-text" class="card result-text"></div>
      <div class="card card-delay-1">
        <h3 class="card-title">حقيقة ممتعة عن سنة ميلادك</h3>
        <p id="fun-fact" class="card-text"></p>
      </div>
      <div class="card card-delay-2">
        <h3 class="card-title">إلهام لك</h3>
        <p id="quote" class="card-text italic"></p>
      </div>
      <div class="button-group">
        <button onclick="showPage('calculate')" class="btn btn-blue">
          احسب مرة أخرى
        </button>
        <button onclick="shareResult()" class="btn btn-green">
          مشاركة النتيجة
        </button>
      </div>
    </div>

    <!-- Additional Info Page -->
    <div id="info" class="page">
      <h2 class="calculate-title">معلومات إضافية</h2>
      <div class="card">
        <h3 class="card-title">كيف يتم حساب العمر</h3>
        <p class="card-text">
          نستخدم التقويم الغريغوري لمقارنة تاريخ ميلادك بالتاريخ الحالي. يأخذ الحساب في الاعتبار السنوات الكبيسة وأطوال الأشهر المختلفة لضمان الدقة.
        </p>
        <p class="card-text">
          يقوم الخوارزم الخاص بنا بتعديل الأيام أو الأشهر السلبية لضمان نتائج دقيقة.
        </p>
      </div>
      <div class="card card-delay-1">
        <h3 class="card-title">السياق التاريخي للتقويمات</h3>
        <p class="card-text">
          تم تقديم التقويم الغريغوري في عام 1582، وهو الأكثر استخدامًا اليوم. كانت الأنظمة السابقة، مثل التقويم اليولياني، تحتوي على قواعد سنة كبيسة أقل دقة.
        </p>
      </div>
      <div class="card card-delay-2">
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

    <!-- Contact Page -->
    <div id="contact" class="page">
      <h2 class="calculate-title">تواصل معنا</h2>
      <div class="grid">
        <div class="card">
          <h3 class="card-title">أرسل لنا رسالة</h3>
          <div class="contact-form">
            <label for="contactName" class="input-label">الاسم:</label>
            <input type="text" id="contactName" class="input-field" required>
            <label for="email" class="input-label">البريد الإلكتروني:</label>
            <input type="email" id="email" class="input-field" required>
            <label for="message" class="input-label">الرسالة:</label>
            <textarea id="message" class="input-field" rows="5" required></textarea>
            <button onclick="submitContact()" class="btn btn-blue">
              إرسال
            </button>
          </div>
        </div>
        <div class="card card-delay-1">
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
      <div class="card card-delay-2">
        <h3 class="card-title">الأسئلة الشائعة</h3>
        <p class="card-text"><strong>س: ما مدى دقة الحاسبة؟</strong></p>
        <p class="card-text">ج: أداتنا دقيقة للغاية، حيث تأخذ في الاعتبار السنوات الكبيسة وتغيرات التقويم.</p>
        <p class="card-text"><strong>س: هل يمكنني حفظ نتائجي؟</strong></p>
        <p class="card-text">ج: يتم حفظ آخر نتيجة محليًا وتظهر في صفحة الحساب.</p>
      </div>
    </div>
  </div>

  <script>
    let ageData = null;

    function showPage(pageId) {
      document.querySelectorAll('.page').forEach(page => page.classList.remove('active'));
      document.getElementById(pageId).classList.add('active');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function calculateAge() {
      const name = document.getElementById('name').value.trim();
      const birthdateInput = document.getElementById('birthdate').value;
      const birthdate = new Date(birthdateInput);
      const today = new Date();

      if (!name) {
        alert('يرجى إدخال اسمك.');
        return;
      }
      if (!birthdateInput || birthdate > today) {
        alert('يرجى إدخال تاريخ ميلاد صحيح.');
        return;
      }

      let years = today.getFullYear() - birthdate.getFullYear();
      let months = today.getMonth() - birthdate.getMonth();
      let days = today.getDate() - birthdate.getDate();

      if (days < 0) {
        months--;
        days += new Date(today.getFullYear(), today.getMonth(), 0).getDate();
      }
      if (months < 0) {
        years--;
        months += 12;
      }

      const timeDiff = today - birthdate;
      const totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
      const totalMinutes = Math.floor(timeDiff / (1000 * 60));
      const totalSeconds = Math.floor(timeDiff / 1000);

      ageData = {
        name,
        birthdate: birthdate.toLocaleDateString('ar-EG'),
        years,
        months,
        days,
        totalDays,
        totalMinutes,
        totalSeconds,
        quote: getMotivationalQuote(years)
      };

      const resultText = `
        عمر ${name} هو: <br>
        <strong>${years}</strong> سنة، <strong>${months}</strong> شهر، <strong>${days}</strong> يوم
      `;
      document.getElementById('result-text').innerHTML = resultText;

      localStorage.setItem('lastAge', JSON.stringify({ name, years, months, days }));
      updateLastResult();

      document.getElementById('fun-fact').textContent = getFunFact(birthdate.getFullYear());
      document.getElementById('quote').textContent = ageData.quote;

      showPage('result');
    }

    function showAgeCard() {
      if (!ageData) {
        alert('يرجى حساب العمر أولاً!');
        return;
      }

      document.getElementById('nameResult').textContent = `الاسم: ${ageData.name}`;
      document.getElementById('birthdateResult').textContent = `تاريخ الميلاد: ${ageData.birthdate}`;
      document.getElementById('ageResult').textContent = `العمر: ${ageData.years} سنة، ${ageData.months} شهر، ${ageData.days} يوم`;
      document.getElementById('detailedAgeResult').textContent = `عشت: ${ageData.totalDays} يوم، ${ageData.totalMinutes} دقيقة، ${ageData.totalSeconds} ثانية`;
      document.getElementById('quoteResult').textContent = `إلهام: ${ageData.quote}`;

      const ageCard = document.getElementById('ageCard');
      ageCard.classList.remove('hidden');
      ageCard.classList.add('show');
    }

    function exportCard() {
      const card = document.getElementById('ageCard');
      html2canvas(card).then(canvas => {
        const link = document.createElement('a');
        link.download = `age_result_${ageData.name}.png`;
        link.href = canvas.toDataURL('image/png');
        link.click();
      }).catch(err => alert('خطأ في تصدير الصورة: ' + err));
    }

    function clearForm() {
      document.getElementById('name').value = '';
      document.getElementById('birthdate').value = '';
      document.getElementById('nameResult').textContent = '';
      document.getElementById('birthdateResult').textContent = '';
      document.getElementById('ageResult').textContent = '';
      document.getElementById('detailedAgeResult').textContent = '';
      document.getElementById('quoteResult').textContent = '';
      document.getElementById('ageCard').classList.remove('show');
      document.getElementById('ageCard').classList.add('hidden');
      ageData = null;
    }

    function shareResult() {
      const result = document.getElementById('result-text').textContent;
      if (navigator.share) {
        navigator.share({
          title: 'نتيجة حساب العمر',
          text: result,
          url: window.location.href
        }).catch(err => alert('خطأ في مشاركة النتيجة.'));
      } else {
        alert('انسخ النتيجة لمشاركتها: ' + result);
      }
    }

    function submitContact() {
      const name = document.getElementById('contactName').value;
      const email = document.getElementById('email').value;
      const message = document.getElementById('message').value;

      if (!name || !email || !message) {
        alert('يرجى ملء جميع الحقول.');
        return;
      }

      alert('تم إرسال رسالتك بنجاح!');
      document.getElementById('contactName').value = '';
      document.getElementById('email').value = '';
      document.getElementById('message').value = '';
    }

    function updateLastResult() {
      const lastAge = JSON.parse(localStorage.getItem('lastAge'));
      if (lastAge) {
        document.getElementById('last-result').textContent = `آخر عمر محسوب لـ ${lastAge.name}: ${lastAge.years} سنة، ${lastAge.months} شهر، ${lastAge.days} يوم`;
      }
    }

    function getFunFact(year) {
      const facts = {
        1990: "أطلقت ناسا تلسكوب هابل الفضائي.",
        2000: "بدأ القرن الحادي والعشرون.",
        2010: "أُعلن عن جهاز iPad لأول مرة.",
        2020: "انتشر فيروس كورونا عالميًا."
      };
      return facts[year] || `في سنة ${year} حدثت الكثير من الأحداث الرائعة!`;
    }

    function getMotivationalQuote(years) {
      const quotes = [
        years < 20 ? "الشباب هبة الطبيعة، لكن العمر عمل فني." :
        years < 40 ? "الحياة رحلة؛ استمر في الاستكشاف والنمو!" :
        "مع العمر تأتي الحكمة، وأنت تصبح أكثر حكمة!"
      ];
      return quotes[0];
    }

    function toggleMenu() {
      const menu = document.getElementById("mobileMenu");
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }

    window.onload = updateLastResult;
  </script>
</body>
</html>