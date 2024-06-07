<?php


namespace App\Services;
use App\Models\Photos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class PhotoService { 
    
    public function UploadPhoto (Request $request){
        // $data = $this->Validator($request);
        
        
        $image = $request->file("image");
        $userId = $request["user_id"];
        $uploadedImageUrl = $image->store("images", "public");
        
        
        $newPhoto=  Photo::create([
            "user_id"=> $userId,
            "img_url"=>  $uploadedImageUrl,
        ]);
        
        return ["data"=> $newPhoto]; 
        
    }
    
    private function Validator(Request $request){
        
        // $val = Validator::make($request->all(), [
        //     "image"=> 'required|mimes:jpeg,png|max:2048',
        //     "user_id"=> "required"
        // ]);
        // if($val->fails()){
        //     throw new ValidationException($val);
        // };
        
        return $request;
    }
    
}