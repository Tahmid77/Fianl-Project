<?php

namespace Database\Seeders;

use App\Models\Problem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::factory()->create([
            'name' => 'Morny Tanvir',
            'email' => 'morny@gmail.com'
        ]);
        Problem::factory(6)->create([
            'user_id' => $user->id
        ]);
    }
}
