<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersChildren extends Model
{
    protected $guarded = [];
    public function parent()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
