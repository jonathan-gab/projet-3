<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
    ];

    public function code()
    {
        return $this->code;
    }

    public  function pairs()
    {
        return $this->hasMany(Pairs::class);
    }

    public static function getByCode($code)
    {
        return self::where('code', $code);
    }
}
