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
        // User::factory(10)->create();

        \App\Models\Category::firstOrCreate(['slug' => 'packs'], ['name' => 'Packs', 'description' => 'Exclusive Product Packs']);
        \App\Models\Category::firstOrCreate(['slug' => 'parfums-soinsent-parfumee'], ['name' => 'Parfums: SoinSent Parfumee', 'description' => 'Signature Fragrances']);

        User::updateOrCreate(
            ['email' => 'SS@oumaima.com'],
            [
                'name' => 'Oumaima Admin',
                'password' => bcrypt('1582--SS#2025'),
                'is_admin' => true,
            ]
        );

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
