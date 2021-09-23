const BASE_URL = $("#base_url").val();

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
