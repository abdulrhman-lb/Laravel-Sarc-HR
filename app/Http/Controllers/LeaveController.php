<?php

namespace App\Http\Controllers;
use App\Models\department;
use App\Models\leave_names;
use App\Models\leaves;
use App\Models\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class LeaveController extends Controller
{
    public function index()
    {
    }

    public function create(Request $request)
    {
        $par = ['leave_names' => leave_names::orderBy('leave_name' , 'ASC')->get(),
                'profiles' => Profile::where('id' , $request -> id)->first(), 
                ];
        return view('leave.create')->with('lists', $par);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'leave_name_id' => ['required', 'min_digits:1'],
            'profile_id' => ['required', 'min_digits:1'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date','after_or_equal:start_date'],
            'document' => 'nullable|file|mimes:pdf|max:512',
        ]);

        // حساب قيمة الاجازة الحالية مع الاجازات السابقة ومقارنتها بالاستحقاق
        $leaveID = $request->leave_name_id;
        $leave = leave_names::where('id', $leaveID)->first();
        if ($leave -> max_day == '0') {
            $profile = Profile::where('id', $request -> profile_id)->first();
            $max = $profile -> leave_day;
        } else {
            $max = $leave -> max_day;
        }

         // استعلام قاعدة البيانات لاسترجاع الإجازات التي تنتمي إلى السنة الحالية
         $leaves = leaves::whereYear('start_date', now()->year)
                         ->where(function($query) use ($request, $leaveID) {
                                          $query->where('profile_id', $request->profile_id)
                                                ->where('leave_name_id', $leaveID)
                                                ->where('coor_approve', '1')
                                                ->where('hr_approve', '1')
                                                ->where('mang_approve', '1');
                                })->get();

        $totalLeaveDays = 0;

        foreach ($leaves as $leave) {
            // تحديد تواريخ بداية ونهاية الإجازة
            $start = $leave->start_date;
            $end = $leave->end_date;

            // حساب إجمالي أيام الإجازة
            $totalLeaveDays += $this->calculateTotalLeaveDays($start, $end)+1;
        }
        $leave_count = $totalLeaveDays;

        $start = $request->start_date;
        $end = $request->end_date;

        $leave_now =  $this->calculateTotalLeaveDays($start, $end)+1;
        $totalLeaveDays += $leave_now;
        if ($totalLeaveDays > $max) {
            return back()->withInput()-> with('message', 'لا يمكن تنفيذ طلب إجازة مدتها ' . $leave_now . 'يوم : استحقاق الإجازات هو '.$max.' يوم استخدمت منها '.$leave_count.' يوم باقي لك '.$max-$leave_count.' يوم ');
        } else {
            $profile = profile::where('id', $request -> profile_id)->first();
            $slug = Str::slug($profile -> full_name_en, '-');
            if (is_null($request -> document)) {
                $NewImageName = '';
            } else {
                $NewImageName =$slug . '-' .uniqid() . '.' . $request->document->extension();
                $request -> document ->move(public_path('images/leave_document'), $NewImageName);
            }
            
            $coordinator = department::where('id', $profile -> department_id)->first();
            leaves::create([
                'leave_name_id'=>$request -> Input('leave_name_id'),
                'coor_approve'=>$coordinator -> coordinator_id,
                'hr_approve'=>$leave -> hr_approve_id,
                'mang_approve'=>$leave -> mang_approve_id,
                'profile_id'=> $request -> input('profile_id'),
                'start_date' => date('Y-m-d', strtotime($request -> input('start_date'))),
                'end_date' => date('Y-m-d', strtotime($request -> input('end_date'))),
                'document' => $NewImageName,
            ]);

            return redirect('/profile/'.$request -> input('profile_id'));
        }
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id, Request $request)
    {
        $po = leaves::find($id);
        $po -> delete();
        return redirect('/profile/'.$request -> input('profile_id')) -> with('message', 'تم حذف الإجازة بنجاح');
    }

// دالة حساب فرق بين تاريخين لارجاع عدد ايام الاجازات
    public function calculateTotalLeaveDays($start, $end) 
    {
        $startDate = Carbon::parse($start);
        $endDate = Carbon::parse($end);

        if ($startDate->isValid() && $endDate->isValid()) {
            $diffInDays = $startDate->diffInDays($endDate);

            return $diffInDays;
        }

        return 0;
    }
// دالة استعادة ملخص الاجازات عند اختيار نوع الإجازة
    public function getleave(Request $request)
    {
        $leaveID = $request->id;
        $leave = leave_names::where('id', $leaveID)->first();
        if ($leave -> max_day == '0') {
            $profile = Profile::where('id', $request -> profile_id)->first();
            $max = $profile -> leave_day;
        } else {
            $max = $leave -> max_day;
        }

         // استعلام قاعدة البيانات لاسترجاع الإجازات التي تنتمي إلى السنة الحالية
         $leaves = leaves::whereYear('start_date', now()->year)
                         ->where(function($query) use ($request, $leaveID) {
                                          $query->where('profile_id', $request->profile_id)
                                                ->where('leave_name_id', $leaveID)
                                                ->where('coor_approve', '1')
                                                ->where('hr_approve', '1')
                                                ->where('mang_approve', '1');
                                })->get();

        $totalLeaveDays = 0;

        foreach ($leaves as $leave) {
            // تحديد تواريخ بداية ونهاية الإجازة
            $start = $leave->start_date;
            $end = $leave->end_date;

            // حساب إجمالي أيام الإجازة
            $totalLeaveDays += $this->calculateTotalLeaveDays($start, $end)+1;
        }

        $leaveDetail = 'الحد الأعظمي للإجازات من النوع المحدد هي ' . $max . ' لقد حصلت على ' . $totalLeaveDays . ' إجازة لهذا العام';
        return response()->json(['value' => $leaveDetail]);

    }

    public function leave_approve()
    {
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        $leaves = leaves::where('coor_approve', $profile -> id)
                        ->orwhere('hr_approve', $profile -> id)
                        ->orwhere('mang_approve', $profile -> id)
                        ->orderby('start_date', 'asc')
                        ->with(['coor', 'hr', 'mang']);

        $pro = ['leaves' => $leaves->get(),
                'profiles' => $profile
                ];
        return view('leave.approve')->with('lists', $pro);
    }
    
    public function leave_done(Request $request)
    {
        if ($request -> level =='c') {
            $leave = leaves::where('id',  $request -> leave_id)->first();
            $profile = Profile::where('id', $leave -> coor_approve)->first();
            leaves::where('id', $request -> leave_id)
                ->update([
                    'coor_approved' => $profile -> id,
                ]);
            }

        if ($request -> level =='h') {
            $leave = leaves::where('id',  $request -> leave_id)->first();
            $profile = Profile::where('id', $leave -> hr_approve)->first();
            leaves::where('id', $request -> leave_id)
                ->update([
                    'hr_approved' => $profile -> id,
                ]);
            }

        if ($request -> level =='m') {
            $leave = leaves::where('id',  $request -> leave_id)->first();
            $profile = Profile::where('id', $leave -> mang_approve)->first();
            leaves::where('id', $request -> leave_id)
                ->update([
                    'mang_approved' => $profile -> id,
                ]);
            }
        return redirect('leave-approve')->with('message', 'تم الموافقة على الإجازة من قبلكم');

    }

}
