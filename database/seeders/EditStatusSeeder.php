<?php

namespace Database\Seeders;

use App\Models\Proposal;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets=Ticket::all(['ticket_name','ticket_status']);
        foreach($tickets as $ticket){
            if($ticket->ticket_status==2){   
            {
                Proposal::where('ticket_name',$ticket->ticket_name)->update(['is_approved'=>1]);
                
            }         
            if($ticket->ticket_status==0||$ticket->ticket_status==1)
            {
                Proposal::where('ticket_name',$ticket->ticket_name)->update(['is_approved'=>0]);
                
            }
            if($ticket->ticket_status==-1)
                Proposal::where('ticket_name',$ticket->ticket_name)->update(['is_approved'=>-1]);

            }
        }
    }
}
