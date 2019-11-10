<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = [];
    const POSITION_BRANCH_MANAGER = 'branch_manager';
    const POSITION_CREDIT_RECEIVER = 'received_by_ci';
    const POSITION_CLARIFIER = 'correct_and_confirmed_by';
    const POSITION_FIELD_SALESMAN = 'field_salesman';

    public function getFullName()
    {
        return sprintf("%s. %s %s %s %s", $this->title, $this->first_name, $this->middle_name, $this->last_name, $this->suffix);
    }

    public function handled_payment()
    {
        return $this->hasMany(PaymentHistory::class);
    }

    public function credit_application_staff()
    {
        return $this->hasMany(CreditApplicationStaff::class);
    }
}
