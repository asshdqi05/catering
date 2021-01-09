"use strict";

function pilihhari() {
  if (document.getElementById('hr').value == "Senin") {
    document.getElementById('datepicker').value = "";
    $("#datepicker").datepicker("destroy");
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      startDate: "dateToday",
      format: 'dd-mm-yyyy',
      minDate: new Date(),
      daysOfWeekDisabled: [0, 2, 3, 4, 5, 6],
      orientation: "bottom auto"
    });
  } else if (document.getElementById('hr').value == "Selasa") {
    document.getElementById('datepicker').value = "";
    $("#datepicker").datepicker("destroy");
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      startDate: "dateToday",
      format: 'dd-mm-yyyy',
      minDate: new Date(),
      daysOfWeekDisabled: [0, 1, 3, 4, 5, 6],
      orientation: "bottom auto"
    });
  } else if (document.getElementById('hr').value == "Rabu") {
    document.getElementById('datepicker').value = "";
    $("#datepicker").datepicker("destroy");
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      startDate: "dateToday",
      format: 'dd-mm-yyyy',
      minDate: new Date(),
      daysOfWeekDisabled: [0, 1, 2, 4, 5, 6],
      orientation: "bottom auto"
    });
  } else if (document.getElementById('hr').value == "Kamis") {
    document.getElementById('datepicker').value = "";
    $("#datepicker").datepicker("destroy");
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      startDate: "dateToday",
      format: 'dd-mm-yyyy',
      minDate: new Date(),
      daysOfWeekDisabled: [0, 1, 2, 3, 5, 6],
      orientation: "bottom auto"
    });
  } else if (document.getElementById('hr').value == "Jumat") {
    document.getElementById('datepicker').value = "";
    $("#datepicker").datepicker("destroy");
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      startDate: "dateToday",
      format: 'dd-mm-yyyy',
      minDate: new Date(),
      daysOfWeekDisabled: [0, 1, 2, 3, 4, 6],
      orientation: "bottom auto"
    });
  } else if (document.getElementById('hr').value == "Sabtu") {
    document.getElementById('datepicker').value = "";
    $("#datepicker").datepicker("destroy");
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      startDate: "dateToday",
      format: 'dd-mm-yyyy',
      minDate: new Date(),
      daysOfWeekDisabled: [0, 1, 2, 3, 4, 5],
      orientation: "bottom auto"
    });
  } else if (document.getElementById('hr').value == "Minggu") {
    document.getElementById('datepicker').value = "";
    $("#datepicker").datepicker("destroy");
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      startDate: "dateToday",
      format: 'dd-mm-yyyy',
      minDate: new Date(),
      daysOfWeekDisabled: [1, 2, 3, 4, 5, 6],
      orientation: "bottom auto"
    });
  }
}

$("#hr").change(function () {
  var hari = $("#hr").val();
  $.ajax({
    type: "POST",
    dataType: "html",
    url: "menuhari",
    data: "hari=" + hari,
    success: function success(msg) {
      if (msg == '') {
        alert('Semua Menu Sudah Anda Pesan');
        $('#shows').click();
      } else {
        $("#namamenu").html(msg);
        $('#shows').click();
      }
    }
  });
});
$('#tambah').click(function () {
  // var base_url = '<?= base_url() ?>';
  $.ajax({
    url: "simpantmp",
    type: 'POST',
    data: $("#formv").serialize(),
    dataType: 'html',
    success: function success(response) {
      $('#datasementara').html(response);
    }
  });
});
$('#shows').click(function () {
  // var base_url = '<?= base_url() ?>';
  $.ajax({
    url: "show",
    type: 'POST',
    data: $("#formv").serialize(),
    dataType: 'html',
    success: function success(response) {
      $('#datasementara').html(response);
    }
  });
});
$('#datepicker2').datepicker({
  autoclose: true,
  changeMonth: true,
  changeYear: true,
  startDate: "dateToday",
  format: 'dd-mm-yyyy',
  minDate: new Date(),
  orientation: "bottom auto"
});
$('#shows2').click(function () {
  // var base_url = '<?= base_url() ?>';
  $.ajax({
    url: "show2",
    type: 'POST',
    data: $("#formv").serialize(),
    dataType: 'html',
    success: function success(response) {
      $('#datasementara2').html(response);
    }
  });
});
$('#tambah2').click(function () {
  // var base_url = '<?= base_url() ?>';
  $.ajax({
    url: "simpantmp",
    type: 'POST',
    data: $("#formv").serialize(),
    dataType: 'html',
    success: function success(response) {
      $('#datasementara').html(response);
    }
  });
});
$("#namamenu2").change(function () {
  $('#shows2').click();
});