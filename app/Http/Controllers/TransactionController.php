<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Models\Country; 
use App\Enums\Types; 
use Illuminate\Support\Str; 
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['country', 'user'])->paginate(10)->groupBy(function ($transaction) {
            setlocale(LC_TIME, "fr_FR","French");
            return  strftime(" %d %B %G", strtotime($transaction->created_at)); 
        }); 

       // dd($transactions); 

        return view('transactions.index', [
            'transactions' => $transactions
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('enabled', true)->get() ; 

        return view('transactions.create', [
            'countries' => $countries
        ]); 
    }

    public function deposit() {
        
        return view('transactions.deposits.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->type === Types::DEPOT->value) {
            $attributes = $request->validate([
                'bet_account' => 'required|string|min:4', 
                'amount' => 'required|integer|min:500', 
                'tx_id' => 'required|unique:transactions|min:4'
            ], [
                'bet_account.required' => 'L\'ID du compte 1XBET est requis', 
                'amount.required' => 'Le montant du dépôt est requis', 
                'amount.min:500' => 'Nos dépôts se font à partir de 500 XOF',
                'tx_id.required' => 'L\'ID de la transaction de paiement est requise', 
                'tx_id.unique:transactions' => 'L\'ID de transaction n\'est pas valide pour ce dépôt'
            ]); 
            $attributes['token'] = strtolower(Str::random(8)); 
            $attributes['account_name'] = Auth::user()->name; 
            $attributes['number'] = Auth::user()->phone; 
            $attributes['country_id'] = Auth::user()->country->id; 
            $attributes['type'] = $request->type ; 
            

            $transaction = Transaction::create($attributes); 

            return view('transactions.deposits.sucess', [
                'transaction' => $transaction
            ]); 

        }else {
            $attributes = $request->validate([
                'amount' => 'required|integer|min:1000', 
                'number' => 'required|min:8', 
                'account_name' => 'required|min:2',
                'country_id' => 'required|exists:countries', 
                'withdraw_code' => 'required|min:3', 
                'bet_account' => 'required|min:2'
            ], [
                'bet_account.required' => 'L\'ID du compte 1XBET est requis', 
                'amount.required' => 'Le montant du dépôt est requis', 
                'amount.min:1000' => 'Nos dépôts se font à partir de 1000 XOF',
                'number.required' => 'Un N° de Téléphone valide est requis', 
                'account_name.required' => 'Un intitulé valide est requis', 
                'withdraw_code.requires' => 'Le code de retrait est requis'
            ]); 

            $attributes['token'] = strtolower(Str::random(8)); 
            $attributes['type'] = $request->type; 

            $transaction = Transaction::create($attributes); 

            return redirect()->route('transactions.show', ['transaction' => $transaction]); 

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $token)
    {
        $transaction = Transaction::with(['user', 'country'])->where('token', 'like', $token)->first(); 

       // dd($transaction); 

        return view('transactions.show', [
            'transaction' => $transaction
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update([
            'status' => Status::SUCESS->value
        ]) ; 

        return redirect()->route('transaction.show', ['token' => $transaction->token]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->update([
            'status' => Status::REJECTED->value
        ]); 

        return redirect()->route('transaction.show', ['token' => $transaction->token]); 
    }


    public function search(Request $request) {

        $transactions = Transaction::with(['user', 'country'])->where('token', 'LIKE', $request->search)->orWhere('status', 'LIKE', $request->search)->orWhere('type', 'LIKE', $request->search)->get()->groupBy(function($transaction) {
            setlocale(LC_TIME, "fr_FR","French");
            return  strftime(" %d %B %G", strtotime($transaction->created_at)); 
        }) ; 

        //dd($transactions); 

        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }
}
