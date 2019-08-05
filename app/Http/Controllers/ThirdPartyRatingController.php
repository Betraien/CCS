<?php

namespace App\Http\Controllers;
use App\Third_party;
use App\Third_party_rating;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use \Illuminate\Database\QueryException;
class ThirdPartyRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Third_party_rating  $third_party_rating
     * @return \Illuminate\Http\Response
     */
    public function show(Third_party_rating $third_party_rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Third_party_rating  $third_party_rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Third_party_rating $third_party_rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Third_party_rating  $third_party_rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Third_party_rating $third_party_rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Third_party_rating  $third_party_rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Third_party_rating $third_party_rating)
    {
        //
    }

     public function showRatings($TPid){

       try{ //$TPs=DB::select("SELECT* FROM third_party_ratings WHERE third_party_id='$TPid'");

        Third_party_rating::select()->where([["third_party_id","=",$TPid]])->get();

       

          if (count($TPs) > 0) {

                $i = 1;
                $json = null;
                foreach ($TPs as $row) {
                    $json[$i] = $row;
                    $i++;
                }

                return $json;
            } else {
                echo "no data found";
            }
        
        } catch (\Illuminate\Database\QueryException $e){
            return $e->errors();

    }}
    

    public function rate($user_id,$platform_id, $third_party_id, $rating, $comment)
    {   
       //GET method    /Third_party_rating/rate/{user_id}/{third_party_id}/{rating}/{comment}
       //takes the rater id,the third party that is being rated the rating as float,and the comment
       //adds the rating and comment along with the ids of the third party and the user raing the third party in the database
         
       $ThirdPartyRating =  new Third_party_rating();
       
      try{ 
          $query = $ThirdPartyRating->insert([

            'user_id' => $user_id,
            'platform_id'=>$platform_id,
            'third_party_id'=>$third_party_id,
            'rating' => $rating,
            'comment' => $comment
        
          ]);
        } catch (\Illuminate\Database\QueryException $e){
           
            return 'you have already rated this third party';
        }

        try{ 
        // $TPs = DB::select("SELECT* FROM third_party_ratings WHERE third_party_id = '$third_party_id'");
         $TPs=Third_party_rating::select()->where([["third_party_id","=",$third_party_id]])->get();
         
         $count=0;
         $total=0;
         $rate=0;
         if(count($TPs)>0){
         foreach ($TPs as $key => $TP) {
           
           $total += $TP->rating;   
           $count++;         

         }

         
         $rate = $total / $count;
     }
    } catch (\Illuminate\Database\QueryException $e){
        return 'third party dosent exist';
    }
     
     

       try{
       // $TPS = DB::Update("UPDATE third_parties SET average_rating = '$rate' WHERE id =" . $third_party_id);
        $TP = Third_party::find($third_party_id);
        $TP->average_rating = $rate;
        $TP->save();
       } catch (\Illuminate\Database\QueryException $e){
        return 'third party dosent exist';
    }
    return "Rate has been added to the third party profile";
   }






}
