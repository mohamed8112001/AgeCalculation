let ageData = null;

// Theme Toggle Functionality
document.addEventListener('DOMContentLoaded', () => {
  const themeToggle = document.getElementById('themeToggle');
  const body = document.body;
  const sunIcon = document.querySelector('.sun-icon');
  const moonIcon = document.querySelector('.moon-icon');

  // Load theme from localStorage
  const savedTheme = localStorage.getItem('theme') || 'light';
  body.classList.toggle('dark-mode', savedTheme === 'dark');
  sunIcon.classList.toggle('hidden', savedTheme === 'dark');
  moonIcon.classList.toggle('hidden', savedTheme === 'light');

  themeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    const isDark = body.classList.contains('dark-mode');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    sunIcon.classList.toggle('hidden', isDark);
    moonIcon.classList.toggle('hidden', !isDark);
  });
});

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
    quote: getMotivationalQuote(years),
    funFact: getFunFact(birthdate.getFullYear())
  };

  localStorage.setItem('ageResult', JSON.stringify(ageData));
  localStorage.setItem('lastAge', JSON.stringify({ name, years, months, days }));
  window.location.href = 'result.php';
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