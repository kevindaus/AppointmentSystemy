<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomersChildren extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text')
            ->add('middle_name', 'text')
            ->add('last_name', 'text')
            ->add('suffix', 'text')
            ->add('parent', 'text');
    }
}
