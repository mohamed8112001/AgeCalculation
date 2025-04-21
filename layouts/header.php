<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>حساب العمر</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="src/styles.css">
</head>
<body class="light-mode">
  <nav>
    <div class="container nav-content">
      <h1 class="nav-title">حساب العمر</h1>
      <ul class="desktop-menu">
        <li><a href="index.php" <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active-link"'; ?>>الرئيسية</a></li>
        <li><a href="ageCalculate.php" <?php if(basename($_SERVER['PHP_SELF']) == 'calculate.php') echo 'class="active-link"'; ?>>احسب عمرك</a></li>
        <li><a href="about.php" <?php if(basename($_SERVER['PHP_SELF']) == 'info.php') echo 'class="active-link"'; ?>>معلومات إضافية</a></li>
        <li><a href="contact.php" <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active-link"'; ?>>تواصل معنا</a></li>
      </ul>
      <div class="theme-toggle">
        <button id="themeToggle" class="btn btn-theme">
          <svg class="sun-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
          <svg class="moon-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
          </svg>
        </button>
      </div>
      <button class="hamburger" onclick="toggleMenu()">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
    <div id="mobileMenu" class="mobile-menu">
      <a href="index.php" onclick="toggleMenu()">الرئيسية</a>
      <a href="ageCalculate.php" onclick="toggleMenu()">احسب عمرك</a>
      <a href="about.php" onclick="toggleMenu()">معلومات إضافية</a>
      <a href="contact.php" onclick="toggleMenu()">تواصل معنا</a>
    </div>
  </nav> 