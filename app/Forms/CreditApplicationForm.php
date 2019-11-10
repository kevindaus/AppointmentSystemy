<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CreditApplicationForm extends Form
{

    public function buildForm()
    {
        $this
            ->add('customer_id','hidden',[
                'value' => $this->model->id
            ])
            ->add('basis', 'text', [

            ])
            ->add('terms', 'text', [

            ])
            ->add('options', 'text', [

            ])
            ->add('due_date', 'date', [

            ])
            ->add('request_due_date', 'date', [

            ])
            ->add('status_of_customer', 'select', [
                'choices' => [
                    "loyal" => "Loyal",
                    "occasional" => "Occasional",
                    "new" => "New"
                ],
                'empty_value' => '=== Status of customer ==='
            ])
            ->add('time_interviewed', 'time', [
                'label'=>'Time Interviewed (hh:mm)',
            ])
            ->add('time_walked_in', 'time', [
                'label'=>'Time Walked in (hh:mm)',
            ])
            ->add('name_of_referral', 'text', [

            ])
            ->add('date_received_by_ci', 'date', [
                'label'=>'Date Received by CI (mm/dd/yyyy)',
            ])
            ->add('time_received_by_ci', 'time', [
                'label'=>'Time Received by CI (hh:mm)',
            ])
            ->add('distance_from_office', 'text', [
                'label'=>'Distance from office (e.g 3 km)'
            ])
            ->add('time_away_from_office', 'text', [
                'label'=>'Time away from office (e.g 2 minutes)'
            ])
            ->add('processing_time', 'text', [

            ])
            ->add('estimated_time_to_release', 'text', [
                'label'=>'Estimated time to release (e.g 2 weeks)'
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'col-12'],
            ]);
    }
}
