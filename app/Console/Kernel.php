<?php

namespace App\Console;

use App;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        App\Console\Commands\expiration::class,
    ] ;
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('user:expire')->everyMinute()->withoutOverlapping();
        $schedule->command('notify:email')->everyFiveMinutes()->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
