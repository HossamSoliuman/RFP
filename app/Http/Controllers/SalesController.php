<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Question;
use App\Models\Request;
use App\Models\Request_answer;
use App\Models\Solution;
use App\Models\Ticket;
use App\Models\User;
use App\Traits\SaveFile;
use Illuminate\Http\Request as HttpRequest;

class SalesController extends Controller
{
    use SaveFile;
    public function index(){
        return view('sales.profile');
    }
    public function create_ticket(){
        $solutions=Solution::whereHas('user')->get();        
        return view('sales.create_ticket')->with('solutions',$solutions);
       
    }
    public function follow_ticket(){
        $tickets=Ticket::where('sales_id',auth()->user()->id)->paginate(10,['ticket_name','ticket_status']);
        return view('sales.follow_ticket')->with('tickets',$tickets);
    }
    public function show_questions(HttpRequest $request){
        $questions=Question::with('option')->where('solution_id',$request->solution)->get();
        $sales_id=auth()->user()->id; 
        $sales_name=auth()->user()->name;
        $presales=User::where('solution_id',$request->solution)->get(['id','name'])->first();        
        $presales_id=$presales->id; 
        $presales_name=$presales->name; 
        $number=Ticket::where('sales_id',$sales_id)->where('presales_id',$presales_id)->count()+1;
        $ticket_name=$sales_name.'_'.$presales_name.'_'.$number;
        return view('sales.show_questions')->with([
            'questions'=>$questions,
            'ticket_name'=>$ticket_name,
            'sales_id'=>$sales_id,
            'presales_id'=>$presales_id    
    ]);
    }
    public function make_request(HttpRequest $request){
        $n=$request->number_of_questions;
       $cr=$this->SaveFile($request->cr,'sales/cr');    
       $gosi=$this->SaveFile($request->gosi,'sales/gosi');
       for($i=0;$i<$n;$i++)
       {
         $q=$request->question[$i];
         $ans=$request->answer[$i];
         if(is_array($ans))
         {
            $ans=implode('&&',$ans);
         }
         Request_answer::create([
            'ticket_name'=>$request->ticket_name,
            'question'=>$q,
            'answer'=>$ans
         ]);
       }
       Request::create([
        'cname'=>$request->cname,
        'cphone'=>$request->cphone,
        'cemail'=>$request->cemail,
        'caddress'=>$request->caddress,
        'pname'=>$request->pname,
        'ptitle'=>$request->ptitle,
        'cr'=>$cr,
        'gosi'=>$gosi,
        'ticket_name'=>$request->ticket_name
       ]);
       Ticket::create([
        'ticket_name'=>$request->ticket_name,
        'sales_id'=>$request->sales_id,
        'presales_id'=>$request->presales_id,
        'ticket_status'=>0 

       ]);
       return redirect()->route('sales.create_ticket')->with('msg','successfully created');
    }
    public function review_proposal($ticket_name){
        $previous_modfs=Proposal::where('ticket_name',$ticket_name)->get();
        $is_approved=Proposal::where(['ticket_name'=>$ticket_name,'is_approved'=>1])->count();
        $is_closed=Proposal::where(['ticket_name'=>$ticket_name,'is_approved'=>-1])->count();
        return view('sales.review_proposal')->with(['previous_modfs'=>$previous_modfs,'is_approved'=>$is_approved,
        'ticket_name'=>$ticket_name,
        'is_closed'=>$is_closed     
    ]);
    }
    public function store_review(HttpRequest $request){
        
        Proposal::create([
            'ticket_name'=>$request->ticket_name,
            'proposal'=>0,
            'comment'=>0,
            'request_review'=>$request->review,
            'type'=>'review'      
        ]);
        return redirect()->route('sales.review_proposal',['ticket_name'=>$request->ticket_name]);    
    }
    public function approve($ticket_name){
        Ticket::where('ticket_name',$ticket_name)->update(['ticket_status'=>2]);       
        Proposal::where('ticket_name',$ticket_name)->update(['is_approved'=>1]); 
        return redirect()->route('sales.review_proposal',['ticket_name'=>$ticket_name]);    
    }
    public function close($ticket_name){
        Ticket::where('ticket_name',$ticket_name)->update(['ticket_status'=>-1]);
        Proposal::where('ticket_name',$ticket_name)->update(['is_approved'=>-1]);   
        return redirect()->route('sales.review_proposal',['ticket_name'=>$ticket_name]);    

    }
}
