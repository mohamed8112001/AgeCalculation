<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'mohamed');
  define('DB_PASS', 'Mohamed@8112001'); // استبدل بكلمة المرور الخاصة بك إذا لزم الأمر
  define('DB_NAME', 'age_calculator_db');
  define('DB_PORT',3307);

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME,DB_PORT);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // تعيين الترميز لدعم اللغة العربية
  $conn->set_charset("utf8mb4");
  ?>