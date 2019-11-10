<?php


namespace App\Forms\CustomFields;


use Kris\LaravelFormBuilder\Fields\FormField;

class LegendType extends  FormField
{

    /**
     * Get the template, can be config variable or view path.
     *
     * @return string
     */
    protected function getTemplate()
    {
        return "vendor.laravel-form-builder.legend";
    }
    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        return parent::render($options, $showLabel, $showField, $showError);
    }
}
