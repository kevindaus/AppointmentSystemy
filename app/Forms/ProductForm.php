<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProductForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('type', 'text')
            ->add('picture', 'text')
            ->add('specification', 'text');
    }
}
