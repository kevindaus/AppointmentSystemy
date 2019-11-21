<?php


namespace App\Forms\CreditApplication;


use App\Staff;
use Kris\LaravelFormBuilder\Form;

class AssistingStaffForm extends Form
{
    public function buildForm()
    {
        $staff = Staff::all();
        $staffCollection = [];
        foreach ($staff as $currentStaff) {
            $staffCollection[$currentStaff->id] = $currentStaff->getFullName();
        }

        $this
            ->add('branch_manager', 'select', [
                'label' => 'Branch Manager',
                'choices'=>$staffCollection,
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('received_by_ci', 'select', [
                'label' => 'Received by CI',
                'choices'=>$staffCollection,
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('correct_and_confirmed_by', 'select', [
                'label' => 'Correct and Confirmed By',
                'choices'=>$staffCollection,
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('field_salesman', 'select', [
                'label' => 'Branch Manager',
                'choices'=>$staffCollection,
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);

    }
}
