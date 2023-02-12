<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\Waitingrepair;
use App\Progressrepair;
use Carbon\Carbon;
use DB;

class GlobalComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $notif = Waitingrepair::leftJoin('progressrepairs', 'progressrepairs.form_input_id', '=', 'waitingrepairs.id')
            ->select('waitingrepairs.*', 'progressrepairs.plan_start_repair', 'progressrepairs.plan_finish_repair')
            ->where('progress','<>','finish')
            ->where('progress','<>','Scrap')
            ->where('deleted',null)
            ->where('plan_finish_repair', '<=', Carbon::now()->subDays(0))
            ->get();

            $notifcount = Waitingrepair::leftJoin('progressrepairs', 'progressrepairs.form_input_id', '=', 'waitingrepairs.id')
            ->select('waitingrepairs.*', 'progressrepairs.plan_start_repair', 'progressrepairs.plan_finish_repair')
            ->where('progress','<>','finish')
            ->where('progress','<>','Scrap')
            ->where('deleted',null)
            ->where('plan_finish_repair', '<=', Carbon::now()->subDays(0))
            ->count();

            $waiting_approve = Waitingrepair::all()
        ->where('progress', 'Waiting')
        ->where('approval', null)
        ->where('deleted', null)
        ->count();

        $allprogress = DB::table('waitingrepairs')
        ->where('progress','<>', 'Finish')
        ->whereNotNull('approval')
        ->where('deleted', null)
        ->count();  

            // dd($notif);
        // $view->with('variableName', 'tester');
        $view->with('notif', $notif);
        $view->with('notifcount', $notifcount);
        $view->with('waiting_approve', $waiting_approve);
        $view->with('allprogress', $allprogress);

        
    }
}
