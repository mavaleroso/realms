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
          url: BASE_URL + "/models/modules/teacher/model_course?func=create",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function (data, status) {
            $("#courseModal").modal("toggle");
            myToast("success", "Course created successfully!", "top-end", 2000);

            setTimeout(() => {
              location.reload();
            }, 2000);
          },
          error: function (e) {
            myToast("error", "Course created unsuccessfully!", "top-end", 2000);
          },
        });
      }
    });
  }
});

function change_status(id, status) {
  let status_text = status ? "publish" : "unpublish";
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
    confirmButtonText: "Yes, " + status_text + " course",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: BASE_URL + "/models/modules/teacher/model_course?func=status",
        type: "POST",
        data: {
          id,
          status,
        },
        success: function (data, status) {
          myToast(
            "success",
            "Course " + status_text + " successfully!",
            "top-end",
            2000
          );

          setTimeout(() => {
            location.reload();
          }, 2000);
        },
        error: function (e) {
          myToast(
            "error",
            "Course  " + status_text + " unsuccessfully!",
            "top-end",
            2000
          );
        },
      });
    }
  });
}
