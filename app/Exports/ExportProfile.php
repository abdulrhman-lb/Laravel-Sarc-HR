<?php

namespace App\Exports;

use App\Models\Profile;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Borders;
use App\Models\training_trainee;


class ExportProfile implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize

{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        // قائمة بأسماء الأعمدة
        return [
            'الفرع',
            'الشعبة',
            'النقطة',
            'القسم',
            'الرقم الوطني',
            'الاسم',
            'الكنية',
            'اسم الأب',
            'اسم الأم',
            'الجنس',
            'مكان الولادة',
            'تاريخ الولادة',
            'الحالة الاجتماعية',
            'رقم الهاتف الخليوي',
            'رقم الهاتف الأرضي',
            'نوع الشهادة الدراسية',
            'تفاصيل المحصل العلمي',
            'الصفة الهلالية',
            'المنصب',
            'تاريخ التطوع',
            'تاريخ التوظيف',
            'زمرة الدم',
            'الاسم الكامل بالانكليزية',
            'المنصب بالانكليزية',
            'مقاس الحذاء',
            'مقاس الخصر',
            'مقاس الكتفين',
            'البريد الالكتروني',
            'الصورة الشخصية',
            'الدورات التدريبية المتبعة',
            // ...
        ];
    }

    public function map($row): array
    {
        $courses = training_trainee::where('trainee_id', ($row->id))
                ->join('training_courses', 'training_trainees.training_course_id', '=', 'training_courses.id')
                ->join('trainings', 'training_courses.training_id', '=', 'trainings.id')
                ->pluck('trainings.training','trainings.training_en')
                ->implode(' - ');
            
        // قم بإعادة هندسة البيانات هنا
        return [
            'branch' => $row->branch->branch. ' - ' . $row->branch->branch_en, // افترض أن العلاقة تسمى city وتحتوي على الاسم
            'sub_branch' => $row->sub_branch->sub_branch. ' - ' . $row->sub_branch->sub_branch_en, // افترض أن العلاقة تسمى city وتحتوي على الاسم
            'Point' => $row->point,
            'department' => $row->department->department . ' - ' . $row->department->department_en,
            'national_number' => $row->national_number,
            'first_name' => $row->first_name,
            'last_name' => $row->last_name,
            'father_name' => $row->father_name,
            'mother_name' => $row->mother_name,
            'gender' => $row->gender->gender. ' - ' . $row->gender->gender_en,
            'birth_place' => $row->birth_place,
            'birth_date' => $row->birth_date,
            'marital_status' => $row->marital_status->marital_status . ' - ' . $row->marital_status->marital_status_en,
            'mobile_phone' => $row->mobile_phone,
            'phone' => $row->phone,
            'certificate' => $row->certificate->certificate . ' - ' . $row->certificate->certificate_en,
            'certificate_details' => $row->certificate_details,
            'jop_title' => $row->jop_title->jop_title . ' - ' . $row->jop_title->jop_title_en,
            'position' => $row->position,
            'volunteering_date' => $row->volunteering_date,
            'hire_date' => $row->hire_date,
            'blood_group' => $row->blood_group,
            'full_name_en' => $row->full_name_en,
            'position_en' => $row->position_en,
            'shoes_size' => $row->shoes_size,
            'waist_size' => $row->waist_size,
            'shoulders_size' => $row->shoulders_size,
            'email' => $row->email,
            'image' => $row->image,
            'courses' => $courses,
            // ...
        ];
    }

    public function styles(Worksheet $sheet)
    {
         // تحديد توسيط النص لكل الخلايا في الورقة
         $sheet->getStyle($sheet->calculateWorksheetDimension())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // تحديد تنسيقات النص
        // $sheet->getStyle('A1')->getFont()->setSize(14); // تحديد حجم الخط في الخلية A1
        $sheet->getStyle('1')->getFont()->setBold(true); // جعل النص في العمود B غامقًا
        $sheet->getStyle('1')->getBorders()->getAllBorders(true); // جعل النص في العمود B غامقًا
        // يمكنك إضافة المزيد من التنسيقات حسب احتياجاتك

        $sheet->setRightToLeft(true);

        // تحديد خصائص الحدود لكل الخلايا في الورقة
        $sheet->getStyle($sheet->calculateWorksheetDimension())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ]);

    }

    public function collection()
    {


        $br = session('branch_id');
        $sb = session('sub_branch_id');
        $dp = session('department_id');
        $nm = session('first_name');
        $ln = session('last_name');
        $gn = session('gender_id');
        $ms = session('marital_status_id');
        $cf = session('certificate_id');
        $cd = session('certificate_details');
        $jt = session('jop_title_id');
        $query = Profile::query(); 
        if ($br) {$query->where('branch_id', $br);}
        if ($sb) {$query->where('sub_branch_id', $sb);}
        if ($dp) {$query->where('department_id', $dp);}
        if ($nm) {$query->where('first_name', 'like' , '%'.$nm.'%');}
        if ($ln) {$query->where('last_name', 'like' , '%'.$ln.'%');}
        if ($gn) {$query->where('gender_id', $gn);}
        if ($ms) {$query->where('marital_status_id', $ms);}
        if ($cf) {$query->where('certificate_id', $cf);}
        if ($cd) {$query->where('certificate_details', 'like' , '%'.$cd.'%');}
        if ($jt) {$query->where('jop_title_id', $jt);}
        return $query->get();
    }

    public function sheetView(): array
    {
        // تحديد خصائص عرض الورقة لتغيير اتجاه الكتابة للورقة بأكملها
        return [
            'sheetView' => [
                'rightToLeft' => true,
            ],
        ];
    }
}
