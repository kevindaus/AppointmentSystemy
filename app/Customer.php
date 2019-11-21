<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $guarded = [];

    public function getFullName()
    {
        return sprintf("%s %s %s %s %s", $this->title, $this->first_name, $this->middle_name, $this->last_name, $this->suffix);
    }

    public function getFullAddress()
    {
        return sprintf(
            "%s %s %s %s %s %s" ,
            $this->house_number ,
            $this->street ,
            $this->barangay ,
            $this->municipality ,
            $this->province ,
            $this->zipcode
        );
    }

    public function credit_applications()
    {
        return $this->hasMany(CreditApplication::class);
    }

    public function customers_children()
    {
        return $this->hasMany(CustomersChildren::class);
    }

    public function customers_collateral()
    {
        return $this->hasMany(CustomersCollateral::class);
    }

}
