<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;
    
    
    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }
    public function signup(Request $request){
        
        try {
            return $this->authService->signup($request);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Throwable $th) {
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
    
    
    
    
    public function login(Request $request){
        
        try {
            return $this->authService->login($request);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Throwable $th) {
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            return response()->json(['error' => 'An error occurred.'], 500);
        }
        
    }
    
}
