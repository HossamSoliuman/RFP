<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Request as ModelsRequest;
use App\Models\Request_answer;
use App\Models\Ticket;
use App\Traits\SaveFile;
use Illuminate\Http\Request;

class PresalesController extends Controller
{
    use SaveFile;

    public function index(){
        return view('presales.profile');
    }
    public function requests(){
        $id=auth()->user()->id;
        $requests=Ticket::with('sales')->with('request')->where('presales_id',$id)->where('ticket_status',0)->get();
        return view('presales.requests')->with('requests',$requests);
       
    }
    public function request_details($ticket_name){
        $request=ModelsRequest::where('ticket_name',$ticket_name)->get()->first();
        $request_answers=Request_answer::where('ticket_name',$ticket_name)->get();
        return view('presales.request_details')->with(['request'=>$request,'request_answers'=>$request_answers]);
    }
    public function create_proposal($ticket_name){
        $previous_modfs=Proposal::where('ticket_name',$ticket_name)->get();
        $is_approved=Proposal::where(['ticket_name'=>$ticket_name,'is_approved'=>1])->count();
        $is_closed=Proposal::where(['ticket_name'=>$ticket_name,'is_approved'=>-1])->count();
        return view('presales.create_proposal')->with(['previous_modfs'=>$previous_modfs,'is_approved'=>$is_approved,
        'ticket_name'=>$ticket_name,
        'is_closed'=>$is_closed      
    ]);
    }
    public function store_proposal(Request $r){
        $proposal=$this->SaveFile($r->proposal,'proposals');
        Proposal::create([
            'ticket_name'=>$r->ticket_name,
            'proposal'=>$proposal,
            'comment'=>$r->comment,
            'request_review'=>0,
            'type'=>'proposal'      
        ]);
        Ticket::where('ticket_name',$r->ticket_name)->update(['ticket_status'=>1]);       
        return redirect()->route('prsales.create_proposal',['ticket_name'=>$r->ticket_name]);
    }
    public function follow_ticket(){
        $tickets=Ticket::where('presales_id',auth()->user()->id)->paginate(10,['ticket_name','ticket_status']);
        return view('presales.follow_ticket')->with('tickets',$tickets);
    }
}
