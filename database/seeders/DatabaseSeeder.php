<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Models\student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // $this->call([

        //     StudentSeeder::class

        // ]);
        Artist::factory(5)->has(
            Album::factory()->has(
                Song::factory()->count(5)
            )->count(2)
        )->create();





        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
