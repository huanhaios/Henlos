document.addEventListener("DOMContentLoaded", function() {
  /* --- Notification --- */
  const notification = document.getElementById('notification');
  const notifOk = document.getElementById('notification-ok');
  const notifClose = document.getElementById('notification-close');
  
  // Kiểm tra xem thông báo đã được ẩn trong 1 giờ chưa
  const notifDismissed = localStorage.getItem("notifDismissed");
  const now = Date.now();
  if (notifDismissed && now - notifDismissed < 3600000) {
    // Không hiển thị thông báo
  } else {
    notification.classList.add("show");
  }
  
  function hideNotification() {
    notification.classList.remove("show");
    localStorage.setItem("notifDismissed", Date.now());
  }
  
  notifOk.addEventListener("click", hideNotification);
  notifClose.addEventListener("click", hideNotification);
  
  /* --- Dropdown menu (Hamburger) --- */
  const hamburger = document.getElementById("hamburger");
  const dropdownMenu = document.getElementById("dropdown-menu");
  hamburger.addEventListener("click", function() {
    dropdownMenu.classList.toggle("active");
  });
  
  /* --- Modal Đăng nhập / Đăng ký --- */
  const authModal = document.getElementById("auth-modal");
  const loginBtn = document.getElementById("login-btn");
  const registerBtn = document.getElementById("register-btn");
  const modalClose = document.getElementById("modal-close");
  const modalLoginTab = document.getElementById("modal-login-tab");
  const modalRegisterTab = document.getElementById("modal-register-tab");
  const loginForm = document.getElementById("login-form");
  const registerForm = document.getElementById("register-form");
  
  if (loginBtn) {
    loginBtn.addEventListener("click", function() {
      authModal.classList.add("active");
      showLoginTab();
    });
  }
  if (registerBtn) {
    registerBtn.addEventListener("click", function() {
      authModal.classList.add("active");
      showRegisterTab();
    });
  }
  modalClose.addEventListener("click", function() {
    authModal.classList.remove("active");
  });
  
  modalLoginTab.addEventListener("click", showLoginTab);
  modalRegisterTab.addEventListener("click", showRegisterTab);
  
  function showLoginTab() {
    modalLoginTab.classList.add("active");
    modalRegisterTab.classList.remove("active");
    loginForm.style.display = "flex";
    registerForm.style.display = "none";
  }
  function showRegisterTab() {
    modalRegisterTab.classList.add("active");
    modalLoginTab.classList.remove("active");
    registerForm.style.display = "flex";
    loginForm.style.display = "none";
  }
  
  /* --- Xử lý nút "Mua ngay" --- */
  const buyButtons = document.querySelectorAll(".buy-btn");
  buyButtons.forEach(btn => {
    btn.addEventListener("click", function() {
      alert("Chức năng mua ngay đang được phát triển!");
    });
  });
  
  /* --- (Header cố định đã được xử lý bởi CSS - position: fixed) --- */
});