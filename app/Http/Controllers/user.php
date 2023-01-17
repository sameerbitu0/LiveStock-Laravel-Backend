<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Farmer;
use App\Models\Signup;
use App\Models\Login;
use App\Models\Add;
use Auth;
class user extends Controller
{
//    function index(Request $request){
//     $farmers = new Farmer;
//     $farmers->name=$request->name;
//     $farmers->number=$request->number;
//     $result=$farmers-> save();
//     if($result){
//         return ["result"=>"Data has been save"];

//     }else{
//      return ["result"=>"operation fail"];
// } }

    // <--Add Function-->//

function add(Request $request){
    $check = Add::where([
        ['tag_no',"=",$request->tag_no],
    ])->first();
    if($check){
        return ["result"=> "You Have already insert Tag_no!"];
    }
    $adds = new Add;
    $adds->tag_no=$request->tag_no;
    $adds->sex=$request->sex;
    $adds->age=$request->age;
    $adds->breed=$request->breed;
    $adds->dob=$request->dob;
    $adds->brith_weight=$request->brith_weight;
    $adds->current_weight=$request->current_weight;
    $adds->purchase_source=$request->purchase_source;
    $adds->entry_date=$request->entry_date;
    $result=$adds-> save();
    if($result){
        return ["result"=>" Add Succesfuly  "];

    }else{
     return ["result"=>"Operation Fail"];
} }

    // <--Add Function End-->//



    // <--Sign-up Function-->//

    function signup(Request $request){
    $check = Signup::where([
        ['email',"=",$request->email],
        ['number',"=",$request->number],
    ])->first();
    if($check){
        return ["result"=> "Please check your email our number"];
    }
    $signup = new Signup;
    $signup->username=$request->username;
    $signup->email=$request->email;
    $signup->number=$request->number;
    $signup->password = Hash::make($request->password);
    $result=$signup-> save();
    if($result){
        return ["result"=>"Create Account Succesful"];
    }else{
     return ["result"=>"Operation Failed"];
    } }

    // <--Sign-up Function End-->//

    // <--Login Function -->//

    public function login(Request $req) {        
        $signup = Signup::where('email', $req->email)->first();
        if(!$signup || !Hash::check($req->password, $signup->password)) {
            return ["error"=> "Email or password is not matched"];
        }
        return $signup;
    }
    
    // <--Login Function End-->//

    public function index(){
        return Add::all();
    }
//  public function login(Request $request){
//      $loginDetails = $request->only('email','password');

//     if(Auth::attempt($loginDetails)){
//          return response()->json(['message'=>'login succesful']);
//      }else{
//          return response()->json(['message'=>'worng login details']);
//      }
//  }
}
