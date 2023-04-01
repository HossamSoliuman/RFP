<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Proposal;
use App\Models\Request;
use App\Models\Request_answer;
use App\Models\Solution;
use App\Models\Ticket;
use Database\Factories\ProposalFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $this->call([
            SolutionSeeder::class,
            UserSeeder::class
        ]);
        Ticket::factory(1000)->create();
        Proposal::factory(1000)->create();
        Request::factory(1000)->create();
        Request_answer::factory(10)->create();
       // $this->call(EditStatusSeeder::class);

    }
}
