<?php
  
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Exception;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
 
      return Socialite::driver('google')->redirect();
   
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
}