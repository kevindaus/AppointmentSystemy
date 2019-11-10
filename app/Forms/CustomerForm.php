<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add(uniqid(), 'legend',[
                'label'=>'Personal Information'
            ])
            ->add('title', 'select',[
                'choices' => [
                    'Mr.' =>'Mr.',
                    'Mrs.' =>'Mrs.',
                    'Dr.' =>'Dr.'
                ],
                'empty_value' => '=== Select title ===',

            ])
            ->add('first_name', 'text',[

            ])
            ->add('middle_name', 'text',[

            ])
            ->add('last_name', 'text',[

            ])
            ->add('suffix', 'text',[

            ])

            ->add('birthday', 'date')
            ->add('facebook_account', 'text')
            ->add('civil_status', 'text')
            ->add('wedding_anniversary', 'text')
            ->add('gender', 'text')
            ->add('height', 'text')
            ->add('weight', 'text')
            ->add('tin_id', 'number',[
                'label'=>"TIN #"
            ])
            ->add(uniqid(), 'legend',[
                'label'=>'Address Information'
            ])

            ->add('house_number', 'text')
            ->add('street', 'text')
            ->add('barangay', 'text')
            ->add('municipality', 'text')
            ->add('province', 'text')
            ->add('zipcode', 'text')
            ->add('length_of_stay_present_address', 'text')
            ->add('previous_address', 'text')
            ->add('birth_place', 'text')
            ->add('house_ownership', 'text')
            ->add('business_address', 'text')
            ->add(uniqid(), 'legend',[
                'label'=>'Relatives'
            ])
            ->add('fathers_name', 'text',[

            ])
            ->add('mothers_name', 'text',[

            ])
            ->add(uniqid(), 'legend',[
                'label'=>'Contact Information'
            ])
            ->add('mobile_number', 'text')
            ->add(uniqid(), 'legend',[
                'label'=>'Occupation/Source of Income'
            ])
            ->add('occupation', 'text')
            ->add('length_of_service', 'text')
            ->add('basic_income', 'text')
            ->add('source_of_income', 'text')
            ->add('other_income', 'text')
            ->add(uniqid(), 'legend',[
                'label'=>'Spouse'
            ])
            ->add('name_of_spouse', 'text')
            ->add('age', 'text')
            ->add('number_of_children', 'text')
            ->add('spouse_contact_number', 'text')
            ->add('spouse_occupation', 'text')
            ->add(uniqid(), 'legend',[
                'label'=>' '
            ])
            ->add('submit', 'submit',[
                'wrapper' => ['class' => 'col-12'],
            ]);

    }
}
