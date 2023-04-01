<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'ticket_name'=>fake()->unique()->userName(),
            'sales_id'=>rand(11,25),
            'presales_id'=>rand(2,10),
            'ticket_status'=>rand(-1,2)
        ];
    }
}
