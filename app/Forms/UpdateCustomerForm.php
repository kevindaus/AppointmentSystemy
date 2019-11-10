<?php


namespace App\Forms;


use App\Customer;

class UpdateCustomerForm extends CustomerForm
{
    public function buildForm()
    {
        /* @var $customerModel Customer */
        $customerModel = $this->getModel();
        $this
            ->add('id', 'hidden', [
                'default_value' => $customerModel->id,
                'wrapper' => ['class' => 'col-3'],
            ])
            ->add(uniqid(), 'legend', [
                'label' => 'Personal Information'
            ])
            ->add('title', 'select', [
                'default_value' => $customerModel->title,
                'choices' => [
                    'Mr.' => 'Mr.',
                    'Mrs.' => 'Mrs.',
                    'Dr.' => 'Dr.'
                ],
                'empty_value' => '=== Select title ===',
                'wrapper' => ['class' => 'col-2'],
            ])
            ->add('first_name', 'text', [
                'default_value' => $customerModel->first_name,
                'wrapper' => ['class' => 'col-3'],
            ])
            ->add('middle_name', 'text', [
                'default_value' => $customerModel->middle_name,
                'wrapper' => ['class' => 'col-3'],
            ])
            ->add('last_name', 'text', [
                'default_value' => $customerModel->last_name,
                'wrapper' => ['class' => 'col-3'],
            ])
            ->add('suffix', 'text', [
                'default_value' => $customerModel->suffix,
                'wrapper' => ['class' => 'col-1'],
            ])
            ->add('birthday', 'date', [
                'default_value' => $customerModel->birthday
            ])
            ->add('facebook_account', 'text', [
                'default_value' => $customerModel->facebook_account
            ])
            ->add('civil_status', 'text', [
                'default_value' => $customerModel->civil_status
            ])
            ->add('wedding_anniversary', 'text', [
                'default_value' => $customerModel->wedding_anniversary
            ])
            ->add('gender', 'text', [
                'default_value' => $customerModel->gender
            ])
            ->add('height', 'text', [
                'default_value' => $customerModel->height
            ])
            ->add('weight', 'text', [
                'default_value' => $customerModel->weight
            ])
            ->add('tin_id', 'number', [
                'default_value' => $customerModel->tin_id,
                'label' => "TIN #"
            ])
            ->add(uniqid(), 'legend', [
                'label' => 'Address Information'
            ])
            ->add('house_number', 'text', [
                'default_value' => $customerModel->house_number
            ])
            ->add('street', 'text', [
                'default_value' => $customerModel->street
            ])
            ->add('barangay', 'text', [
                'default_value' => $customerModel->barangay
            ])
            ->add('municipality', 'text', [
                'default_value' => $customerModel->municipality
            ])
            ->add('province', 'text', [
                'default_value' => $customerModel->province
            ])
            ->add('zipcode', 'text', [
                'default_value' => $customerModel->zipcode
            ])
            ->add('length_of_stay_present_address', 'text', [
                'default_value' => $customerModel->length_of_stay_present_address
            ])
            ->add('previous_address', 'text', [
                'default_value' => $customerModel->previous_address
            ])
            ->add('birth_place', 'text', [
                'default_value' => $customerModel->birth_place
            ])
            ->add('house_ownership', 'text', [
                'default_value' => $customerModel->house_ownership
            ])
            ->add('business_address', 'text', [
                'default_value' => $customerModel->business_address
            ])
            ->add(uniqid(), 'legend', [
                'label' => 'Relatives'
            ])
            ->add('fathers_name', 'text', [
                'default_value' => $customerModel->fathers_name,
                'wrapper' => ['class' => 'col-6'],
            ])
            ->add('mothers_name', 'text', [
                'default_value' => $customerModel->mothers_name,
                'wrapper' => ['class' => 'col-6'],
            ])
            ->add(uniqid(), 'legend', [
                'label' => 'Contact Information'
            ])
            ->add('mobile_number', 'text', [
                'default_value' => $customerModel->mobile_number
            ])
            ->add(uniqid(), 'legend', [
                'label' => 'Occupation/Source of Income'
            ])
            ->add('occupation', 'text', [
                'default_value' => $customerModel->occupation
            ])
            ->add('length_of_service', 'text', [
                'default_value' => $customerModel->length_of_service
            ])
            ->add('basic_income', 'text', [
                'default_value' => $customerModel->basic_income
            ])
            ->add('source_of_income', 'text', [
                'default_value' => $customerModel->source_of_income
            ])
            ->add('other_income', 'text', [
                'default_value' => $customerModel->other_income
            ])
            ->add(uniqid(), 'legend', [
                'label' => 'Spouse'
            ])
            ->add('name_of_spouse', 'text', [
                'default_value' => $customerModel->name_of_spouse
            ])
            ->add('age', 'text', [
                'default_value' => $customerModel->age
            ])
            ->add('number_of_children', 'text', [
                'default_value' => $customerModel->number_of_children
            ])
            ->add('spouse_contact_number', 'text', [
                'default_value' => $customerModel->spouse_contact_number
            ])
            ->add('spouse_occupation', 'text', [
                'default_value' => $customerModel->spouse_occupation
            ])
            ->add(uniqid(), 'legend', [
                'label' => ' '
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);

    }
}
