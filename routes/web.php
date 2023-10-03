<?php

use App\Models\Attendance;
use App\Models\Extension;
use App\Models\Program;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentSection;
use App\Models\Year;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\IOFactory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("welcome");
});

Route::get('/attendance/{time}', function ($time) {
    return view('attendance', ['time' => $time]);
});

Route::get('/create', function () {
    return view('create');
});

Route::post('/create', function () {
    request()->validate([
        'code' => 'unique:students,code',
        'extension' => 'exists:extensions,extension',
        'first_name' => 'required',
        'last_name' => 'required',
    ]);

    $student = Student::create([
        'first_name' => request()->first_name,
        'last_name' => request()->last_name,
        'middle_initial' => request()->middle_initial,
        'code' => request()->code,
    ]);

    Attendance::create([request()->time => Carbon::now(), 'student_id' => $student->id]);

    if (request()->extension != '') {
        $student->update(['extension_id', Extension::where('extension', strtoupper(request()->extension))->id]);
    }

    return redirect('/attendance/' . request()->time)->with("Attendance recorded");
});

Route::get('/attendance/{time}/{id}', function ($time, $id) {

    $student = Student::where('code', $id)->first();

    if (!$student) {
        return "Create Student";
    }


    $attendance = Attendance::where('student_id', $student->id)->first();


    if (!$attendance) {
        Attendance::create([$time => Carbon::now(), 'student_id' => $student->id]);
        return 'Attendance Recorded';
    } else {

        if ($time == 'am') {
            if ($attendance->am != null) {
                return "STUDENT ALREADY RECORDED";

            }
            $attendance->update(['am' => Carbon::now()]);
            return 'Attendance Recorded';

        } else if ($time == 'pm') {
            if ($attendance->pm != null) {
                return "STUDENT ALREADY RECORDED";

            }
            $attendance->update(['pm' => Carbon::now()]);
            return 'Attendance Recorded';

        } else if ($time == 'lunch') {
            if ($attendance->lunch != null) {
                return "STUDENT ALREADY RECORDED";

            }
            $attendance->update(['lunch' => Carbon::now()]);
            return 'Lunch Recorded';
        }
    }
});