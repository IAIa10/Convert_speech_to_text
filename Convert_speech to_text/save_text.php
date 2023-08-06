<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "convert speech to text";

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استلام النص المرسل من الجافا سكريبت
$text = $_POST['text'];

// تنفيذ استعلام SQL لإدخال النص في جدول البيانات
$sql = "INSERT INTO robot (text) VALUES ('$text')";

if ($conn->query($sql) === TRUE) {
    echo "تم تخزين النص في قاعدة البيانات بنجاح";
} else {
    echo "حدث خطأ في تخزين النص: " . $conn->error;
}

// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>