const BASE_URL = $("#base_url").val();

// Sidebar Page Start

//sidebar active function
url = window.location.href;
var currentPage = url.split("/").pop();
var beforePage = url.split("/")[5];
$(".sidebar-link").removeClass("active");
if (beforePage == "courses") {
  var currentPage = decodeURIComponent(
    window.location.search.match(/(\?|&)page\=([^&]*)/)[2]
  );
  $("#courses").addClass("active");
  $("#" + currentPage).addClass("active");
  $(".sidebar-submenu").addClass("d-block");
} else {
  $("#" + currentPage).addClass("active");
  $(".sidebar-submenu").removeClass("d-block");
}
// Sidebar Page End

function myToast(icon, title, position, duration) {
  const Toast = Swal.mixin({
    toast: true,
    position: position,
    showConfirmButton: false,
    timer: duration,
  });

  Toast.fire({
    icon: icon,
    title: title,
  });
}
