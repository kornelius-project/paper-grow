<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat Admin User Default
        User::factory()->create([
            'name' => 'Admin Paper Grow',
            'email' => 'admin@papergrow.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);

        // Memanggil Product Seeder
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
