<?php


namespace App\Forms\CreditApplication;

use Kris\LaravelFormBuilder\Form;

class MapAddressForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('final_note', 'text', [
                'label' => 'Final Note : ',
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);;
    }
}
