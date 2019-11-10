<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoMaker extends Model
{
    protected $guarded = [];

    public function getFullName()
    {
        return sprintf("%s %s %s %s", $this->title, $this->first_name, $this->middle_name, $this->last_name);
    }
    public function credit_application_co_maker()
    {
        return $this->hasMany(CreditApplication::class);
    }
}
