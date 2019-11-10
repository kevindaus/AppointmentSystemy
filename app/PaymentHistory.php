<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $guarded = [];
    protected $table = 'payment_history';

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
