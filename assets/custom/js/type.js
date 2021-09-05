const BASE_URL = $("#base_url").val();

function update_role(type) {
  Swal.fire({
    title: "Are you sure you?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    customClass: {
      confirmButton: "btn btn-success btn-sm",
      cancelButton: "btn btn-danger btn-sm",
    },
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, become a " + type,
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        BASE_URL + "/models/model_type?func=role",
        {
          role: type,
        },
        function (data, status) {
          console.log("Data: " + data + "\nStatus: " + status);
          Swal.fire("You are now a " + type + "!", "", "success");
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener("mouseenter", Swal.stopTimer);
              toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
          });

          Toast.fire({
            icon: "info",
            title: "Redirected to Home page in 5 seconds!",
          });
          setTimeout(() => {
            location.replace(BASE_URL);
          }, 5000);
        }
      );
    }
  });
}
