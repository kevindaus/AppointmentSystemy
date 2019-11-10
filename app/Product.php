<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function credit_application()
    {
        return $this->hasMany(CreditApplication::class);
    }

    public function credit_application_product()
    {
        return $this->hasMany(CreditApplicationProduct::class);
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
}
