<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreditApplication extends Model
{

    protected $guarded = [];
    protected $dates = ['due_date', 'request_due_date','date_received_by_ci'];
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DENIED = 'denied';

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

    public function product()
    {
        $product = DB::table('credit_application_product')->where(['credit_application_id' => $this->id])->first();
        return Product::findOrFail($product->product_id);
    }

    public function co_maker()
    {
        $coMaker = DB::table('credit_application_co_maker')->where(['credit_application_id' => $this->id])->first();
        return CoMaker::findOrFail($coMaker->co_maker_id);
    }

    public function getFieldSalesman()
    {
        $creditAppStaff = DB::table('credit_application_staff')->where(
            [
                'credit_application_id' => $this->id,
                'role' => Staff::POSITION_FIELD_SALESMAN,
            ]
        )->first();
        return Staff::findOrFail($creditAppStaff->staff_id);
    }

    public function getCIReceiver()
    {
        $creditAppStaff = DB::table('credit_application_staff')->where(
            [
                'credit_application_id' => $this->id,
                'role' => Staff::POSITION_CREDIT_RECEIVER,
            ]
        )->first();
        return Staff::findOrFail($creditAppStaff->staff_id);
    }

    public function getCorrectAndConfirm()
    {
        $creditAppStaff = DB::table('credit_application_staff')->where(
            [
                'credit_application_id' => $this->id,
                'role' => Staff::POSITION_CLARIFIER,
            ]
        )->first();
        return Staff::findOrFail($creditAppStaff->staff_id);
    }
    public function getBranchManager()
    {
        $creditAppStaff = DB::table('credit_application_staff')->where(
            [
                'credit_application_id' => $this->id,
                'role' => Staff::POSITION_BRANCH_MANAGER,
            ]
        )->first();
        return Staff::findOrFail($creditAppStaff->staff_id);
    }
}
