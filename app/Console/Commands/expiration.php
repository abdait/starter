<?php

namespace App\Console\Commands;

use App\Models\User;

use Illuminate\Console\Command;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire user every 5 sconde automaticaly';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users =  User::where('expire' , 0)->get();

        foreach ($users as $user) {
            $user -> update(['expire'=>1]);
        }
        
    }
}
