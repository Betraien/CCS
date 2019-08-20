<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Status;
use App\Third_party;
use App\Client_third_party;
use App\Third_party_type;
use App\User_third_party;
use App\Request_partnership;
use App\Platform_third_party;
use App\User;
// use App\User;
// use Carbon\Carbon;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class ThirdPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data = Third_party::select()->where([['deleted', '=', '0']])->get();

    //     return view('Third_party.dashboard')->with('data', $data);
    //     //return view('Third_party.Store');
    // }
    public function dashboard()
    {

        $data = Third_party::select()->where([['deleted', '=', '0']])->get();
        //   return $this->jsonToArray($data[0]);
        return view('Third_party.dashboard')->with('data', $data);
        //view('Third_party.index');

    }

    public function index()
    {

        $data = Third_party::select()->where([['deleted', '=', '0']])->get();
        //   return $this->jsonToArray($data[0]);
        return view('Third_party.index')->with('data', $data);
        //view('Third_party.index');

    }


    public function createAdmin(request $request)
    {

        try {
            $data = $request->validate([
                'name' => 'required',

                'password' => 'required',
                'email' => 'required',

            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->errors();
        }

        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);


            return redirect()->route('dashboard');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else if ($e->getCode() == '23000') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else {
                return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }
    }


    public function getRequests()
    {

        $data = Request_partnership::select()->where([['deleted', '=', '0']])->get();
        //   return $this->jsonToArray($data[0]);
        return view('Third_party.request')->with('data', $data);
        //view('Third_party.index');

    }

    public function getRecords()
    {

        $data = Third_party::select()->where([['deleted', '=', '1']])->get();
        //   return $this->jsonToArray($data[0]);
        return view('Third_party.record')->with('data', $data);
        //view('Third_party.index');

    }

    public function restore_third_party($id)
    {

        $data = Third_party::select()->where('id', '=', $id)->update(['deleted' => '0']);
        //   return $this->jsonToArray($data[0]);
        //echo "<script>alert('Third Party Restored Successfully');</script>";

        return redirect(route('dashboard', ['success' => true, 'data' => [], 'message' => "Third Party Has Been Restored!"]));

        //view('Third_party.index');

    }




    public function connect()
    {

        return view('Third_party.connect');
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
                'third_party_type_id' => 'required',
                'view_order' => 'required',
                'status_id' => 'required',
                'position' => 'required',
                'contact_person' => 'required',
                'contact_phone' => 'required',
                'contact_email' => 'required',
                'config' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->errors();
        }


        // $query = DB::select('SELECT * from third_parties where title=? AND id_token=?', [$data['title'],$data['id_token']]);
        try {
            $thirdparty = new Third_party();

            $thirdparty->title = $data['title'];
            $thirdparty->id_token = $data['id_token'];
            $thirdparty->description = $request['description'];

            if (isset($request['logo'])) {
                $logo = $request['logo'];
                $fileName = $logo->getClientOriginalName();
                $logo->move('images', $fileName);
                $thirdparty->logo = 'images/' . $fileName;
            }

            $thirdparty->third_party_type_id = $data['third_party_type_id'];
            $thirdparty->view_order = $data['view_order'];
            $thirdparty->status_id = $data['status_id'];
            $thirdparty->position = $data['position'];
            $thirdparty->website = $request['website'];
            $thirdparty->contact_person = $data['contact_person'];
            $thirdparty->contact_phone = $data['contact_phone'];
            $thirdparty->contact_email = $data['contact_email'];
            $thirdparty->public = $request['public'];
            $thirdparty->config = json_encode(["config" => $data['config']]);
            $thirdparty->save();

            return redirect(route('dashboard', ['success' => true, 'data' => [], 'message' => "third party has been added"]));
            // return "third party has been added";
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]]));
                //return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"]));
                //return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else if ($e->getCode() == '23000') {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]]));
                //return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"]));
                //return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }
    }
    public function create_interface()
    {

        $status = Status::select()->where([['table_name', '=', 'third_parties'], ['deleted', '=', '0']])->get();
        $third_party_types = Third_party_type::select()->where('deleted', '=', '0')->get();
        return view('Third_party.create')->with(['status' => $status, 'third_party_types' => $third_party_types]);
    }

    public function requestPartnership(Request $request)
    {
        //allow new third party to register in the system
        //POST request
        try {
            $data = $request->validate([
                'third_party_title' => 'required',
                'description' => 'required',
                'website' => 'required',
                'contact_person' => 'required',
                'contact_phone' => 'required',
                'contact_email' => 'required'
                //'status_id' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->errors();
        }


        //$query = DB::select('SELECT * from third_parties where title=? AND id_token=?', [$data['title'],$data['id_token']]);

        try {

            $requestPartnership = new Request_partnership();

            $requestPartnership->third_party_title = $data['third_party_title'];
            $requestPartnership->description = $data['description'];
            $requestPartnership->website = $data['website'];
            $requestPartnership->contact_person = $data['contact_person'];
            $requestPartnership->contact_phone = $data['contact_phone'];
            $requestPartnership->contact_email = $data['contact_email'];
            $requestPartnership->status_id =  '2'; // 2 => pending -------------------------------------------------------------------------------------> DOCUMENTATION SHABIB
            $requestPartnership->save();

            return "your data has been added succecfully";
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else if ($e->getCode() == '23000') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else {
                return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function viewThirdParty($id)
    {
        $callerFunction = debug_backtrace()[1]['function'];   //retrieve the caller function

        try {
            $thirdparty =  Third_party::select()->where([['id', '=', $id], ['deleted', '=', '0']])->get()->all();
        } catch (\Illuminate\Database\QueryException $e) {
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

        if ($callerFunction == 'update_interface') {
            $status = Status::select()->where([['table_name', '=', 'third_parties'], ['deleted', '=', '0']])->get();
            $third_party_types = Third_party_type::select()->where('deleted', '=', '0')->get();
            return view('Third_party.update')->with(['tp' => $thirdparty, 'status' => $status, 'third_party_types' => $third_party_types]);
        } else {
            return view('Third_party.view')->with('tp', $thirdparty);
        }
    }
    public function update_interface($id)
    {
        return $this->viewThirdParty($id);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////
    public function update($id)
    {

        try {

            $assoc_array = request()->all();
            unset($assoc_array['id']); //This line is ignoring the id in case the user has put it within the request body

            if (isset($assoc_array['logo'])) {
                $logo = $assoc_array['logo'];
                $fileName = $logo->getClientOriginalName();
                $logo->move('images', $fileName);
                $assoc_array['logo'] = 'images/' . $fileName;
            }
            $query = Third_party::select()->where('id', '=', $id)->update($assoc_array);

            if ($query == 1) {
                return redirect(route('index', ['success' => true, 'data' => [], 'message' => "Third party has been updated!"]));
                // return "Third party has been updated!";
            } else {
                // return "The selected third party was not found!";
                return redirect(route('index', ['success' => false, 'data' => [], 'message' => "The selected third party was not found!"]));
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return redirect(route('index', ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]]));
                // return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return redirect(route('index', ['success' => false, 'data' => [], 'message' => "WRONG FORMAT FOR ONE OR MORE OF YOUR INPUTS!"]));
                // return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT FOR ONE OR MORE OF YOUR INPUTS!"];
            } else {
                return redirect(route('index', ['success' => false, 'data' => [], 'message' => "PLEASE CHECK YOUR INPUTS!"]));
                //  return ['success' => false, 'data' => [], 'message' => "PLEASE CHECK YOUR INPUTS!"];
            }
        }
    }

    public function listThirdPartyBy($type, $type_id, $platform_id = null)
    {
        /*
            The method takes three or two paramteres depends on the type and there are two possiblities:
                
                1 - if the type was either client or user it will take three parameters, $type, $type_id and $platform_id where $type is the listing type (user or client) , $type_id is the id of either client or user
                    and the platform_id which is the platform id 
                2 - if the type was either platform or order it will take two parameters, $type and $type_id where $type is the listing type (platform or order).
                   
                        Note that $type_id in this case will have two possiblites depends on the type: 
                              - if the type was platform then $type_id will be processed as it is the platform_id.
                              - if the type was order then $type_id will be processed as it is the orderType which is either (asc, desc).
        
        */
        try {
            $option = strtolower($type);
            $query = null;
            if ($platform_id != null) {
                if ($option == 'client') {
                    $query = Client_third_party::select()->where([['client_id', '=', $type_id], ['platform_id', '=', $platform_id], ['deleted', '=', '0']])->get();
                } else if ($option == 'user') {
                    //check if the thirdparty is in the platform unless it assumed that the platform is connected to the thirdparty
                    // $Platform_third_party = Platform_third_party::select()->where([['platform_id', '=', $platform_id], ['deleted', '=', '0']])->get();

                    $query = User_third_party::select()->where([['user_id', '=', $type_id], ['platform_id', '=', $platform_id], ['deleted', '=', '0']])->get();
                } else if ($option == 'platform') {
                    //return "listing third party by platform needs only one parameter to be passed";
                    return ['success' => false, 'data' => [], 'message' => "Listing third parties by platform needs only one parameter to be passed"];
                } else {
                    //return "Please check your inputs";
                    return ['success' => false, 'data' => [], 'message' => "Please check your inputs"];
                }
            } else {
                $platform_id = $type_id;
                if ($option == 'platform') {
                    // $query = Client_third_party::select('platform_id', 'third_party_id')
                    //     ->where([['platform_id', '=', $platform_id], ['deleted', '=', '0']])
                    //     ->groupBy(['platform_id', 'third_party_id'])
                    //     ->get();
                    $query = Platform_third_party::select()->where([['platform_id', '=', $platform_id], ['deleted', '=', '0']])->get();
                } else if ($option == 'order') {
                    $orderType = strtolower($platform_id);
                    if ($orderType == null) {
                        $query = Third_party::select()->where('deleted', '=', '0')->orderBy('view_order', 'asc')->get();
                    } else {
                        if ($orderType == 'asc' || $orderType == 'desc') {
                            $query = Third_party::select()->where('deleted', '=', '0')->orderBy('view_order', $orderType)->get();
                        } else {
                            // return "please select a valid order type";
                            return ['success' => false, 'data' => [], 'message' => "Please select a valid order type"];
                        }
                    }
                } else {
                    if (($option == 'client' || $option == 'user') && $type_id != null) {
                        //return "please type the platform id";
                        return ['success' => false, 'data' => [], 'message' => "Please type the platform id"];
                    } else if ($option == 'client' || $option == 'user') {
                        //return "Please type the " . $option . " id";
                        return ['success' => false, 'data' => [], 'message' => "Please type the " . $option . " id"];
                    } else {
                        //return "listing type is missing";
                        return ['success' => false, 'data' => [], 'message' => "Please select a valid listing type"];
                    }
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }
        if (count($query) > 0) {
            $result = null;
            $i = 0;
            foreach ($query as $row) {
                $i++;
                if ($option == 'order') {
                    if ($row->deleted == 1 || $row->status_id != 1) {
                        //check what does ACTIVE THIRD PARTIES MEANS WITH ASHMAAWIIIIIIII
                        //STATUS TABLE NEED TO BE CREATED IN THE DATABASE
                        $i--;
                        continue;
                    }

                    $object = [
                        'id' => $row->id,
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
                    if (empty($row->Third_party) == true) {
                        $i--;
                        continue;
                    }
                    if ($row->Third_party->deleted == 1 || $row->Third_party->status_id != 1) {
                        $i--;
                        continue;
                    }
                    $object = [
                        'id' => $row->Third_party->id,
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
                //return ['success' => true, 'data' => $result];
                return view('Third_party.listThirdParty', ['success' => true, 'data' => $result, 'message' => "Search Completed!"]);
            } else {
                // return ['success' => false, 'data' => [], 'message' => "NO RESULTS"];
                return view('Third_party.listThirdParty', ['success' => true, 'data' => [], 'message' => "NO RESULTS"]);
            }
        } else {
            // return ['success' => false, 'data' => [], 'message' => "NO RESULTS"];
            return view('Third_party.listThirdParty', ['success' => true, 'data' => [], 'message' => "NO RESULTS"]);
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function list_third_party(Request $request)
    {

        try {

            $data = $request->validate(['type' => 'required']);


            $option = strtolower($data['type']);
            $query = null;

            try {

                if ($option == 'client') {
                    //validating client_id and platform_id before querying the database
                    $data = $request->validate(['client_id' => 'required', 'platform_id' => 'required']);
                    $query = Client_third_party::select()->where([['client_id', '=', $data['client_id']], ['platform_id', '=', $data['platform_id']], ['deleted', '=', '0']])->get();
                } else if ($option == 'user') {
                    //validating user_id and platform_id before querying the database
                    $data = $request->validate(['user_id' => 'required', 'platform_id' => 'required']);
                    $query = User_third_party::select()->where([['user_id', '=', $data['user_id']], ['platform_id', '=', $data['platform_id']], ['deleted', '=', '0']])->get();
                } else if ($option == 'platform') {
                    //validating user_id and platform_id before querying the database
                    $data = $request->validate(['platform_id' => 'required']);
                    $query = User_third_party::select()->where([['platform_id', '=', $data['platform_id']], ['deleted', '=', '0']])->get();
                } else if ($option == 'order') {

                    if ($request['orderType'] == null) {

                        $query = Third_party::select()->where('deleted', '=', '0')->orderBy('view_order', 'asc')->get();
                    } else {

                        $query = Third_party::select()->where('deleted', '=', '0')->orderBy('view_order', $request['orderType'])->get();
                    }
                } else {
                    return "Please select listing type";
                }
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->getCode() == '42S22') {
                    return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
                } else if ($e->getCode() == '22007') {
                    return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
                } else {
                    return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
                }
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->errors();
        }
        if (count($query) > 0) {


            $result = null;
            $i = 0;
            foreach ($query as $row) {
                $i++;
                if ($option == 'order') {

                    if ($row->deleted == 1 || $row->status_id != 1) {
                        //check what does ACTIVE THIRD PARTIES MEANS WITH ASHMAAWIIIIIIII
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
                    //return $row->Third_party->status_id;
                    if (empty($row->Third_party) == true) {
                        $i--;
                        continue;
                    }
                    if ($row->Third_party->deleted == 1 || $row->Third_party->status_id != 1) {
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
                return ['success' => false, 'data' => [], 'message' => "NO RESULTS!"];
            }
        } else {
            return ['success' => false, 'data' => [], 'message' => "NO RESULTS!"];
        }
    }

    //////////////////////////////////////////////connect///////////////////////////////////////////////////////

    public function connect_third_party(Request $request)
    {

        try {

            $data = $request->validate([
                'user_id' => 'required',
                'client_id' => 'required',
                'platform_id' => 'required',
                'third_party_id' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->errors();
        }



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
            ['deleted', '=', '0']
        ])->get();


        //return empty($checkSubscribtion);
        if (count($checkSubscribtion) == 0) {

            if (count($connect) == 0) {
                return "the third party is undefined";
            }

            //Connect third party to the CCS
            $config = json_decode($connect[0]['config'], true);

            $ConnectionStandard = $config['config']['Requests']['1']['Authentication-type'];
            $ConnectionStandard = strtolower($ConnectionStandard);

            if ($ConnectionStandard == 'rest') {
                return $this->connectREST($data, $config);
            } else if ($ConnectionStandard == 'oauth') {
                return $this->connectOAuth($data, $config);
            } else {
                return ['success' => false, 'data' => [], 'message' => "THE CONNECTION STANDARD IN THE CONFIG IS NOT SUPPORTED!"];
            }
        } else {

            return ['success' => false, 'data' => [], 'message' => "YOU ARE ALREADY CONNECTED TO THIS THIRD PARTY!"];
        }
        //return $config['header']['Authorization'];
    }




    public function token(Request $request)
    {

        $token = $request['code'];  // This is a way how to access a query string in laravel, you should put no parameters in the route
        $data = ['data' => $request['state'], 'token' => $token];
        $data['data'] = json_decode(decrypt($data['data']), true); // decrypting data

        return $this->saveConnection($data);
    }


    public function connectREST($data, $config)
    {

        $type = $config['config']['Requests']['1']['type'];
        $url = $config['config']['Requests']['1']['url'];
        $headers = $config['config']['Requests']['1']['header'];
        $body = $config['config']['Requests']['1']['body'];

        $arrayOfHeaders = array();

        //      if(count($headers)!= 0){
        foreach ($headers as $key => $value) { // This loop changes json header to an array to pass it with the curl request
            array_push($arrayOfHeaders, $key . " : " . $value);
        }
        //    }

        //return strcasecmp($type,'post');
        if (strcasecmp($type, 'post') == 0) { // ignoraing the case of the request type;
            $response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->post();
            //return $response;
            $request['token'] = $response['id'];
        } else if (strcasecmp($type, 'get') == 0) {
            $response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->get();
            //  return $response;

            // return redirect($url);

        } else {
            return "Error request type";
        }

        if ($response == null) {
            return ['success' => false, 'data' => [], 'message' => "No response!, please check your http request"];
        } else {

            $token = $request['token'];  // This is a way how to access a query string in laravel, you should put no parameters in the route
            $data = ['data' => json_decode($data, true), 'token' => $token];
            //$response = json_decode($data, true);
            return  $this->saveConnection($data);
        }
    }



    public function connectOAuth($data, $config)
    {

        $type = $config['config']['Requests']['1']['type'];
        $url = $config['config']['Requests']['1']['url'];
        $headers = $config['config']['Requests']['1']['header'];
        $body = $config['config']['Requests']['1']['body'];

        $arrayOfHeaders = array();

        //      if(count($headers)!= 0){
        foreach ($headers as $key => $value) { // This loop changes json header to an array to pass it with the curl request
            array_push($arrayOfHeaders, $key . " : " . $value);
        }
        //    }

        //return strcasecmp($type,'post');
        if (strcasecmp($type, 'post') == 0) { // ignoraing the case of the request type;

            ///////////////////////////////////////////////////////////////THIS BLOCK REQEUST HAS NOT BEEN TESTED YET !!!! ///////////////////////////////////////////
            $response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->post();
            //return $response;

        } else if (strcasecmp($type, 'get') == 0) {
            //$response = Curl::to($url)->withHeaders($arrayOfHeaders)->withData($body)->asJson(true)->get();
            //return $response;
            //          if type == OAuth2 redirect otherwise send curl get request;

            return redirect($url . '&state=' . encrypt($data)); //encrypting the data so it won't be shown to the user as a text plain

        } else {
            return "Error request type";
        }

        //$this->saveConnection($request['token']);

    }

    public function disconnectThirdParty($userID, $platformID, $thirdPartyID)
    {

        if ($userID == null || $thirdPartyID == null || $platformID == null) {
            return 'no IDs were passed';
        }

        try {
            //       $TPS = DB::Update("UPDATE third_parties SET deleted =1 WHERE id =". $id);
            $query = User_third_party::select()->where([['user_id', '=',  $userID], ['third_party_id', '=', $thirdPartyID], ['platform_id', '=',  $platformID], ['deleted', '=',  0]])->update(['deleted' => 1]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else {
                return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }

        if ($query == 1) {
            return "Third party is disconnected now!";
        } else {
            return "there is no such connection!";
        }
    }




    public function saveConnection($response)
    {

        try {
            // $client_third_parties_id = Client_third_party::select('id')->where('client_id', '=', $request['client_id'])->get();
            //check if the client was connected to the third party
            //  return $response;
            $query = User_third_party::insert([ //inserting array of values 'column' => value
                'user_id' => $response['data']['user_id'],
                'client_id' => $response['data']['client_id'],
                'platform_id' => $response['data']['platform_id'],
                'third_party_id' => $response['data']['third_party_id'],
                'token' => $response['token'],
                'status_id' => '1',
                'expire_date' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),  //since you are using QueryBuilder (insert method) you have to create the timestamp manually, because Fields created_at,update_at and deleted_at are "part" of Eloquent and you cannot use them in QueryBuilder
                'updated_at' => \Carbon\Carbon::now(),
                'deleted' => '0'
            ]);

            //return "The user has been successfully connected to the third party!";
            return ['success' => true, 'data' => [], 'message' => "The user has been successfully connected to the third party!"];
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else if ($e->getCode() == '23000') {
                return ['success' => false, 'data' => [], 'message' => "YOU ARE ALREADY CONNECTED TO THIS THIRD PARTY!"];
            } else {
                return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function delete($id)
    {
        //POST method   /ThirdParty/delete
        //takes a third party id as a parameter
        //delets a third party softly from the database

        if ($id == null) {
            //return 'please type in a third party id';
            return ['success' => false, 'data' => [], 'message' => "Please type in a third party id"];
            
        } else {

            try {
                //       $TPS = DB::Update("UPDATE third_parties SET deleted =1 WHERE id =". $id);
                $query = Third_party::select()->where('id', '=', $id)->update(['deleted' => 1]);
                
            } catch (\Illuminate\Database\QueryException $e) {

                if ($e->getCode() == '42S22') {
                    return redirect(route('index', ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]]));
                    // return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
                } else if ($e->getCode() == '22007') {
                    return redirect(route('index', ['success' => false, 'data' => [], 'message' => "WRONG FORMAT FOR ONE OR MORE OF YOUR INPUTS!"]));
                    // return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT FOR ONE OR MORE OF YOUR INPUTS!"];
                } else {
                    return redirect(route('index', ['success' => false, 'data' => [], 'message' => "PLEASE CHECK YOUR INPUTS!"]));
                    //  return ['success' => false, 'data' => [], 'message' => "PLEASE CHECK YOUR INPUTS!"];
                }
            }

            if ($query == 1) {
                //return "Third party has been deleted!";
                return redirect(route('index', ['success' => true, 'data' => [], 'message' => "Third party has been deleted!"]));
            } else {
               // return ['success' => false, 'data' => [], 'message' => "Error in deleting third party!"];
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => "Error in deleting the third party!"] ));
            }
        }
    }

    public function accept_third_party($id)
    {
        $third_party_types = Third_party_type::select()->where('deleted', '=', '0')->get();
        $status = Status::select()->where([['table_name', '=', 'third_parties'], ['deleted', '=', '0']])->get();
        $requested_third_party = Request_partnership::select()->where('id', '=', $id)->get();
        return view('Third_party.accept')->with(['tp' => $requested_third_party, 'status' => $status, 'third_party_types' => $third_party_types]);
    }
    public function reject_third_party($id)
    {
        //POST method   /ThirdParty/delete
        //takes a third party id as a parameter
        //delets a third party softly from the database

        if ($id == null) {
            return 'please type in a request id';
        } else {

            try {
                //       $TPS = DB::Update("UPDATE third_parties SET deleted =1 WHERE id =". $id);
                $query = Request_partnership::select()->where('id', '=', $id)->update(['deleted' => 1]);
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->getCode() == '42S22') {
                    return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
                } else if ($e->getCode() == '22007') {
                    return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
                } else {
                    return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
                }
            }

            if ($query == 1) {
                return "Request has been rejected!";
            } else {
                return "Error in rejecting request!";
            }
        }
    }

    public function search(Request $request)
    {
        //GET method      /ThirdParty/search/{key}
        //takes a key as the search term
        //searches for every record that has similar words of the key in thier title,description,type,status,website,contact info and returns a json object of the record
        try {
            $key =  $request['key'];
            //$query = DB::select("SELECT * FROM third_parties WHERE title LIKE '%$key%' or description LIKE '%$key%'");

            $query = Third_party::where('title', 'like', '%' . $key . '%')->orWhere('description', 'like', '%' . $key . '%')->get();

            /* $test = Third_party::select()->where([
                    ['id', '=', $key]


                    ])->getQuery()->get()->all();
*/
            //  return dd($test);
            if (count($query) > 0) {
                return view('Third_party.searchResults', ['success' => true, 'data' => $query, 'message' => "Search Completed!"]);
            } else {
                return redirect(route('index', ['success' => false, 'data' => [], 'message' => 'No data found']));
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]]));
                //return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"]));
                //return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else if ($e->getCode() == '23000') {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]]));
                //return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else {
                return redirect(route('dashboard', ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"]));
                //return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function reorder(Request $request, $id)
    {

        try {
            //  DB::Update("UPDATE third_parties SET view_order=? WHERE id =?", [$new_order, $id]);
            if ($request['view_order'] == null) {
                return ['success' => false, 'data' => [], 'message' => "PLEASE CHECK YOUR INPUTS!"];
            }
            $query = Third_party::select()->where('id', '=', $id)->update(['view_order' => $request['view_order']]);

            return ['success' => true, 'data' => [], 'message' => " View order for the selected Third Party has been updated!"];
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else {
                return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }
        return ['success' => false, 'data' => [], 'message' => "something went wrong please try again!"];
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function show_subscribed_third_parties(Request $request)
    {

        $query = null;

        try {

            $query = User_third_party::select()->where([['user_id', '=',  $request['user_id']], ['platform_id', '=',  $request['platform_id']], ['deleted', '=', '0']])->get();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else {
                return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
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
                if ($row->Third_party->deleted == 1 || $row->Third_party->status != 1) {
                    //check the status of the third party and if it is deleted or not
                    $i--;
                    continue;
                }

                $result[$i] = $row->Third_party;

                array_push($sResult, $result[$i]); // used for sorting


                //$i++;
            }

            if ($result != null) {

                return $this->beatify($this->sortThirdPartiesAsJson($sResult, 'view_order', 'asc')); // used to sort by view_order
                // return ['success' => true, 'data' => $result];
            } else {
                return ['success' => false, 'data' => [], 'message' => "NO RESULTS!"];
            }
        } else {
            return ['success' => false, 'data' => [], 'message' => "NO RESULTS!"];
        }
    }




    public function show_unsubscribed_third_parties(Request $request)
    {
        try {

            $data = $request->validate([
                'user_id' => 'required',
                'client_id' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $e->errors();
        }


        try {

            // to show the user the third parties that he can subscribe
            // $unsubscribed_public = DB::select("SELECT * from third_parties where deleted = 0 AND status_id = 1 AND public = 1 AND id not in (SELECT third_party_id from user_third_parties where user_id=?)",[$data['user_id']]);
            // $unsubscribed_private = DB::select("SELECT * from third_parties where deleted = 0  AND public = 0 AND id in (select third_party_id from client_third_parties where client_id=?)", [$data['client_id']]);


            $getUserSubscribedList = User_third_party::select('third_party_id')->where([['user_id', '=',  $data['user_id']], ['deleted', '=', '0']])->get();
            $getPublicNotSubscribedList = Third_party::select()->where([['status_id', '=',  '1'], ['public', '=', '1'], ['deleted', '=', '0']])->whereNotIn('id', $getUserSubscribedList)->get();


            $getClientSubscribedList = Client_third_party::select('third_party_id')->where([['client_id', '=',  $data['client_id']], ['deleted', '=', '0']])->get(); // should we add platform_id ?
            $getPrivateNotSubscribedList = Third_party::select()->where([['status_id', '=',  '1'], ['public', '=', '0'], ['deleted', '=', '0']])->whereIn('id', $getClientSubscribedList)->get();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '42S22') {
                return ['success' => false, 'data' => [], 'message' => $e->errorInfo[2]];
            } else if ($e->getCode() == '22007') {
                return ['success' => false, 'data' => [], 'message' => "WRONG FORMAT!"];
            } else {
                return ['success' => false, 'data' => [], 'message' => "CHECK YOUR INPUTS!"];
            }
        }
        $merged = array();
        foreach ($getPublicNotSubscribedList as $key => $value) {
            array_push($merged, $value);
        }
        foreach ($getPrivateNotSubscribedList as $key => $value) {
            array_push($merged, $value);
        }

        return $this->beatify($this->sortThirdPartiesAsJson($merged, 'view_order', 'asc'));     // This will sort the unsubscribed third parties and beatify them in the beatify function


    }


    public function beatify($arrayOfJsons)
    {
        //The method recieves array of Json objects and beatify them by numbering these objects starting from index :1
        $i = 1;
        $json = null;
        foreach ($arrayOfJsons as $row) {
            $json[$i] = $row;
            $i++;
        }
        return $json;
    }

    public function sortThirdPartiesAsJson($json, $column, $method)
    {
        //The method sort third_parties by a column eaither asc or desc

        $json = json_decode(json_encode($json), true); // removing stdClass error
        $assoc_array = $json;
        $ids = array();
        foreach ($assoc_array as $tp) {
            array_push($ids, $tp['id']);
        }
        //return $ids;

        $result = DB::table('third_parties')->whereIn('id', $ids)->orderBy($column, $method)->get();
        return $result;
    }

    public function jsonToArray($json)
    {

        $json = json_decode($json, true);

        $json_keys = [];
        $json_values = [];
        $assoc_array = [];

        foreach ($json as $key => $value) {
            array_push($json_keys, $key);
            array_push($json_values, $value);
        }

        $assoc_array = array_combine($json_keys, $json_values);

        return $assoc_array;
    }
}

/*
this is a template for the config column in the thirdparty table

{
    "config": {
        "Requests": {
            "1": {
                "Authentication-type": "Rest",
                "type": "Post",
                "url": "https://classera.tii-sandbox.com/api/v1/submissions",
                "header": {
                    "X-Turnitin-Integration-Name": "ccs",
                    "X-Turnitin-Integration-Version": "v1beta",
                    "Authorization": "Bearer 18853c5ef5804f88bc58d90a12a98577",
                    "Content-Type": " application/json"
                },
                "body": {
                    "owner": "classera",
                    "title": "classera_submission"
                }
            }
        }
    }
}
    }*/
