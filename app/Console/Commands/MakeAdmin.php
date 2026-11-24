<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

/**
 * Создаёт администратора или выдаёт права существующему пользователю.
 * php artisan shop:admin admin@example.com
 */
class MakeAdmin extends Command
{
    protected $signature = 'shop:admin {email?} {--name=} {--password=}';

    protected $description = 'Create an admin user (or grant admin rights to an existing one)';

    public function handle(): int
    {
        $email = $this->argument('email') ?? text('Email', required: true, validate: ['email' => 'email']);

        $user = User::where('email', $email)->first();

        if (! $user) {
            $user = new User([
                'email' => $email,
                'name' => $this->option('name') ?? text('Name', default: 'Admin', required: true),
                'password' => $this->option('password') ?? password('Password', required: true, validate: ['password' => 'min:8']),
            ]);
        }

        $user->is_admin = true;
        $user->save();

        $this->components->info("Admin access granted to {$user->email}. Login: " . url('/admin'));

        return self::SUCCESS;
    }
}
