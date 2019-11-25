<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PaymentHistory extends Model
{
    protected $guarded = [];
    protected $table = 'payment_history';
    protected $dates = ['created_at', 'updated_at', 'date_received'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function getCustomer()
    {
        /*using sale id get customer */
        $query = <<<EOL
        select credit_applications.customer_id as customer_id
        from credit_applications
        inner join customers on customers.id = credit_applications.customer_id
        inner join sales  on sales.credit_application_id = credit_applications.id
        inner join payment_history on payment_history.sale_id = sales.id
        where payment_history.id = :payment_history_id
EOL;


        $res = DB::select(Db::raw($query),[
            'payment_history_id'=>$this->id
        ]);
        if (isset($res[0])) {
            return Customer::findOrFail($res[0]->customer_id);
        }else {
            return new NullCustomer();
        }

    }

    public function getStaff()
    {
        return Staff::findOrFail($this->received_by);
    }
}
