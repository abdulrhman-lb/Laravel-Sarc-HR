//دالة تحديث قائمة الشعب عند اختيار الفرع
$('#branch_id').on('change', function() { 
  var branch_Id = $(this).val();
  
  // استدعاء الشعب المرتبطة بالفروع باستخدام Ajax
    $.ajax({
      url: '/get-sub',
      type: 'GET',
      data: { id: branch_Id },
      success: function(data) {
            var sub_branch_Select = $('#sub_branch_id');
            sub_branch_Select.empty(); // تفريغ القائمة المنسدلة
            // إضافة الشعب إلى القائمة المنسدلة
            sub_branch_Select.append('<option value="">-</option>');
            $.each(data, function(key, value) {
              sub_branch_Select.append('<option value="' + value.id + '">' + value.sub_branch +  ' - ' + value.sub_branch_en + '</option>');
            });
          }
    });
  });

  //دالة تحديث معلومات المنسق
$('#coordinator_id').on('change', function() { 
  var coordinator_id = $(this).val();
  // استدعاء المعلومات المرتبطة بالمنسق باستخدام Ajax
    $.ajax({
      url: '/get-coodinator',
      type: 'GET',
      data: { id: coordinator_id },
      success: function(data) {
            var coordinator_name = $('#coordinator_name');
            var coordinator_mobile = $('#coordinator_mobile');
            var coordinator_email = $('#coordinator_email');
            // إضافة معلومات المنسق
            coordinator_name.val(null);
            coordinator_mobile.val(null);
            coordinator_email.val(null);
            $.each(data, function(key, value) {
              coordinator_name.val(data.first_name +  ' ' + data.last_name);
              coordinator_mobile.val(data.mobile_phone);
              coordinator_email.val(data.email);
            });
          }
    });
  });

    //دالة تحديث معلومات الاجازات
$('#leave_name_id').on('change', function() { 
  var leave_name_id = $(this).val();
  var profile_id = $('#profile_id').val();
  // استدعاء المعلومات المرتبطة بالمنسق باستخدام Ajax
    $.ajax({
      url: '/get-leave',
      type: 'GET',
      data: { id: leave_name_id , profile_id: profile_id},
      success: function(data) {
            var leave_detaile = $('#leave_detaile');
            // إضافة معلومات المنسق
            leave_detaile.val(null);
            $.each(data, function(key, value) {
              $('#leave_detaile').text(value);
            });
          }
    });
  });
  
  
  
  
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}


// const profileImageInput = document.getElementById("image");
// const previewButton = document.getElementById("choose-image");
// const imagePreview = document.getElementById("image_preview");

// profileImageInput.addEventListener("change", function () {
  //     const file = profileImageInput.files[0];
//     const reader = new FileReader();

//     reader.onload = function () {
  //         imagePreview.src = reader.result;
  //         imagePreview.style.display = "block";
  //     }
//     if (file) {
//         reader.readAsDataURL(file);
//     }
// });
import './bootstrap';

$(function() {
    $('#birth_date').datepicker({
        autoclose: true,
        Clear: true,
        format: 'dd-mm-yyyy',
      });
  });
  
  $(function() {
    $('#hire_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });
  
  $(function() {
    $('#volunteering_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
      altFormat: 'yyyy-mm-dd', // تحديد تنسيق الإرسال إلى قاعدة البيانات
    });
  });
  
  $(function() {
    $('#training_date_start').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });
  
  $(function() {
    $('#training_date_end').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });

  $(function() {
    $('#training_date_start1').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });

  $(function() {
    $('#training_date_start2').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });

  $(function() {
    $('#penalty_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });

  $(function() {
    $('#reward_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });

  $(function() {
    $('#start_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });

  $(function() {
    $('#end_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'dd-mm-yyyy',
    });
  });

 

  


const profileImageInput = document.getElementById("image");
const previewButton = document.getElementById("choose-image");
const imagePreview = document.getElementById("image_preview");

profileImageInput.addEventListener("change", function () {
    const file = profileImageInput.files[0];
    const reader = new FileReader();

    reader.onload = function () {
        imagePreview.src = reader.result;
        imagePreview.style.display = "block";
    }
    if (file) {
        reader.readAsDataURL(file);
    }
});
