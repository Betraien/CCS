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
        'third_party_id' => 'required'
    ]);
  } catch (\Illuminate\Validation\ValidationException $e){
    return $e->errors();

}
    $query = DB::select('SELECT * from third_parties where deleted = 0 AND id=?', [$data['third_party_id']]);

    $check = DB::select('SELECT * from client_third_parties where deleted = 0 AND client_id=? AND third_party_id=?', [$data['client_id'],$data['third_party_id']]);

        if($query && !$check){
          $client_third_party = new Client_third_party();
          $client_third_party->client_id = $data['client_id'];
          $client_third_party->third_party_id = $data['third_party_id'];
          $client_third_party->save();
          return "third party added!";
        } else {
          return "Sorry, we couldn't add the third party..";
        }

    }

    public function delete(Request $request)
    { // if a school admin wants to unsubscripe to a third party
      $query = Client_third_party::select('id')->where([['client_id', '=', $request->get('client_id')], ['deleted', '=', '0'], ['third_party_id', '=', $request->get('third_party_id')]])->get();
      if (!$query){
        return "Sorry, this third party cannot be found..";
      }
      $delete = DB::select("UPDATE client_third_parties SET deleted = 1 WHERE id =" . $query[0]['id']);
      return "this third party has been deleted..";
  
  
    }
}
