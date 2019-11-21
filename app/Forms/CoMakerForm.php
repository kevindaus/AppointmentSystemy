<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CoMakerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'select',[
                'choices' => [
                    'Mr.' =>'Mr.',
                    'Mrs.' =>'Mrs.',
                    'Dr.' =>'Dr.'
                ],
                'empty_value' => '=== Select title ==='
            ])
            ->add('first_name', 'text')
            ->add('middle_name', 'text')
            ->add('last_name', 'text')
            ->add('address', 'textarea')
            ->add('relationship', 'select',[
                'choices' => [
                    'Single' =>'Single',
                    'Married' =>'Married',
                    'Divorced' =>'Divorced'
                ]
            ])
            ->add('occupation', 'text')
            ->add('contact_number', 'text')
            ->add('legal_document_presented', 'text')
            ->add('identification_number', 'text')
            ->add('drivers_license', 'text')
            ->add('first_signature_specimen', 'file', [
                'wrapper' => ['class' => 'col-12 pt-2'],
            ])
            ->add('second_signature_specimen', 'file', [
                'wrapper' => ['class' => 'col-12 pt-2'],
            ])
            ->add('third_signature_specimen', 'file', [
                'wrapper' => ['class' => 'col-12 pt-2'],
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
