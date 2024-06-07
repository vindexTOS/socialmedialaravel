<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PhotoService;

class UserInfoController extends Controller
{
    
    private $photoService;
    public function __construct( PhotoService $photoService) {
        $this->photoService = $photoService;
    }
    
    public function MakePhoto(Request $request){
        
        try {
            return $this->photoService-> UploadPhoto($request);
            
        } catch (\Throwable $th) {
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            return response()->json(['error' => 'An error occurred.'], 500);
        }
        
    }
}
