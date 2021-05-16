<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
<style> 
#panel {
  display: none;
}
</style>
<script src="<?php echo base_url(); ?>assest/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assest/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assest/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assest/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assest/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assest/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assest/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assest/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assest/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assest/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assest/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assest/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assest/dist/js/pages/dashboard.js"></script>

  <!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assest/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assest/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->

<script src="<?php echo base_url(); ?>assest/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


 $(document).ready(function () {
  //called when key is pressed in textbox
  $(".quantity").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


/*common function */
function getOfficeList(companyCommonId) {

  $('#officeId').find('option').remove().end().append(
      '<option value="0">Select Office</option>').val('');
 
  $.ajax({
    type : "POST",
    url : "<?php echo base_url() ?>User/getOfficeList",
    data : {
      "companyCommonId" : companyCommonId
    }

  }).done(
      function(officeList) {
        var officeList = JSON.parse(officeList);

        document.getElementById("officeId").disabled = false;
        var opt = '';
        for (i in officeList) {
          opt += '<option value="'+officeList[i].id+'">'
              + officeList[i].name + '</option>';
        }
        //$('.officeLoaderImage').hide();
        $('#officeId').append(opt);
        //$('#officeId').material_select();
      });
}


function getCourse(courseCategoryCommonId) {
  
  $('#courseId').find('option').remove();
  // $('.loaderImage').show();
  $.ajax({
    type : "POST",
    url : "<?php echo base_url() ?>Course/getCourse",
    data : {
      "courseCategoryCommonId" : courseCategoryCommonId
    }

  }).done(
      function(courseCategoryList) {

        var courseCategoryList = JSON.parse(courseCategoryList);
        document.getElementById("courseId").disabled = false;
        var opt = '';
        opt += '<option value="0"> Select Course Category </option>';
        for (i in courseCategoryList) {
          opt += '<option value="'+courseCategoryList[i].id+'">'
              + courseCategoryList[i].name +'</option>';
        }
        $('#courseId').append(opt);
       });
}
function getCourseModule(courseCommonId) {
  
  $('#courseModuleId').find('option').remove();
  $.ajax({
    type : "POST",
    url : "<?php echo base_url() ?>Course/getCourseModule",
    data : {
      "courseCommonId" : courseCommonId
    }

  }).done(
      function(courseModuleList) {
         var courseModuleList = JSON.parse(courseModuleList);
        document.getElementById("courseModuleId").disabled = false;
        var opt = '';
        opt += '<option value="0"> Select Course Module </option>';
        for (i in courseModuleList) {
         opt += '<option value="'+courseModuleList[i].id+'">'
              + courseModuleList[i].name +'</option>';
        }
        $('#courseModuleId').append(opt);
        });
}

function getDeptList(officeCommonId) {

  $('#deptId').find('option').remove().end().append(
      '<option value="0">Select Department</option>').val('');
  $.ajax({
    type : "POST",
    url : "<?php echo base_url() ?>User/getDeptList",
    data : {
      "officeCommonId" : officeCommonId
    }

  }).done(
      function(deptList) {
        var deptList = JSON.parse(deptList);
        document.getElementById("deptId").disabled = false;
        var opt = '';
        for (i in deptList) {
          opt += '<option value="'+deptList[i].id+'">'
              + deptList[i].dept_name +'</option>';
        }
        // $('.deptLoaderImage').hide();
        $('#deptId').append(opt);
        // $('#deptId').material_select();
      });
}

function getDivisionList(deptCommonId) {
  
  $('#divisionId').find('option').remove().end().append(
      '<option value="0">Select Division:</option>').val('');
  $.ajax({
    type : "POST",
    url : "<?php echo base_url() ?>User/getDivisionList",
    data : {
      "deptCommonId" : deptCommonId
    }

  }).done(
      function(divisionList) {
        var divisionList = JSON.parse(divisionList);
        
        document.getElementById("divisionId").disabled = false;
        var opt = '';
        for (i in divisionList) {
          opt += '<option value="'+divisionList[i].id+'">'
              + divisionList[i].name +'</option>';
        }
        // $('.divisionLoaderImage').hide();
        $('#divisionId').append(opt);
        // $('#divisionId').material_select();
      });
}

function getDesignationList(designationCommonId) {
  
  $('#designationId').find('option').remove().end().append(
      '<option value="0">Select Designation:</option>').val('');
  $.ajax({
    type : "POST",
    url : "<?php echo base_url() ?>User/getDesignationList",
    data : {
      "designationCommonId" : designationCommonId
    }

  }).done(
      function(designationList) {
        var designationList = JSON.parse(designationList);
        
        document.getElementById("designationId").disabled = false;
        var opt = '';
        for (i in designationList) {
          opt += '<option value="'+designationList[i].id+'">'
              + designationList[i].name +'</option>';
        }
        // $('.divisionLoaderImage').hide();
        $('#designationId').append(opt);
        // $('#divisionId').material_select();
      });
}

function getManagerList(deptCommonId) {

  $('#manager123').find('option').remove().end().append(
      '<option value="0">Select Manager</option>').val('');
  $.ajax({
    type : "POST",
    url : "get_manager_list",
    data : {
      "deptCommonId" : deptCommonId
    }

  }).done(
      function(managerList) {
        
        var opt = '';
        for (i in managerList) {
          opt += '<option value="'+managerList[i].userId+'">'
              + managerList[i].firstName +'</option>';
        }

        $('#manager123').append(opt);
        $('#manager123').material_select();
      });
}

</script>

<script>
function checkCourseModuleExist(val) {
  var courseCommonId = document.getElementById("courseCommonId").value;
  //alert("response1--"+courseCommonId);
  if(courseCommonId != 0){
    $.ajax({    
      url : "<?php echo base_url() ?>User/checkCourseModuleExist",
      success : function(response) {
        if (response == true) {
          alert("response--"+response);
          document.getElementById("isCourseModuleExist").style.color = "#ff0000";
          $("#isCourseModuleExist").text("Course Module Already Exist !");
  
        } else {
          $("#isCourseModuleExist").text("");
        }
      }
    });
  }else{
    alert("Please Select Course !");
    return false;
  };
};

</script>


</body>
</html>









