<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairs extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'currency_from_id',
        'currency_to_id',
        
    ];

    public function getCurrencyFrom()
    {
        return $this->belongsTo(Currency::class, 'currency_from_id');
    }

    public function getCurrencyTo()
    {
        return $this->belongsTo(Currency::class, 'currency_to_id');
    }

    public function conversion()
    {
        return $this->hasOne(Conversion::class);
    }

    public function rate()
    {
        return $this->rate;
    }
    
    public static function getPairByCurrencies(Currency $getCurrencyFrom, Currency $getCurrencyTo)
    {
        $from = $getCurrencyFrom->id;
        $to = $getCurrencyTo->id;
        $pairs = self::where('currency_from_id', $from)->where('currency_to_id', $to)->first();
        if(!$pairs) return null;
        return $pairs;
    }
}
