<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tickets=Ticket::all(['ticket_name']);
        return [
            'cname'=>fake()->name(),
            'cphone'=>fake()->phoneNumber(),
            'cemail'=>fake()->email(),
            'caddress'=>fake()->address(),
            'pname'=>fake()->name(),
            'ptitle'=>fake()->name(),
            'cr'=>'file.pdf',
            'gosi'=>'file.pdf',
            'ticket_name'=>$tickets[rand(0,$tickets->count()-1)]->ticket_name,
        ];
    }
}
