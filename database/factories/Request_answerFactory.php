<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request_answer>
 */
class Request_answerFactory extends Factory
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
            'ticket_name'=>$tickets[rand(0,$tickets->count()-1)]->ticket_name,
            'question'=>fake()->sentence(),
            'answer'=>fake()->sentence()
        ];
    }
}
