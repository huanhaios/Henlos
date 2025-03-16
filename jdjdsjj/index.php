<?php
session_start();
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Chủ - Hệ Thống Đăng Nhập & Đăng Ký</title>
  <!-- Link CSS -->
  <link rel="stylesheet" href="style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- File JS -->
  <script src="script.js" defer></script>
</head>
<body>
  <!-- Thông báo tự động (notification) -->
  <div id="notification" class="notification">
    <div class="notification-content">
      <p>Chào mừng bạn đến với trang web của chúng tôi!</p>
      <div class="notification-buttons">
        <button id="notification-ok" class="btn-notif">OK!</button>
        <button id="notification-close" class="btn-notif"><i class="fas fa-times"></i></button>
      </div>
    </div>
  </div>

  <!-- Header cố định (sticky) -->
  <header id="main-header">
    <div class="header-container">
      <div class="header-left">
        <button id="hamburger" class="hamburger"><i class="fas fa-bars"></i></button>
        <img src="img/logo.png" alt="Logo" class="logo">
      </div>
      <div class="header-right">
        <?php if($user): ?>
          <span class="user-name">Xin chào, <?php echo htmlspecialchars($user['username']); ?></span>
          <a href="php/logout.php" class="header-btn"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        <?php else: ?>
          <button id="login-btn" class="header-btn"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
          <button id="register-btn" class="header-btn"><i class="fas fa-user-plus"></i> Đăng ký</button>
        <?php endif; ?>
      </div>
    </div>
    <!-- Menu dropdown xuất hiện khi ấn nút hamburger -->
    <nav id="dropdown-menu" class="dropdown-menu">
      <ul>
        <li><a href="#feature1">Chức năng 1</a></li>
        <li><a href="#feature2">Chức năng 2</a></li>
        <li><a href="#feature3">Chức năng 3</a></li>
      </ul>
    </nav>
  </header>

  <!-- Nội dung chính: Hiển thị sản phẩm -->
  <main>
    <section class="products">
      <div class="product-card">
        <img src="img/product1.jpg" alt="Sản phẩm 1">
        <h3>Sản phẩm 1</h3>
        <p class="price">Giá: $10</p>
        <button class="buy-btn">Mua ngay</button>
      </div>
      <div class="product-card">
        <img src="img/product2.jpg" alt="Sản phẩm 2">
        <h3>Sản phẩm 2</h3>
        <p class="price">Giá: $20</p>
        <button class="buy-btn">Mua ngay</button>
      </div>
      <!-- Có thể thêm nhiều sản phẩm khác -->
    </section>
  </main>

  <!-- Modal chứa form Đăng nhập / Đăng ký -->
  <div id="auth-modal" class="modal">
    <div class="modal-content">
      <span id="modal-close" class="modal-close"><i class="fas fa-times"></i></span>
      <div class="modal-tabs">
        <button id="modal-login-tab" class="modal-tab active">Đăng nhập</button>
        <button id="modal-register-tab" class="modal-tab">Đăng ký</button>
      </div>
      <div class="modal-body">
        <!-- Form Đăng nhập -->
        <form id="login-form" action="login.php" method="post" class="auth-form">
          <h2>Đăng nhập</h2>
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Mật khẩu" required>
          <button type="submit" class="auth-btn">Đăng nhập</button>
        </form>
        <!-- Form Đăng ký -->
        <form id="register-form" action="php/register.php" method="post" class="auth-form" style="display: none;">
          <h2>Đăng ký</h2>
          <input type="text" name="username" placeholder="Tên người dùng" required>
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Mật khẩu" required>
          <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu" required>
          <button type="submit" class="auth-btn">Đăng ký</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>