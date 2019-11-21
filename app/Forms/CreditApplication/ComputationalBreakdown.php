<?php


namespace App\Forms\CreditApplication;

use Kris\LaravelFormBuilder\Form;

class ComputationalBreakdown extends Form
{
    public function buildForm()
    {
        $this
            ->add(uniqid(), 'legend', [
                'label' => 'Down Payment'
            ])
            ->add('dp', 'text', [
                'label' => 'DP',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('dp_ma', 'text', [
                'label' => 'DP Ma',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('dp_cropping', 'text', [
                'label' => 'DP Cropping',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('dp_rebate', 'text', [
                'label' => 'DP Rebate',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('dp_net', 'text', [
                'label' => 'DP Net',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add(uniqid(), 'legend', [
                'label' => 'Advance Down Payment'
            ])
            ->add('adp', 'text', [
                'label' => 'ADP',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('adp_ma', 'text', [
                'label' => 'ADP MA',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('adp_rebate', 'text', [
                'label' => 'ADP Rebate',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('adp_net', 'text', [
                'label' => 'ADP Net',
                'wrapper' => ['class' => 'col-6 mt-3']
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
