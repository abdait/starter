<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyEmail;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notify for all users every day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       //$users  = User::Select('email')-> get();
       $emails = User::Pluck('email')->toArray();

       $data = ['tilel'=>'programing', 'body'=>'php'];
       foreach ($emails as $email)
       {

        Mail::to($email) ->send(new NotifyEmail($data));
       }

    }
}
