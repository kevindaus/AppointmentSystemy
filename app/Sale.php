<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    const STATUS_APPROVED = 'approved';
    protected $guarded = [];

    public function credit_application()
    {
        return $this->belongsTo(CreditApplication::class, 'credit_application');
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
        ])->get()->last();
    }

    public function getCreditApplication()
    {
        return CreditApplication::find($this->credit_application_id)->firstOrFail();
    }

    public function getProduct()
    {
        $sqlQuery = <<<EOL
        SELECT
        products.id,
        products.`name`,
        products.description,
        products.type,
        products.picture,
        products.specification,
        products.created_at,
        products.updated_at,
        products.price
        FROM
        sales
        INNER JOIN credit_applications ON sales.credit_application_id = credit_applications.id
        INNER JOIN products ON sales.product_id = products.id
        WHERE
        sales.id = :sale_id
EOL;
        $res = Db::select(DB::raw($sqlQuery), ['sale_id' => $this->id]);
        if (isset($res[0])) {
            return $res[0];
        }else{
            return new NullProduct();
        }
    }

    public function getCustomer()
    {

        $sqlQuery = <<<EOL
        SELECT
        customers.id,
        customers.title,
        customers.first_name,
        customers.middle_name,
        customers.last_name,
        customers.suffix,
        customers.birthday,
        customers.mobile_number,
        customers.zipcode,
        customers.province,
        customers.municipality,
        customers.barangay,
        customers.street,
        customers.house_number,
        customers.wedding_anniversary,
        customers.civil_status,
        customers.facebook_account
        FROM
        credit_applications
        INNER JOIN customers ON credit_applications.customer_id = customers.id
        INNER JOIN sales ON sales.credit_application_id = credit_applications.id
        WHERE
        sales.id = :sale_id
EOL;
        $res = Db::select(DB::raw($sqlQuery), ['sale_id' => $this->id]);
        if (isset($res[0])) {
            return $res[0];
        }else{
            return new NullCustomer();
        }
    }

}
