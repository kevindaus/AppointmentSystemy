<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditApplication extends Model
{
    protected $guarded = [];
    protected $dates = ['due_date', 'request_due_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function sale()
    {
        return $this->hasOne(Sale::class, 'id');
    }

    public function credit_application_staff()
    {
        return $this->hasMany(CreditApplicationStaff::class);
    }

    public function credit_application_product()
    {
        return $this->hasMany(CreditApplicationProduct::class);
    }

    public function credit_application_co_maker()
    {
        return $this->hasMany(CreditApplicationCoMaker::class);
    }


}
