<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proposal>
 */
class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
    //    $types=['proposal','review'];
    //     $tickets=Ticket::all(['ticket_name','ticket_status']);
    //     $ticket=$tickets[rand(0,$tickets->count()-1)];
    //     $isApproved=['-1'=>-1,'0'=>0,'1'=>0,'2'=>1];
    //     return [
    //         'ticket_name'=>$ticket->ticket_name,
    //         'proposal'=>'file.pdf',
    //         'comment'=>fake()->sentence(),
    //         'request_review'=>fake()->sentence(),
    //         'type'=>$types[rand(0,1)],
    //         'is_approved'=>$isApproved[$ticket->ticket_status]
    //     ];
    // }
    public function definition()
    {
        $types = ['proposal', 'review'];
        $tickets = Ticket::all(['ticket_name', 'ticket_status']);
        $ticket = $tickets->random();
        $statusToApproval = [
            -1 => -1,
            0 => 0,
            1 => 0,
            2 => 1,
        ];

        return [
            'ticket_name' => $ticket->ticket_name,
            'proposal' => 'file.pdf',
            'comment' => $this->faker->sentence(),
            'request_review' => $this->faker->sentence(),
            'type' => $types[rand(0, 1)],
            'is_approved' => $statusToApproval[$ticket->ticket_status],
        ];
    }
}
