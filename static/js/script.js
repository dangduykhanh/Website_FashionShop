//js hiển thị thanh navbar của khi màn hình thay đổi
const bar = document.getElementById("bar");
const close = document.getElementById("close");
const nav = document.getElementById("navbar");

if (bar) {
  bar.addEventListener("click", () => {
    nav.classList.add("active");
    profile.classList.remove("active");
  });
}

if (close) {
  close.addEventListener("click", () => {
    nav.classList.remove("active");
  });
}

// js khi lăn chuột
window.onscroll = () => {
  profile.classList.remove("active");
  nav.classList.remove("active");
};

// js của thẻ select kích thước và thẻ input number
var selectKichThuoc = document.getElementById("Size-KT");
var selectSoLuong = document.getElementById("Quantity-SL");
var soLuongmax = document.getElementById("QuantitydetailMax");

function updateQuantityOptions() {
  selectSoLuong.innerHTML = "";
  var selectedOption = selectKichThuoc.options[selectKichThuoc.selectedIndex];
  var soLuong = selectedOption.getAttribute("data-so-luong");
  soLuongmax.value = selectedOption.getAttribute("data-so-luong");

  for (var i = 1; i <= soLuong; i++) {
    var option = document.createElement("option");
    option.value = i;
    option.text = i;
    selectSoLuong.appendChild(option);
  }
}

// js thay đổi kích thước phù hợp với danh mục

var selectcata = document.getElementById("categoryproductadmin");
var selectsize = document.getElementsByClassName("Sizeinput");

//js ẩn hiển password form đăng nhập
const pwShowHide = document.querySelectorAll(".showHidePw"),
  pwFields = document.querySelectorAll(".password");

pwShowHide.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    pwFields.forEach((pwField) => {
      if (pwField.type === "password") {
        pwField.type = "text";

        pwShowHide.forEach((icon) => {
          icon.classList.replace("fa-eye-slash", "fa-eye");
        });
      } else {
        pwField.type = "password";

        pwShowHide.forEach((icon) => {
          icon.classList.replace("fa-eye", "fa-eye-slash");
        });
      }
    });
  });
});

//js các thẻ input type radio
function inputclick(event, name) {
  var inputs = document.getElementsByName(name);
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].checked = false;
  }
  event.target.checked = true;
}
