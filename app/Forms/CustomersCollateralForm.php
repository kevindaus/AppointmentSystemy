<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomersCollateral extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('supporting_document', 'text')
            ->add('estimated_market_value', 'text')
            ->add('owner', 'text');
    }
}
