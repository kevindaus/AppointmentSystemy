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
            ->add('description', 'text',[
                'default_value'=> $productModel->description,
            ])
            ->add('type', 'text',[
                'default_value'=> $productModel->type,
            ])
            ->add('picture', 'text',[
                'default_value'=> $productModel->picture,
            ])
            ->add('specification', 'text',[
                'default_value'=> $productModel->specification,
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
