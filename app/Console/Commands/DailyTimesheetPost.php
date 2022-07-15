<?php

namespace App\Console\Commands;

use App\Models\Timesheet;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyTimesheetPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timesheet:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to post timesheet daily for employee on leave';

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

        foreach ($employees as $key => $value) {
            # create time sheet 
            $createTimesheet = Timesheet::create([
                'GenEntityID' => $value->GenEntityID,
                'level' => 3,
                'status' => Timesheet::PROCESSING,
                'description' => NULL,
                'is_on_leave' => 1,
                'type_of_leave' => 6,
                'time_worked' => 8,
                'standard_time' => 8,
                'over_time' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $this->info('Successfully created timesheeet.');
    }
}
