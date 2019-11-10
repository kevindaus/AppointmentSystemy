<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomersCollateralForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('supporting_document', 'text')
            ->add('estimated_market_value', 'number')
            ->add('customer_id', 'hidden', [
                'value' => $this->model->id
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
