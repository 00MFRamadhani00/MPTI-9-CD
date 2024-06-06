new DataTable("#dtfull1");
new DataTable("#dtfull2");
new DataTable("#dtfull3");
new DataTable("#dtfull4");
new DataTable("#dtexport1");
new DataTable("#dtexport2");
new DataTable("#dtexport_userlist");
new DataTable("#dtnosearch1");
new DataTable("#dtnosearch2");

$(document).ready(function () {
  if ($.fn.DataTable.isDataTable("#dtnosearch1")) {
    $("#dtnosearch1").DataTable().destroy();
  }

  $("#dtnosearch1").DataTable({
    searching: false, // Disable the search bar
    lengthChange: false, // Disable length feature
    info: false, // Disable info display
    paging: false, // Disable pagination
  });
});

$(document).ready(function () {
  if ($.fn.DataTable.isDataTable("#dtnosearch2")) {
    $("#dtnosearch2").DataTable().destroy();
  }

  $("#dtnosearch2").DataTable({
    searching: false, // Disable the search bar
    lengthChange: false, // Disable length feature
    info: false, // Disable info display
    paging: false, // Disable pagination
  });
});

$(document).ready(function () {
  if ($.fn.DataTable.isDataTable("#dtexport_userlist")) {
    $("#dtexport_userlist").DataTable().destroy();
  }

  $("#dtexport_userlist").DataTable({
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copy",
        className: "btn btn-primary mt-3",
        exportOptions: {
          columns: [0, 1, 2, 3],
        },
      },
      {
        extend: "csv",
        className: "btn btn-primary mt-3",
        exportOptions: {
          columns: [0, 1, 2, 3],
        },
      },
      {
        extend: "excel",
        className: "btn btn-primary mt-3",
        exportOptions: {
          columns: [0, 1, 2, 3],
        },
      },
      {
        extend: "print",
        className: "btn btn-primary mt-3",
        exportOptions: {
          columns: [0, 1, 2, 3],
        },
      },
    ],
  });
});

$(document).ready(function () {
  if ($.fn.DataTable.isDataTable("#dtexport1")) {
    $("#dtexport1").DataTable().destroy();
  }

  $("#dtexport1").DataTable({
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copy",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "csv",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "excel",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "print",
        className: "btn btn-primary mt-3",
      },
    ],
  });
});

$(document).ready(function () {
  if ($.fn.DataTable.isDataTable("#dtexport2")) {
    $("#dtexport2").DataTable().destroy();
  }

  $("#dtexport2").DataTable({
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copy",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "csv",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "excel",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "print",
        className: "btn btn-primary mt-3",
      },
    ],
  });
});

$(document).ready(function () {
  if ($.fn.DataTable.isDataTable("#dtexport3")) {
    $("#dtexport3").DataTable().destroy();
  }

  $("#dtexport3").DataTable({
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copy",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "csv",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "excel",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "print",
        className: "btn btn-primary mt-3",
      },
    ],
  });
});

$(document).ready(function () {
  if ($.fn.DataTable.isDataTable("#dtexport4")) {
    $("#dtexport4").DataTable().destroy();
  }

  $("#dtexport4").DataTable({
    dom: "lBfrtip",
    buttons: [
      {
        extend: "copy",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "csv",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "excel",
        className: "btn btn-primary mt-3",
      },
      {
        extend: "print",
        className: "btn btn-primary mt-3",
      },
    ],
  });
});
