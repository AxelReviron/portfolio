<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::create([
            'name' => config('app.admin_name'),
            'email' => config('app.admin_email'),
            'password' => Hash::make(config('app.admin_password')),
        ]);

        $user->assignRole('admin');
    }
}
