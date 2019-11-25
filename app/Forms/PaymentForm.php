<?php


namespace App\Forms;


use App\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\Form;

class PaymentForm extends Form
{
    public function buildForm()
    {
        $query = <<<EOL
        select customers.id as customer_id , customers.title,customers.first_name , customers.middle_name , customers.last_name,products.id,products.name , sales.id sales_id ,sales.remaining_balance
        from credit_application_product
        inner join credit_applications on credit_application_product.credit_application_id = credit_applications.id
        inner join products on credit_application_product.product_id = products.id
        inner join customers on credit_applications.customer_id = customers.id
        inner join sales on sales.credit_application_id = credit_applications.id
EOL;
        $res = Db::select(Db::raw($query));
        $finalRes = [];
        foreach ($res as $current){
            /*id as value , label Customer Name - Product name*/
            $customerName = sprintf("%s %s %s" , $current->title, $current->first_name , $current->middle_name , $current->last_name);
            $productName = $current->name;
            $remainingBalance = 'P '.number_format($current->remaining_balance,2);
            $finalRes[$current->sales_id] = sprintf("%s - %s - %s", $customerName, $productName, $remainingBalance);
        }
        $staffsCollection = Staff::all();
        $staffs = [];
        foreach ($staffsCollection as $currentStaff) {
            $staffs[$currentStaff->id] = sprintf("%s %s %s %s", $currentStaff->title, $currentStaff->first_name, $currentStaff->middle_name, $currentStaff->last_name);
        }

        $this
            ->add('sale_id', 'select', [
                'empty_value' => '=== Accounts ===',
                'choices' => $finalRes,
                'label' => 'Account'
            ]) //pay what ?
            ->add('amount', 'number', [
                'label' => 'Amount',
                'attr' => [
                    'step' => '0.01'
                ],
                'default_value' => '0'
            ]) //pay how much
            ->add('date_received','hidden' ,[
                'default_value'=> Carbon::now()->format("Y-m-d")
            ])
            ->add('received_by','select',[
                'empty_value' => '=== Staff who received the ===',
                'label'=>'Received by Staff',
                'choices'=> $staffs
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
