<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Str; 
use App\Models\Country; 
class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('enabled', true)->get(); 

        return view('auth.signup', [
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|unique:users|min:8',
            'password' => 'required|min:7|max:255|confirmed',
            'terms' => 'accepted',
        ], [
            'name.required' => 'Un nom valide est requis',
            'email.required' => 'L\'Email est requis',
            'phone.required' => 'Un N° de telephone valide est requis',
            'password.required' => 'Le mot de passe valide est requis',
            'password.confirmed' => 'Les mots de passes ne correspondent pas.',
            'terms.accepted' => 'Pour améliorer la qualité et la confiance en nos services merci d\'adhérer à nos politiques.', 

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, 
            'bet_account' => $request->bet_account,
            'country_id' => $request->country_id,
            'otp_code' => Str::random(4), 
            'uid' => substr(uniqid(Str::random(8)), 0, 10), 
            'password' => Hash::make($request->password),
        ]);

        return view('auth.otp', [
            'user' => $user
        ]); 

       // Auth::login($user);


       // return redirect(RouteServiceProvider::HOME);
    }
}
