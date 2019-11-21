<?php


namespace App\Forms;


use Kris\LaravelFormBuilder\Form;

class CreditApplicationFormCalculation extends Form
{
    public function buildForm()
    {
        $this
            ->add('id', 'hidden');

    }

}
