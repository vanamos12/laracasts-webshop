<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        Product::factory(4)
            ->hasVariants(5)
            //->hasImages(3)
            ->has(Image::factory(3)->sequence(fn(Sequence $sequence) => ['featured' => $sequence->index%3 == 0]))
            ->create();

        User::factory()->create([
            'email' => 'hermann@gmail.com',
            'password' => '12345678'
        ]);
    }
}
