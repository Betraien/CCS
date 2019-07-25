<?php

namespace App\Http\Controllers;

use App\Third_party;
use App\Client_third_party;
use App\User_third_party;
use App\Platform_third_party;
use DB;

use Illuminate\Http\Request;

 //use Ixudra\Curl\Facades\Session;
 
use Ixudra\Curl\Facades\Curl;
use function GuzzleHttp\json_encode;

class ThirdPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         return view('Third_party.index');
        //return view('Third_party.Store');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {
        try {
         $data = $request->validate([
            'title' => 'required',
            'id_token' => 'required',
            'type' => 'required',
            'view_order' => 'required',
            'status' => 'required',
            'position' => 'required',
            'contact_person' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'config' => 'required'
         ]);
 
            } catch (\Illuminate\Validation\ValidationException $e){
                return $e->errors();
        
     }


       // $query = DB::select('SELECT * from third_parties where title=? AND id_token=?', [$data['title'],$data['id_token']]);
       try{
            $thirdparty = new Third_party();

            $thirdparty->title = $data['title'];
            $thirdparty->id_token = $data['id_token'];
            $thirdparty->description = $request['description'];
            $thirdparty->logo = $request['logo'];
            $thirdparty->type = $data['type'];
            $thirdparty->view_order = $data['view_order'];
            $thirdparty->status = $data['status'];
            $thirdparty->position = $data['position'];
            $thirdparty->website = $request['website'];
            $thirdparty->contact_person = $data['contact_person'];
            $thirdparty->contact_phone = $data['contact_phone'];
            $thirdparty->contact_email = $data['contact_email'];
            $thirdparty->public = $request['public'];
            $thirdparty->config = json_encode(["config" => $data['config']]);
            $thirdparty->save();
            return "third party has been added" ;
        }
     catch(\Illuminate\Database\QueryException $e){
        return $e->errors();

}
       
    }

    public function register(Request $request)
    {
        //allow new third party to register in the system
        //POST request
        try {
         $data = $request->validate([
            'title' => 'required',
            'id_token' => 'required',
            'third_party_type_id' => 'required',
            'contact_person' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'config' => 'required'
         ]);
 
            } catch (\Illuminate\Validation\ValidationException $e){
                return $e->errors();
        
     }


        //$query = DB::select('SELECT * from third_parties where title=? AND id_token=?', [$data['title'],$data['id_token']]);
     
       try{
            $thirdparty = new Third_party();

            $thirdparty->title = $data['title'];
            $thirdparty->id_token = $data['id_token'];
            $thirdparty->description = $request['description'];
            $thirdparty->logo = $request['logo'];
            $thirdparty->third_party_type_id = $data['third_party_type_id'];
            $thirdparty->website = $request['website'];
            $thirdparty->contact_person = $data['contact_person'];
            $thirdparty->contact_phone = $data['contact_phone'];
            $thirdparty->contact_email = $data['contact_email'];
            
            $thirdparty->config = json_encode(["config" => $data['config']]);
            $thirdparty->save();
            return "your data have been added succecfully" ;
        }
     catch(\Illuminate\Database\QueryException $e){
        return $e->errors();

}
       
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function viewThirdParty($id)
    {

       $thirdparty =  Third_party::select()->where([['id', '=', $id], ['deleted', '=', '0']])->get();
        
        return $thirdparty;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\third_party  $third_party
     * @return \Illuminate\Http\Response
     */
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request, $id)
    {
        try{
        $data = $request->validate([
            'title' => 'required',
            'id_token' => 'required',
            'type' => 'required',
            'view_order' => 'required',
            'status' => 'required',
            'position' => 'required',
            'contact_person' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
            'config' => 'required'
        ]);
    } catch (\Illuminate\Validation\ValidationException $e){
        return $e->errors();

}
        $title = $data['title'];
        $id_token = $data['id_token'];
        $description = $request['description'];
        $logo = $request['logo'];
        $type = $data['type'];
        $view_order = $data['view_order'];
        $status = $data['status'];
        $position = $data['position'];
        $website = $request['website'];
        $contact_person = $data['contact_person'];
        $contact_phone = $data['contact_phone'];
        $contact_email = $data['contact_email'];
        $public = $request['public'];
        $config = json_encode(["config" => $data['config']]);

        DB::Update(
            
        'UPDATE third_parties SET title=? , id_token=? , description=? , logo=? , type=? ,view_order=? , status=? ,position=? , website=? , contact_person=? , contact_phone=? , contact_email=? , config=? , public=?
        
        WHERE id =?', 
    
        [$title, $id_token, $description, $logo, $type, $view_order, $status, $position,  $website, $contact_person, $contact_phone, $contact_email , $config, $public, $id]
    
        );
        return "Third party has been updated";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\third_party  $third_party
     * @return \Illuminate\Http\Response
     */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function list_third_party(Request $request)
    {


        try{

            $data = $request->validate(['type' => 'required']);
        

        $option = strtolower($data['type']);
        $query = null;

        try {

            if ($option == 'client') {
                //validating client_id and platform_id before querying the database
                $data = $request->validate([ 'client_id' => 'required', 'platform_id' => 'required']);
                $query = Client_third_party::select()->where([['client_id', '=', $data['client_id']],['platform_id', '=', $data['platform_id']], ['deleted', '=', '0']])->get();

            } else if ($option == 'user') {
                //validating user_id and platform_id before querying the database
                $data = $request->validate([ 'user_id' => 'required', 'platform_id' => 'required']);
                $query = User_third_party::select()->where([['user_id', '=', $data['user_id']], ['platform_id', '=', $data['platform_id']], ['deleted', '=', '0']])->get();

            } else if ($option == 'platform') {
                //validating user_id and platform_id before querying the database
                $data = $request->validate(['platform_id' => 'required']);
                $query = User_third_party::select()->where([['platform_id', '=', $data['platform_id']], ['deleted', '=', '0']])->get();

            } else if ($option == 'order') {

                if($request['orderType'] == null){

                    $query = Third_party::select()->where('deleted', '=', '0')->orderBy('view_order', 'asc')->get();

                }else{ 

                    $query = Third_party::select()->where('deleted', '=', '0')->orderBy('view_order', $request['orderType'])->get();

                }
            } else {
                return "Please select listing type";
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }


    } catch (\Illuminate\Validation\ValidationException $e){
        return $e->errors();
}
        if (count($query) > 0) {


            $result = null;
            $i = 0;
            foreach ($query as $row) {
                $i++;
                if ($option == 'order') {

                    if ($row->deleted == 1 || $row->status != 'Active') {
                        //check what does ACTIVE THIRD PARTIES MEANS WITH ASHMAAWIIIIIIII
                        //STATUS TABLE NEED TO BE CREATED IN THE DATABASE

                        $i--;
                        continue;
                    }

                    $object = [
                        'logo' => $row->logo,
                        'title' => $row->title,
                        'description' => $row->description,
                        'website' => $row->website,
                        'id_token' => $row->id_token,
                        'created_at' => $row->created_at,
                        'updated_at' => $row->updated_at

                    ];
                    $result[$i] =  $object;
                } else {
                     //return $row->Third_party->third_party_status_id;
                    if (empty($row->Third_party) == true) {
                        $i--;
                        continue;
                    }
                    if ($row->Third_party->deleted == 1 || $row->Third_party->third_party_status_id != 1) {
                        $i--;
                        continue;
                    }


                    $object = [
                        'logo' => $row->Third_party->logo,
                        'title' => $row->Third_party->title,
                        'description' => $row->Third_party->description,
                        'website' => $row->Third_party->website,
                        'id_token' => $row->Third_party->id_token,
                        'created_at' => $row->Third_party->created_at,
                        'updated_at' => $row->Third_party->updated_at
                    ];
                    $result[$i] = $object;
                }
            
            }

            if ($result != null) {
                return ['success' => true, 'data' => $result];
            } else {
                return ['success' => false, 'data' => [], 'message' => "NO RESULTS"];
            }
        } else {
            return ['success' => false, 'data' => [], 'message' => "NO RESULTS"];
        }
    }

    //////////////////////////////////////////////connect///////////////////////////////////////////////////////
    
    public function connect_third_party(Request $request)
    {
        // Session([

        //     'user_id' => $request['user_id'],
        //     'client_id' => $request['client_id'],
        //     'platform_id' => $request['platform_id'],
        //     'third_party_id' => $request['third_party_id']

        // ]);
        $data = json_encode([
        'user_id' => $request['user_id'],
        'client_id' => $request['client_id'],
        'platform_id' => $request['platform_id'],
        'third_party_id' => $request['third_party_id']
        ]);
        //if($request->query('code') == null){

        $connect = Third_party::select('config')->where([['id', '=', $request['third_party_id']], ['deleted', '=', '0']])->get();

        $checkSubscribtion =  User_third_party::select('user_id', 'client_id', 'platform_id', 'third_party_id')->where([
            ['user_id', '=', $request['user_id']],
            ['client_id', '=', $request['client_id']],
            ['platform_id', '=', $request['platform_id']],
            ['third_party_id', '=', $request['third_party_id']],
            ['deleted', '=', '0']])->get();

          
         //return empty($checkSubscribtion);
    if(count($checkSubscribtion) == 0){

        if(count($connect) == 0){
            return "the third party is undefined";
        }

        //Connect third party to the CCS
        $config = json_decode($connect[0]['config'], true);

        $auth = $config['config']['Auth'];
        $auth = strtolower($auth);

            if ($auth == 'rest') {
                return $this->connectREST($config);
            } else if ($auth == 'oauth') {
                return $this->connectOAuth($data, $config);
            } else {
                return "there is no auth type in the config";
            }
        }
        else{

        return "you are already subscribed to this third party";

        }
        //return $config['header']['Authorization'];
    }




    public function token(Request $request){

        // dd($request);
        $token = $request['code'];  // This is a way how to access a query string in laravel, you should put no parameters in the route
        
        $data = json_decode($request['state'],true);
        $data = json_encode(['data' => $data, 'token' => $token]);

        return $this->saveConnection($data); 

    }


public function connectREST($config){

    $type = $config['config']['type'];
    $url = $config['config']['url'];
    $headers = $config['config']['header'];
    $body = $config['config']['body'];

    $arrayOfHeaders = array();

    //      if(count($headers)!= 0){
        foreach ($headers as $key => $value) { // This loop changes json header to an array to pass it with the curl request
            array_push($arrayOfHeaders, $key . " : " . $value);
        }
    //    }

        //return strcasecmp($type,'post');
        if(strcasecmp($type,'post') == 0){ // ignoraing the case of the request type;
            $response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->post();
            //return $response;
            $request['token'] = $response['id'];
             
        }else if(strcasecmp($type,'get') == 0){
            //$response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->get();
            //return $response;
 
          return redirect($url);
        
        }else{
            return "Error request type";
        }

        return  $this->saveConnection($request['token']);

}

 

    public function connectOAuth($data, $config)
    {

    $type = $config['config']['type'];
    $url = $config['config']['url'];
    $headers = $config['config']['header'];
    $body = $config['config']['body'];

    $arrayOfHeaders = array();

    //      if(count($headers)!= 0){
        foreach ($headers as $key => $value) { // This loop changes json header to an array to pass it with the curl request
            array_push($arrayOfHeaders, $key . " : " . $value);
        }
    //    }

        //return strcasecmp($type,'post');
        if(strcasecmp($type,'post') == 0){ // ignoraing the case of the request type;
            $response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->post();
            //return $response;
             
        }else if(strcasecmp($type,'get') == 0){
            //$response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->get();
            //return $response;
  //          if type == OAuth2 redirect otherwise send curl get request;
                
            return redirect($url . '&state='. $data);
        } else {
            return "Error request type";
        }

        //$this->saveConnection($request['token']);

}


    public function saveConnection($response)
    {
        $response = json_decode($response, true);

        try {
            // $client_third_parties_id = Client_third_party::select('id')->where('client_id', '=', $request['client_id'])->get();
            //check if the client was connected to the third party

            $query = User_third_party::insert([ //inserting array of values 'column' => value
                'user_id' => $response['data']['user_id'],
                'client_id' => $response['data']['client_id'],
                'platform_id' => $response['data']['platform_id'],
                'third_party_id' => $response['data']['third_party_id'],
                'token' => $response['token'],
                'status' => 'Active',
                'expire_date' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),  //since you are using QueryBuilder (insert method) you have to create the timestamp manyally, because Fields created_at,update_at and deleted_at are "part" of Eloquent and you cannot use them in QueryBuilder
                'updated_at' => \Carbon\Carbon::now(),
                'deleted' => '0'
            ]);

             return "The user has been successfully connected to the third party";
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function delete(Request $request)
    {      
        //POST method   /ThirdParty/delete
    //takes a third party id as a parameter
         //delets a third party softly from the database 
         if($request['id']==null){
             return'please type in a third party id';
         }else{
               $id= $request['id'];
        try{
            $TPS = DB::Update("UPDATE third_parties SET deleted =1 WHERE id =". $id);
            $TPS = Third_party::select()->where(["id","=",$id])->get();

$TPS->deleted = 1;

$TPS->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }
         }
      return "the third party has been deleted";
    
    }


      
    public function search($key)
    {
        //GET method      /ThirdParty/search/{key}
        //takes a key as the search term 
        //searches for every record that has similar words of the key in thier title,description,type,status,website,contact info and returns a json object of the record
        try {

            //$query = DB::select("SELECT * FROM third_parties WHERE title LIKE '%$key%' or description LIKE '%$key%'");
                
            $query =Third_party::where('title', 'like', '%' . $key . '%')
            ->orWhere('description', 'like', '%' . $key . '%')->get();
               
              /* $test = Third_party::select()->where([
                    ['id', '=', $key]
                    
                    
                    ])->getQuery()->get()->all();   
*/
                  //  return dd($test);
            if (count($query) > 0) {


                return $this->beatify($query);
            } else {
                echo "no data found";
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }
    }
 


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function reorder(Request $request, $id)
    {
        $new_order = $request['view_order'];
        try{
      //  DB::Update("UPDATE third_parties SET view_order=? WHERE id =?", [$new_order, $id]);

        $TP = Third_party::find($id);
        $TP->view_order = $new_order;
        $TP->save();
        

    } catch (\Illuminate\Database\QueryException $e) {
        return $e->getMessage();
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function show_subscribed_third_parties(Request $request)
{

    $query = null;

    try {

       $query = User_third_party::select()->where([['user_id', '=',  $request['user_id']], ['deleted', '=', '0']])->get();
        
    } catch (\Illuminate\Database\QueryException $e) {
        return $e->getMessage();
    }
      if (count($query) > 0) {

        $result = null;
        $sResult = array();
        $i = 0;
        foreach ($query as $row) {
            $i++;
                //return $row;
                if (empty($row->Third_party) == true) {
                    $i--;
                    continue;
                }
                if ($row->Third_party->deleted == 1 || $row->Third_party->status != 'Active') {
                    //check the status of the third party and if it is deleted or not
                    $i--;
                    continue;
                }

                $result[$i] = $row->Third_party;
               
                 array_push($sResult, $result[$i]); // used for sorting


            //$i++;
        }

        if ($result != null) {
              

            
           return $this->beatify($this->sortThirdPartiesAsJson($sResult,'view_order', 'asc')); // used to sort by view_order
            return ['success' => true, 'data' => $result];
        } else {
            return ['success' => false, 'data' => [], 'message' => "NO RESULTS"];
        }

        
    } else {
        return ['success' => false, 'data' => [], 'message' => "NO RESULTS"];
    }

    
}




public function show_unsubscribed_third_parties(Request $request)
{
    try{

    $data = $request->validate([
        'user_id' => 'required',
        'client_id' => 'required'
         ]);

    } catch (\Illuminate\Validation\ValidationException $e){
    return $e->errors();

}


   try {

    // to show the user the third parties that he can subscribe
   $unsubscribed_public = DB::select("SELECT * from third_parties where deleted = 0 AND status='Active' AND public = 1 AND id not in (SELECT third_party_id from user_third_parties where user_id=?)",[$data['user_id']]);
   $unsubscribed_private = DB::select("SELECT * from third_parties where deleted = 0  AND public = 0 AND id in (select third_party_id from client_third_parties where client_id=?)", [$data['client_id']]);
   


   } catch (\Illuminate\Database\QueryException $e) {
       return $e->getMessage();
   }
   $merged = array();
   $i = 0;
   foreach ($unsubscribed_public as $key => $value) {
     array_push($merged, $value);

   }
   foreach ($unsubscribed_private as $key => $value) {
     array_push($merged, $value);

   }

   return $this->beatify($this->sortThirdPartiesAsJson($merged, 'view_order', 'asc'));     // This will sort the unsubscribed third parties and beatify them in the beatify function


}


public function beatify($arrayOfJsons){
//The method recieves array of Json objects and beatify them by numbering these objects starting from index :1
$i = 1;
$json = null;
 foreach ($arrayOfJsons as $row) {
   $json[$i] = $row;
   $i++;
  }
    return $json;

}

public function sortThirdPartiesAsJson($json, $column, $method){
    //The method sort third_parties by a column eaither asc or desc

  $json = json_decode(json_encode($json), true); // removing stdClass error
  $assoc_array = $json;
  $ids = array();
  foreach($assoc_array as $tp){
      array_push($ids, $tp['id']);
  }
  //return $ids;

  $result = DB::table('third_parties')->whereIn('id', $ids)->orderBy($column,$method)->get();
  return $result;
}



}

/* 
this is a template for the config column in the thirdparty table


{
        "config": {
            "connection-standard": "OAuth/LIT/Rest",
            "HTTP request type": "GET/POST/PUT",
            "url": "url required for the connection",
            "header": {
                "a group of header segmants required for the connection"
            },
            "body": {

                "a group of body segmants required for the connection"
            }
        }
    }*/