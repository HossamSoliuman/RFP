<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PresalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     //
    // }
    public function run()
    {
        // Call the PresalesFactory to create a presales member for each solution
        foreach (\App\Models\Solution::all() as $solution) {
            $email= $solution->name . '@example.com';
            DB::table('users')->insert([
                'name' => fake()->unique()->userName(),
                'email' =>$email,
                'password' => Hash::make($email),
                'role' => 'presales',
                'solution_id' => $solution->id,
            ]);
        }
    }
}
