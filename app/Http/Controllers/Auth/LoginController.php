<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User; 

class LoginController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.signin');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $user = User::where('email', 'LIKE', $request->email)->first(); 

        if(is_null($user)) {
            return back()->withErrors([
                'message' => 'Aucun compte associé à ces identifiants.',
            ])->withInput($request->only('email'));
        }

        //if($user->is_verified) {

            $rememberMe = $request->rememberMe ? true : false;

            if (Auth::attempt($credentials, $rememberMe)) {
    
               // dd(Auth::user()) ; 
                $request->session()->regenerate();
    
                return redirect()->intended('/dashboard');
            }
    
            return back()->withErrors([
                'message' => 'Vos identifiants sont erronnés.',
            ])->withInput($request->only('email'));
            
       /* }else {
            return back()->withErrors([
                'message' => 'Votre compte n\'a pas encoré été activé. Merci de consulter vos mails',
            ])->withInput($request->only('email'));
        }*/

       
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/sign-in');
    }
}
