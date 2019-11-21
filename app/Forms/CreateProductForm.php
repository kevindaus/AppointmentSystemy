<?php


namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CreateProductForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [

            ])
            ->add('price', 'number', [

            ])
            ->add('description', 'textarea', [
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('type', 'select', [
                'choices' => [
                    'Big Bike' =>'Big Bike',
                    'Small Displacement Motorcycle' =>'Small Displacement Motorcycle',
                    'Scooter' =>'Scooter'
                ]
            ])
            ->add('picture', 'file', [
                'wrapper' => ['class' => 'col-12 pt-2'],
            ])
            ->add('specification', 'textarea', [

            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
