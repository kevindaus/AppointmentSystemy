<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class StaffForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'select',[
                'empty_value' => '=== Select title ===',
                'choices' => [
                    'Mr.' =>'Mr.',
                    'Mrs.' =>'Mrs.',
                    'Dr.' =>'Dr.'
                ]
            ])
            ->add('first_name', 'text')
            ->add('middle_name', 'text')
            ->add('last_name', 'text')
            ->add('submit', 'submit',[
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
