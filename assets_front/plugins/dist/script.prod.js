"use strict";function pilihhari(){"Senin"==document.getElementById("hr").value?(document.getElementById("datepicker").value="",$("#datepicker").datepicker("destroy"),$("#datepicker").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,daysOfWeekDisabled:[0,2,3,4,5,6],orientation:"bottom auto"})):"Selasa"==document.getElementById("hr").value?(document.getElementById("datepicker").value="",$("#datepicker").datepicker("destroy"),$("#datepicker").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,daysOfWeekDisabled:[0,1,3,4,5,6],orientation:"bottom auto"})):"Rabu"==document.getElementById("hr").value?(document.getElementById("datepicker").value="",$("#datepicker").datepicker("destroy"),$("#datepicker").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,daysOfWeekDisabled:[0,1,2,4,5,6],orientation:"bottom auto"})):"Kamis"==document.getElementById("hr").value?(document.getElementById("datepicker").value="",$("#datepicker").datepicker("destroy"),$("#datepicker").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,daysOfWeekDisabled:[0,1,2,3,5,6],orientation:"bottom auto"})):"Jumat"==document.getElementById("hr").value?(document.getElementById("datepicker").value="",$("#datepicker").datepicker("destroy"),$("#datepicker").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,daysOfWeekDisabled:[0,1,2,3,4,6],orientation:"bottom auto"})):"Sabtu"==document.getElementById("hr").value?(document.getElementById("datepicker").value="",$("#datepicker").datepicker("destroy"),$("#datepicker").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,daysOfWeekDisabled:[0,1,2,3,4,5],orientation:"bottom auto"})):"Minggu"==document.getElementById("hr").value&&(document.getElementById("datepicker").value="",$("#datepicker").datepicker("destroy"),$("#datepicker").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,daysOfWeekDisabled:[1,2,3,4,5,6],orientation:"bottom auto"}))}$("#hr").change(function(){var e=$("#hr").val();$.ajax({type:"POST",dataType:"html",url:"menuhari",data:"hari="+e,success:function(e){""==e?alert("Semua Menu Sudah Anda Pesan"):$("#namamenu").html(e),$("#shows").click()}})}),$("#tambah").click(function(){$.ajax({url:"simpantmp",type:"POST",data:$("#formv").serialize(),dataType:"html",success:function(e){$("#datasementara").html(e)}})}),$("#shows").click(function(){$.ajax({url:"show",type:"POST",data:$("#formv").serialize(),dataType:"html",success:function(e){$("#datasementara").html(e)}})}),$("#datepicker2").datepicker({autoclose:!0,changeMonth:!0,changeYear:!0,startDate:"dateToday",format:"dd-mm-yyyy",minDate:new Date,orientation:"bottom auto"}),$("#shows2").click(function(){$.ajax({url:"show2",type:"POST",data:$("#formv").serialize(),dataType:"html",success:function(e){$("#datasementara2").html(e)}})}),$("#tambah2").click(function(){$.ajax({url:"simpantmp",type:"POST",data:$("#formv").serialize(),dataType:"html",success:function(e){$("#datasementara").html(e)}})}),$("#namamenu2").change(function(){$("#shows2").click()});