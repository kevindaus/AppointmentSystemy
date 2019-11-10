<?php


namespace App\Forms;

use App\Staff;

/**
 * Class UpdateStaffForm
 * @package App\Forms
 * @property Staff $staff
 */
class UpdateStaffForm extends StaffForm
{

    public function buildForm()
    {
        /* @var $staffModel Staff */
        $staffModel = $this->getModel();
        $this
            ->add('id', 'hidden',[
                'default_value'=> $staffModel->id,
            ])
            ->add('title', 'select', [
                'default_value'=> $staffModel->title,
                'empty_value' => '=== Select title ===',
                'value'=>$staffModel->title,
                'choices' => [
                    'Mr.' => 'Mr.',
                    'Mrs.' => 'Mrs.',
                    'Dr.' => 'Dr.'
                ]
            ])
            ->add('first_name', 'text',[
                'default_value'=> $staffModel->first_name,
            ])
            ->add('middle_name', 'text',[
                'default_value'=> $staffModel->middle_name,
            ])
            ->add('last_name', 'text',[
                'default_value'=> $staffModel->last_name,
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }

    /**
     * @return mixed
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param mixed $staff
     */
    public function setStaff($staff): void
    {
        $this->staff = $staff;
    }

}
