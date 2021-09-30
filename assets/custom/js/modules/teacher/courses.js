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
    ``;
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

$("#module-form").submit(function (e) {
  e.preventDefault();

  let id = $("#course-id").val();
  let module_name = $("#module-name").val();
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
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: BASE_URL + "/models/modules/teacher/model_modules?func=create",
        type: "POST",
        data: {
          id,
          module_name,
        },
        success: function (data, status) {
          myToast("success", "Module Created successfully!", "top-end", 2000);
          $("#moduleModal").modal("toggle");
          setTimeout(() => {
            location.reload();
          }, 2000);
        },
        error: function (e) {
          myToast("error", "Module created unsuccessfully!", "top-end", 2000);
        },
      });
    }
  });
});

$(".module-status").click(function (e) {
  e.preventDefault();
  let thisChk = this;
  let id = $(this).data("id");
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
    confirmButtonText: "Yes, " + status_text + " module",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: BASE_URL + "/models/modules/teacher/model_modules?func=status",
        type: "POST",
        data: {
          id,
          status,
        },
        success: function (data, status) {
          myToast(
            "success",
            "Module " + status_text + " successfully!",
            "top-end",
            2000
          );
          $(thisChk).prop("checked", $(this).is(":checked"));

          setTimeout(() => {
            location.reload();
          }, 2000);
        },
        error: function (e) {
          myToast(
            "error",
            "Module  " + status_text + " unsuccessfully!",
            "top-end",
            2000
          );
        },
      });
    }
  });
});

function deleteModule(id) {
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
    confirmButtonText: "Yes, delete module",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: BASE_URL + "/models/modules/teacher/model_modules?func=delete",
        type: "POST",
        data: {
          id,
        },
        success: function (data, status) {
          myToast("success", "Module deleted successfully!", "top-end", 2000);

          setTimeout(() => {
            location.reload();
          }, 2000);
        },
        error: function (e) {
          myToast("error", "Module deleted unsuccessfully!", "top-end", 2000);
        },
      });
    }
  });
}

function deleteFile(id) {
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
    confirmButtonText: "Yes, delete file",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: BASE_URL + "/models/modules/teacher/model_files?func=delete",
        type: "POST",
        data: {
          id,
        },
        success: function (data, status) {
          myToast("success", "file deleted successfully!", "top-end", 2000);

          setTimeout(() => {
            location.reload();
          }, 2000);
        },
        error: function (e) {
          myToast("error", "file deleted unsuccessfully!", "top-end", 2000);
        },
      });
    }
  });
}

$(".file-status").click(function (e) {
  e.preventDefault();
  let thisChk = this;
  let id = $(this).data("id");
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
    confirmButtonText: "Yes, " + status_text + " file",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: BASE_URL + "/models/modules/teacher/model_files?func=status",
        type: "POST",
        data: {
          id,
          status,
        },
        success: function (data, status) {
          myToast(
            "success",
            "File " + status_text + " successfully!",
            "top-end",
            2000
          );
          $(thisChk).prop("checked", $(this).is(":checked"));

          setTimeout(() => {
            location.reload();
          }, 2000);
        },
        error: function (e) {
          myToast(
            "error",
            "File  " + status_text + " unsuccessfully!",
            "top-end",
            2000
          );
        },
      });
    }
  });
});

$(".dropzone").dropzone({
  success: function (file, response) {
    myToast("success", "File uploaded successfully!", "top-end", 2000);
    setTimeout(() => {
      location.reload();
    }, 2000);
  },
});

//QUIZZES

function createQuiz() {
  let id = $("#course-id").val();
  let code = $("#course-code").val();
  $.ajax({
    url: BASE_URL + "/models/modules/teacher/model_quizzes?func=create",
    type: "POST",
    data: {
      id,
    },
    success: function (data, status) {
      myToast("success", "Quiz created successfully!", "top-end", 2000);
      setTimeout(() => {
        location.reload();
        window.location.href =
          BASE_URL +
          "/modules/teacher/courses/quizzes/edit?page=" +
          code +
          "&quiz_id=" +
          data;
      }, 2000);
    },
    error: function (e) {
      myToast("error", "Quiz created unsuccessfully!", "top-end", 2000);
    },
  });
}
