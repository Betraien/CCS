<?php

namespace App\Http\Controllers;

use App\Client_third_party;
use App\Third_party;
use DB;
use Illuminate\Http\Request;

class ClientThirdPartyController extends Controller
{

    public function create(Request $request)
    {
try{
    $data = $request->validate([
        'client_id' => 'required',
        'platform_id'=> 'required',
        'third_party_id' => 'required'
    ]);
  } catch (\Illuminate\Validation\ValidationException $e){
    return $e->errors();

}
  
   try{
     $query= third_party::select()->where([['id', '=', $request['third_party_id']], ['deleted', '=', '0']])->get();
    }catch (\Illuminate\Database\QueryException $e) {
      if ($e->getCode() == '42S22') {
          return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
      } else if ($e->getCode() == '22007') {
          return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
      } else if ($e->getCode() == '23000') {
          return ['success' => false, 'data' => [], 'message' => "THE ENTERED THIRD PARTY IS ALREADY EXIST!"];
      } else {
          return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
      }
    }
    
    try{
   $check= client_third_party::select()->where([['platform_id', '=', $request['platform_id']], ['deleted', '=', '0'],['client_id', '=', $request['client_id']],['third_party_id', '=', $request['third_party_id']]])->get();
  }catch (\Illuminate\Database\QueryException $e) {
    if ($e->getCode() == '42S22') {
        return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
    } else if ($e->getCode() == '22007') {
        return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
    } else if ($e->getCode() == '23000') {
        return ['success' => false, 'data' => [], 'message' => "THE ENTERED THIRD PARTY IS ALREADY EXIST!"];
    } else {
        return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
    }
  }
  
    
        
        if(count($query)>0 && count($check)<=0){
          $client_third_party = new Client_third_party();
          $client_third_party->client_id = $data['client_id'];
          $client_third_party->third_party_id = $data['third_party_id'];
          $client_third_party->platform_id= $data['platform_id'];
          $client_third_party->save();
          return "third party has been added!";
        } else {
          return "Sorry, we couldn't add the third party..";
        }

    }

    public function delete(Request $request)
    { // if a school admin wants to unsubscripe to a third party
   
      try {
        $data = $request->validate([
            'client_id' => 'required',
            'third_party_id' => 'required',
            'platform_id' => 'required',
            
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return $e->errors();
    }
      try{
        $query = client_third_party::select()->where([['client_id', '=', $request['client_id']], ['deleted', '=', '0'], ['third_party_id', '=', $request['third_party_id']],['platform_id', '=', $request['platform_id']]])->update(['deleted' => 1]);
        
      }catch (\Illuminate\Database\QueryException $e) {
        if ($e->getCode() == '42S22') {
            return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
        } else if ($e->getCode() == '22007') {
            return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
        } else if ($e->getCode() == '23000') {
            return ['success' => false, 'data' => [], 'message' => "THE ENTERED THIRD PARTY IS ALREADY EXIST!"];
        } else {
            return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
        }
    
} 
if(!$query){
  return" there was an error couldnt delete third party";
}
return "the third party has been deleted";
    
  
  
    }
}
