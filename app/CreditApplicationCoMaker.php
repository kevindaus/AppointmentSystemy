<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditApplicationCoMaker extends Model
{
    public function co_maker()
    {
        return $this->belongsTo(CoMaker::class);
    }

    public function credit_application()
    {
        return $this->belongsTo(CreditApplication::class);
    }
}
