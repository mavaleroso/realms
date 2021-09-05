const BASE_URL = $("#base_url").val();

$(document).ready(function (e) {
  $("#course-form").on("submit", function (e) {
    e.preventDefault();
    let courseName = $("#bm-courseName").val();
    let courseDesc = $("#bm-desc").val();
    if (courseName && courseDesc) {
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
        confirmButtonText: "Yes, start a course",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url:
              BASE_URL + "/models/modules/teacher/model_course?func=add_course",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data, status) {
              $("#courseModal").modal("toggle");
              const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
              });

              Toast.fire({
                icon: "success",
                title: "Course created successfully!",
              });
            },
            error: function (e) {},
          });
        }
      });
    }
  });
});
