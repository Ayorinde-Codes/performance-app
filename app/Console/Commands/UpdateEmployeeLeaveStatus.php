<?php

namespace App\Console\Commands;

use App\Models\Absence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateEmployeeLeaveStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:leave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update employee leave status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employees = User::where('is_on_leave', 1)->get();

        foreach ($employees as $employee) {

            $leaveStarts = $employee->leave_started;

            $leaveDays = $this->getLeaveTypeDay($employee->type_of_leave);

            $leaveEnds = $this->leaveEndWithWeekendChecks($leaveStarts, $leaveDays);

            if( Carbon::today()->format('Y-m-d') == $leaveEnds){
                $employee->is_on_leave = NULL;
                $employee->type_of_leave = NULL;
                $employee->leave_started = NULL;
                $employee->approved_by = NULL;
                $employee->push();
            }
        }
        $this->info('Successfully finished leave.');
    }

    private function leaveEndWithWeekendChecks($oldDate, $leaveDays)
    {
        $startDate = Carbon::createFromFormat('Y-m-d', $oldDate);

        $endDate =  date('Y-m-d', strtotime($startDate. ' + '.$leaveDays.' days'));

        $weekendDays = 0;

        $startTimestamp = strtotime($startDate);
        
        $endTimestamp = strtotime($endDate);
        
        for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24)) {
            if (date("N", $i) > 5) $weekendDays = $weekendDays + 1;
        }

        return date('Y-m-d', strtotime($endDate. ' + '.$weekendDays.' days'));
    }

    private function getLeaveTypeDay($typeOfLeave)
    {
        $leaveDay = Absence::where('id', $typeOfLeave)->first();

        return $leaveDay->time_period;
    }
}
