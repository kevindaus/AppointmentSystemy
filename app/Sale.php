<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function credit_application()
    {
        return $this->belongsTo(CreditApplication::class,'credit_application');
    }

    public function payment_history()
    {
        return $this->hasMany(PaymentHistory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
