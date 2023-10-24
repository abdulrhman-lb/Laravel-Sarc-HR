 //دالة تحديث قائمة الشعب عند اختيار الفرع
$('#branch_id').on('change', function() { 
    var branchId = $(this).val();
    
    // استدعاء الشعب المرتبطة بالفروع باستخدام Ajax
    $.ajax({
        url: '/get-sub',
        type: 'GET',
        data: { id: branchId },
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


import './bootstrap';



