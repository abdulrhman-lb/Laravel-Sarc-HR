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
            sub_branch_Select.append('<option value="0">-</option>');
            $.each(data, function(key, value) {
                sub_branch_Select.append('<option value="' + value.id + '">' + value.sub_branch +  ' - ' + value.sub_branch_en + '</option>');
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

$(function() {
    $('#birth_date').datepicker({
        autoclose: true,
        Clear: true,
        format: 'yyyy-mm-dd',
    });
  });
  
  $(function() {
    $('#hire_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'yyyy-mm-dd',
    });
  });
  
  $(function() {
    $('#volunteering_date').datepicker({
      autoclose: true,
      Clear: true,
      format: 'yyyy-mm-dd',
    });
  });
  
  $(function() {
    $('#training_date_start').datepicker({
      autoclose: true,
      Clear: true,
      format: 'yyyy-mm-dd',
    });
  });
  
  $(function() {
    $('#training_date_end').datepicker({
      autoclose: true,
      Clear: true,
      format: 'yyyy-mm-dd',
    });
  });

  $(function() {
    $('#training_date_start1').datepicker({
      autoclose: true,
      Clear: true,
      format: 'yyyy-mm-dd',
    });
  });

  $(function() {
    $('#training_date_start2').datepicker({
      autoclose: true,
      Clear: true,
      format: 'yyyy-mm-dd',
    });
  });




import './bootstrap';

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
