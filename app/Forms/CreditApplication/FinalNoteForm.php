<?php


namespace App\Forms\CreditApplication;

use Kris\LaravelFormBuilder\Form;

class FinalNoteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('final_note', 'textarea', [
                'label' => 'Final Note : ',
//                'attr' => [
//                    'class' => 'col-12',
//                ],
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
