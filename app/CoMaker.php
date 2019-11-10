<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoMaker extends Model
{
    protected $guarded = [];
    public function credit_application()
    {
        return $this->belongsTo(CreditApplication::class, "co_maker");
    }

    public function getFullName()
    {
        return sprintf("%s %s %s %s", $this->title, $this->first_name, $this->middle_name, $this->last_name);
    }
}
