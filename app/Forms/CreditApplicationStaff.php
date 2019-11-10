<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CreditApplicationStaff extends Form
{
    public function buildForm()
    {
        $this
            ->add('credit_application_id', 'text')
            ->add('staff_id', 'text')
            ->add('staff_role', 'text');
    }
}
