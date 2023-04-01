<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Models\Option;
use App\Models\Proposal;
use App\Models\Question;
use App\Models\Request as ModelsRequest;
use App\Models\Request_answer;
use App\Models\Solution;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.profile');
    }
    public function add_user(){
        return view('admin.add_user');
    }
    public function add_presales(){
        $solutions=Solution::whereDoesntHave('user')->get();
       
        return view('admin.add_presales')->with('solutions',$solutions);
    }
    public function create_user(CreateUser $request){
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('msg','succusfully created');
    }
    public function create_presales(CreateUser $request){
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'solution_id'=>$request['solution_id'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('msg','succusfully created');
    }
    public function create_questionnaire(){
        $sols=Solution::all();
        return view('admin.create_questionnaire')->with(['sols'=>$sols]);
       
    }
    public function store_questionnaire(Request $request){
     
        for($i=0;$i<$request->all_number;$i++){
            Question::create([
                'question'=>$request->question[$i],
                'number'=>$i,
                'solution_id'=>$request->sol_id,
                'answer_type'=>$request->type[$i],

            ]);
            $q=Question::orderBy('id','desc')->get('id')->first();
            $qid=$q->id;         
            if($request->type[$i]=='dropdown'||$request->type[$i]=='checkbox'||$request->type[$i]=='radio'){
              $options=$this->get_options($request->option[$i]);
              foreach($options as $option){
                Option::create([
                    'name'=>$option,
                    'question_id'=>$qid
                ]);
              }
            }
        }
        return redirect()->back()->with('msg','Successfully created');
    }
    public function get_options($options){
        return explode('-',$options);
    }
    public function show_users(){
        $sales=User::where('role','team_sales_member')->get(['id','name','email']);

       $presales=User::with('solution')->whereHas('solution')->where('role','presales')->get();
        
        // return $presales;
        return view('admin.show_users')->with(['sales'=>$sales,'presales'=>$presales]);
    }
    public function delete_user($id){
        Ticket::where('sales_id',$id)->orWhere('presales_id',$id);
        User::where('id',$id)->delete();
        return redirect()->route('admin.show_users')->with('msg','Succussfully Deleted');
    }
    public function edit_presales(){

    }
    public function save_edit_presales(){

    }
    public function show_tickets(){
        $waitings=Ticket::with(['sales','request'])->where('ticket_status',0)->paginate(5, ['*'], 'waitings');
        $pendings=Ticket::with(['sales','request'])->where('ticket_status',1)->paginate(5, ['*'], 'pendings');
        $approveds=Ticket::with(['sales','request'])->where('ticket_status',2)->paginate(5, ['*'], 'approveds');
        $closeds=Ticket::with(['sales','request'])->where('ticket_status',-1)->paginate(5, ['*'], 'closeds');
        
        return view('admin.show_tickets')->with([
            'waitings'=>$waitings,
            'pendings'=>$pendings,
            'approveds'=>$approveds,
            'closeds'=>$closeds
        ]);
    }
    public function request_details($ticket_name){
        $request=ModelsRequest::where('ticket_name',$ticket_name)->get()->first();
        $request_answers=Request_answer::where('ticket_name',$ticket_name)->get();
        return view('admin.request_details')->with(['request'=>$request,'request_answers'=>$request_answers]);
    }
    public function show_proposal($ticket_name){
        $previous_modfs=Proposal::where('ticket_name',$ticket_name)->get();
        $is_approved=Proposal::where(['ticket_name'=>$ticket_name,'is_approved'=>1])->count();
        $is_closed=Proposal::where(['ticket_name'=>$ticket_name,'is_approved'=>-1])->count();
        return view('admin.show_proposal')->with(['previous_modfs'=>$previous_modfs,'is_approved'=>$is_approved,
        'ticket_name'=>$ticket_name,
        'is_closed'=>$is_closed      
    ]);
    }
}
