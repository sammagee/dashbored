<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

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
        $class = config(
            'auth.providers.'.config(
                'auth.guards.'.config(
                    'auth.defaults.guard'
                ).'.provider'
            ).'.model'
        );
        $user = new $class();
        $user->name = $this->ask('[1/4] Name');
        $user->username = $this->ask('[2/4] Username');
        $user->email = $this->ask('[3/4] Email');
        $user->password = \Hash::make($this->secret('[4/4] Password'));

        if ($this->confirm('Do you want to create the user?', true)) {
            $user->save();
            $this->info("User created (id: {$user->id})");
        }

        return true;
    }
}
