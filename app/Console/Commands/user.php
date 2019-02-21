<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class User extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:user {name} {password} {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add admin in DB (name, password, email)';

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
        try{
            \App\User::create(
                [
                    'name'=>$this->argument('name'),
                    'password'=>bcrypt($this->argument('password')),
                    'email' => $this->argument('email'),
                    'role' => 'admin'
                ]
            );
        } catch (\Exception $exception){
            $this->error($exception->getMessage());
        }

        return true;
    }
}
