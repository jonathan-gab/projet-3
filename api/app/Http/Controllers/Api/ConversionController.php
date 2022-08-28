<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Conversion;
use App\Models\Currency;
use App\Models\Pairs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConversionController extends Controller
{
    public function converter(Request $request) {
        $validate = Validator::make($request->all(), [
            'from' => 'required|alpha',
            'to' => 'required|alpha',
            'amount' => 'required|min:0',
            'reverse'=>'required|boolean'
        ]);
        // Lorsque les paramètres ne correspondent pas, un message d'erreur apparaît.
        if($validate->fails()){
            return response()->json(['message' => 'Validation failed', 'errors' => $validate->errors()], 422);
        }
        $from=$request->query('from');
        $to=$request->query('to');

        //Effectue une récupération des devises par leur nom.
        $fromCurrency = Currency::getByCode($from)->first();
        $toCurrency = Currency::getByCode($to)->first();
        $amount = $request->query('amount') ?? 1;
        $reverse=$request->query('reverse');

        //Lorsque les devises n'existent pas, un message d'erreur appraît.
        if (!$fromCurrency || !$toCurrency) return response()->json(['error' => 'from` or `to` parameters must be existing currency codes'], 404);
        //Lorsque les devises sont identiques un message d'erreur apparaît. 
        if ($from == $to) return response()->json(['error' => '`from` and `to` cannot be the same'], 400);

        //Récupération de la paire en fonction des devises données
        $pairs = Pairs::getPairByCurrencies($fromCurrency, $toCurrency);
        //Vérification de l'existence de la paire, dans le cas contraire, un message d'erreur apparaît.
        if ($pairs == null) return response()->json(['error' => 'Pairs not found'], 404);
        
        //Lorsque la paire existe 
        //Vérification de s'il est demandé de faire la conversion inverse
        if($reverse == true) {
            $result = $amount * 1/$pairs->rate;
            $data = [
                'amountCurrency' => $amount,
                'codeCurrencyFrom' => $request->query('to'),
                'codeCurrencyTo' => $request->query('from'),
                'result' => $result,
                
            ];
        }else {
            $result = $amount * $pairs->rate;

            $data = [
                'amountCurrency' => $amount,
                'codeCurrencyFrom' => $request->query('from'),
                'codeCurrencyTo' => $request->query('to'),
                'result' => $result,
                
            ];
        }

        //Renvoyer la donnée suite à la conversion 
        return response()->json(['message' => 'Convert completed', $data],200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function show(Conversion $conversion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversion $conversion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversion  $conversion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversion $conversion)
    {
        //
    }
}
