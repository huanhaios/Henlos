<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Ví dụ kiểm tra người dùng mẫu:
    // Giả sử tài khoản mẫu: email: test@example.com, password: 123456, username: TestUser
    if ($email === 'test@example.com' && $password === '123456') {
        $_SESSION['user'] = [
            'username' => 'TestUser',
            'email' => $email
        ];
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error'] = "Email hoặc mật khẩu không đúng.";
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>