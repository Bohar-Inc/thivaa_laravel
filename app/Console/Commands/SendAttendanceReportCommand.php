<?php

namespace App\Console\Commands;

use App\Exports\AutomatedAttendanceReportExporter;
use App\Mail\SendAttendanceReportMail;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class SendAttendanceReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:send-report {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Daily or Weekly Attendance Report Via Email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->argument('type');
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        if($type === 'daily') {
            $startDate = $yesterday;
            $endDate = $today;
        }elseif($type === 'weekly'){
            $startDate = $today->copy()->startOfWeek();
            $endDate = $today->copy()->endofWeek();
        }else{
            $this->error('Invalid Type Of Report');
            return;
        }

        $fileName = 'attendance_report_{$type}.xlsx';
        $filePath = 'attendance_reports/{$fileName}';

        Excel::store(new AutomatedAttendanceReportExporter($startDate, $endDate), $filePath, 'public');

        Mail::to('thivaavipul14@gmail.com')->send(new SendAttendanceReportMail($type, $filePath));

        $this->info('{$type} attendance report has been sent successfully!');
    }
}
