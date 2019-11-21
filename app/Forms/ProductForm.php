<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProductForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('price', 'number')
            ->add('type', 'text')
            ->add('picture', 'file')
            ->add('description', 'textarea')
            ->add('specification', 'text');
    }
}
