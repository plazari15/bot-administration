<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class apiTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:token {--new}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Token for users';

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
     * @return mixed
     */
    public function handle()
    {
        if($this->option('new')){
            $users = User::whereNull('api_token')->get();
            foreach ($users as $user){
                $user->api_token = str_random(60);

                $user->save();
            }
            $this->info('A new token generated for all new users');
        }else{
            $users = User::all();
            foreach ($users as $user){
                $user->api_token = str_random(60);

                $user->save();
            }

            $this->info('A new token generated for all users');
        }
    }
}
