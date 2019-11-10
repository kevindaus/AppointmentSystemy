<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditApplicationProduct extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function credit_application()
    {
        return $this->belongsTo(CreditApplication::class);
    }

    public function co_maker()
    {
        return $this->hasMany(CoMaker::class);
    }
}
