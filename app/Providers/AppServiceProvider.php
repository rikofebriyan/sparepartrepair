<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Waitingrepair;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the view composer
        view()->composer('*', \App\Http\Composers\GlobalComposer::class);
        // Waitingrepair::updated(function ($repair) {
        //     if ($repair->status_repair === 'Urgent') {
        //         $data = [
        //             'name' => 123,
        //             'car' => 1123456,
        //             'reason' => 123456789,
        //         ];
        
        //         Mail::send('emails.demo', $data, function ($message) use ($repair) {
        //             $message->to('rikofebriyan@gmail.com', 'PE-Digitalization')
        //                 ->subject('Delay Notification for Your Repair');
        //             $message->from('febriyanomov@gmail.com', 'PE-Digitalization');
        //         });
        //     }
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
