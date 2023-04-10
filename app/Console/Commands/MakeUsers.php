<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class MakeUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:users {count=5}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Fake User Data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->argument('count');
        $users = User::factory()->count($count)->create();

        return Command::SUCCESS;
    }
}
