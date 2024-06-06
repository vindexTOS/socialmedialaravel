<?php 
namespace App\Services;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function store(Request $request)
    {  
        $val =  Validator::make($request->all(), [
            "name"=>"required",
            'email' => 'required|unique:users|max:255',  
            'password' => 'required',
        ]);
        if(    $val->fails()){
            throw new ValidationException($val);
        };
        
        $data = $val->validated();
        User::create([
            "name"=>$data["name"],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        
        
        return response()->json(['msg' => 'Your account has been created'], 201);
    }
    
    public function index()
    {
        return response()->json(['hi' => 'hi'], 200);
    }
}