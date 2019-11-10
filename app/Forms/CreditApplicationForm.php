<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CreditApplicationForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('basis', 'text')
            ->add('terms', 'text')
            ->add('options', 'text')
            ->add('due_date', 'text')
            ->add('request_due_date', 'text')
            ->add('adp', 'text')
            ->add('adp_ma', 'text')
            ->add('adp_rebate', 'text')
            ->add('adp_net', 'text')
            ->add('dp', 'text')
            ->add('dp_ma', 'text')
            ->add('dp_cropping', 'text')
            ->add('dp_rebate', 'text')
            ->add('dp_net', 'text')
            ->add('status_of_customer', 'text')
            ->add('co_maker', 'text')
            ->add('time_interviewed', 'text')
            ->add('time_walked_in', 'text')
            ->add('name_of_referral', 'text')
            ->add('name_of_field_sale', 'text')
            ->add('received_by_ci', 'text')
            ->add('date_received_by_ci', 'text')
            ->add('time_received_by_ci', 'text')
            ->add('correct_and_confirmed_by', 'text')
            ->add('map_location_longitude', 'text')
            ->add('map_location_latitude', 'text')
            ->add('distance_from_office', 'text')
            ->add('time_away_from_office', 'text')
            ->add('processing_time', 'text')
            ->add('estimated_time_to_release', 'text')
            ->add('recommendation_of_branch_manager', 'text')
            ->add('branch_manager', 'text')
            ->add('last_payment', 'text');
    }
}
