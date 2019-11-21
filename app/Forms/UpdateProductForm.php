<?php


namespace App\Forms;


use App\Product;


class UpdateProductForm extends ProductForm
{
    public function buildForm()
    {
        /* @var $productModel Product */
        $productModel = $this->getModel();
        $this
            ->add('name', 'text',[
                'default_value'=> $productModel->name,
            ])
            ->add('price', 'number',[
                'default_value'=> $productModel->price,
            ])
            ->add('description', 'textarea',[
                'default_value'=> $productModel->description,
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('type', 'text',[
                'default_value'=> $productModel->type,
            ])
            ->add('picture', 'file',[
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('specification', 'textarea',[
                'default_value'=> $productModel->specification,
                'wrapper' => ['class' => 'col-12 mt-3']
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
