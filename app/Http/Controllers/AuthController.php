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
    public function store(Request $request){
        
        try {
            return $this->authService->store($request);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Throwable $th) {
            \Log::error('Caught exception: ' . $th->getMessage() . ' in ' . $th->getFile() . ' on line ' . $th->getLine());
            
            // Return a generic error message to the client
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
    
    
}
