<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        // Тестовый администратор — только для локальной разработки.
        // На проде: php artisan shop:admin you@example.com
        if (app()->environment('local')) {
            $admin = User::firstOrNew(['email' => 'admin@example.com']);
            $admin->fill(['name' => 'Admin', 'password' => 'password']);
            $admin->is_admin = true;
            $admin->save();
        }
    }
}
