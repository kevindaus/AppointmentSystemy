<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersCollateral extends Model
{
    protected $guarded = [];
    protected $table = 'customers_collateral';

    public function owner()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
