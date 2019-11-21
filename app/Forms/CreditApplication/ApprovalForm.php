<?php


namespace App\Forms\CreditApplication;


use Kris\LaravelFormBuilder\Form;

class ApprovalForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('customer_id', 'hidden',[
                'default_value' => $this->model->customer->id,
            ])
            ->add('credit_application_id', 'hidden',[
                'default_value' => $this->model->id,
            ])
            ->add('product_id', 'hidden',[
                'default_value' => $this->model->product()->id,
            ])
            ->add('total_amount', 'hidden', [
                'default_value' => $this->model->product()->price,
            ])
            ->add('tax_rate', 'number', [
                'label'=>'Tax Rate( e.g 1.8%)',
                'attr' => [
                    'step' => '0.01'
                ],
                'default_value'=>'0'
            ])
            ->add('submit', 'submit', [

                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
