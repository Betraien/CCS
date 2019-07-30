<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{

    public function index(){
    
        
    

        $TempArray = array('title' => 'Our Services', 'Services' => ['Web design','Network Configuration', 'what do you want?']);
 
        
        // return view('index')->with($TempArray); This will pass the elements of the array $TempArray as individual veriables and you can only refer to the indices of $TempArray

        // return view('index')->with('MyArray' ,$TempArray); This will pass the whole array and you can reference to it as 'MyArray'
         return view('index')->with('MyArray' ,$TempArray);
    }



}
    