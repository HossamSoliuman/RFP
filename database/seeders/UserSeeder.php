<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' =>'admin',
            'password'=>Hash::make('admin@example.com'),
        ]);
        //presales
        $this->call(PresalesSeeder::class);
        //sales
        User::factory()->create([
            'name'=> 'sales',
            'role' => 'team_sales_member',
            'email'=>'sales@example.com',
            'password'=>Hash::make('sales@example.com')
        ]);

        User::factory()->count(20)->create(['role' => 'team_sales_member']);
       
    }
}
