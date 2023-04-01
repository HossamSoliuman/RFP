<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $solutions = [
            'MDAWM',
            'MDM',
            'HALA-CALL',
            'SIP-Trunk-Go',
            'SMART-VPN',
            'DIA-Zain',
            'DIA-Mobily',
            'DIA-Go',
            'DIA-Global-IT',
        ];

        $uniqueSolutions = array_map(function ($solution) {
            return ['name' => $solution];
        }, array_unique($solutions));

        DB::table('solutions')->insert($uniqueSolutions);
    }
}
