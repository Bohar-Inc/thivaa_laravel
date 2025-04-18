<?php

namespace App\Livewire\Teacher\Attendance;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AttendancePage extends Component
{
    public $year, $month, $grade;

    public $students = [];
    public $attendances = [];

    public $grades = [];

    public function mount(){
        $this->grades = Grade::all();
    }

    public function fetchStudents(){
        if($this->year && $this->month && $this->grade){
            $this->students = Student::where('grade_id', $this->grade)->get();
            foreach($this->students as $student){
                foreach(range(1, Carbon::create($this->year, $this->month)->daysInMonth) as $day){
                    $date = Carbon::create($this->year, $this->month, $day)->format('Y-m-d');
                    $this->attendances[$student->id][$day] = Attendance::where('student_id', $student->id)->whereDate('date', $date)->value('status') ?? 'present';
                }
            }
        }
    }

    public function updateAttendance($studentId, $day, $status)
    {
        $date = Carbon::create($this->year, $this->month, $day)->format('Y-m-d');
        Attendance::updateOrCreate(
            ['student_id' => $studentId, 'date' => $date],
            ['status' => $status, 'grade_id' => $this->grade],
        );

        $this->attendances[$studentId][$day] = $status;

        Toaster::success('Attendance for date : '.$date. ' for studentId '.$studentId.' has been updated successfully.');
    }

    public function markAll($day, $status)
    {
        foreach($this->students as $student){
            $this->updateAttendance($student->id, $day, $status);
        }
    }

    public function render()
    {
        $this->fetchStudents();
        return view('livewire.teacher.attendance.attendance-page', [
            'daysInMonth' => Carbon::create(year: $this->year, month: $this->month)->daysInMonth
        ]);
    }
}
