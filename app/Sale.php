<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    const STATUS_APPROVED = 'approved';
    protected $guarded = [];

    public function credit_application()
    {
        return $this->belongsTo(CreditApplication::class,'credit_application');
    }

    public function payment_history()
    {
        return $this->hasMany(PaymentHistory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getLastPaymentHistory()
    {
        return PaymentHistory::where([
            'sale_id' => $this->id
        ])->orderBy('id', 'DESC')->first();
    }

    public function getCreditApplication()
    {
        return CreditApplication::find($this->credit_application_id)->firstOrFail();
    }

}
