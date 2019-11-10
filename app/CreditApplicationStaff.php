<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditApplicationStaff extends Model
{
    protected $guarded = [];

    protected $table = 'credit_application_staff';

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function credit_application()
    {
        return $this->belongsTo(CreditApplication::class);
    }

}
