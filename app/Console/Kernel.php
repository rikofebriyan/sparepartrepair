<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Progressrepair;
use App\Waitingrepair;
use Carbon\Carbon;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            // $progressrepair = Progressrepair::where('plan_finish_repair', '<', Carbon::now())
            // ->whereNull('notified_at')->get();

            $progressrepair = DB::table('waitingrepairs')
            ->join('progressrepairs', 'waitingrepairs.id', '=', 'progressrepairs.form_input_id')
            ->select('waitingrepairs.*', 
            'progressrepairs.place_of_repair', 
            'progressrepairs.analisa', 'progressrepairs.action', 
            'progressrepairs.plan_start_repair', 
            'progressrepairs.plan_finish_repair', 
            'progressrepairs.pic_repair', 
            'progressrepairs.actual_finish_repair', 
            'progressrepairs.plan_start_revision', 
            'progressrepairs.plan_finish_revision', 
            'progressrepairs.reason_revision', 
            'progressrepairs.id as progressid', 
            'progressrepairs.notified_at')
            ->where('progress', '<>', 'finish')
            ->where('progress', '<>', 'Scrap')
            ->where('plan_finish_repair', '<', Carbon::now())
            ->whereNull('notified_at')->get();


        
            foreach ($progressrepair as $repair) {
                $data = [
                    'name' => $repair->pic_repair,
                    'item_name' => $repair->item_name,
                    'item_code' => $repair->item_code,
                    'plan_finish_repair' => Carbon::parse($repair->plan_finish_repair)->format('d-M-Y'),
                    'reason' => 'Repair is delayed',
                ];
        
                Mail::send('emails.demo', $data, function ($message) use ($repair) {
                    $message->to('rikofebriyan@gmail.com', 'PE-Digitalization')
                    ->subject('I-Mirs Delay Notification for Your Repair');
                $message->from('febriyanomov@gmail.com', 'PE-Digitalization');
                });
                
                $notified = Progressrepair::find($repair->progressid);
                $notified->notified_at = Carbon::now();
                $notified->save();
            }
        })->everyMinute();
        
        


    }
}
