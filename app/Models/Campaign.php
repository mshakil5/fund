<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function fundraisingsource()
    {
        return $this->belongsTo(FundraisingSource::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}