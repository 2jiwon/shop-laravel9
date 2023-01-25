<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '기본 admin user 생성';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Admin::create([
            'uid' => 'admin',
            'email' => 'admin@'.env('APP_DOMAIN'),
            'name' => '관리자',
            'password' => \Hash::make('admin@laravel'),
        ]);

        return Command::SUCCESS;
    }
}
