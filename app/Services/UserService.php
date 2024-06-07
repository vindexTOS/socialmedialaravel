<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class AuthService { 
    
    
    
    function store(Request $request){
        
        
    }
    
    private function Validator(Request $request){
        
        $val = Validator::make($request->all(), [
            "image"=> 'required|mimes:jpeg,png|max:2048',
            "user_id"=> "required"
        ]);
        if($val->fails()){
            throw new ValidationException($val);
        };
        
        return $val;
    }
    
    
}