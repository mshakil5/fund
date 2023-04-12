<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundRaise extends Model
{
    use HasFactory;

    public function source()
    {
        return $this->belongsTo(FundraisingSource::class);
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    
}
