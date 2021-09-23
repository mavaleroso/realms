$(document).ready(() => {
  let course_status = $("#course-status").val();
  if (parseInt(course_status)) {
    $("#publish-chbox").prop("checked", true);
  }
});

$("#publish-chbox").click(function (e) {
  e.preventDefault();

  let id = $("#course-id").val();
  let status = $(this).is(":checked") ? 1 : 0;
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
          $("#publish-chbox").prop("checked", $(this).is(":checked"));

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
});
