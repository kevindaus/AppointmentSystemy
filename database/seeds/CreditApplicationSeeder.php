<?php

use App\CreditApplication;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CreditApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // php artisan db:seed --class="CreditApplicationSeeder"
        factory(CreditApplication::class, 3)->create()->each(function ($model) use ($faker) {
            $model->save();
            /* customer collateral */
            $customer_collateral = new \App\CustomersCollateral();
            $customer_collateral->name = $faker->word;
            $customer_collateral->supporting_document = $faker->word;
            $customer_collateral->estimated_market_value = $faker->randomNumber(5);
            $customer_collateral->customer_id = $model->customer_id;
            $customer_collateral->save();
            /* register a product for the credit app */
            $product = factory(\App\Product::class)->create();

            $credit_application_product = new \App\CreditApplicationProduct();
            $credit_application_product->credit_application_id = $model->id;
            $credit_application_product->product_id = $product->id;
            $credit_application_product->save();
            /* register a staff for the credit app */
            $roles = [
                \App\Staff::POSITION_BRANCH_MANAGER,
                \App\Staff::POSITION_CLARIFIER,
                \App\Staff::POSITION_CREDIT_RECEIVER,
                \App\Staff::POSITION_FIELD_SALESMAN,
            ];
            foreach ($roles as $current_role) {
                $temp_staff = factory(\App\Staff::class)->create();
                $credit_application_staff = new \App\CreditApplicationStaff();
                $credit_application_staff->staff_id = $temp_staff->id;
                $credit_application_staff->credit_application_id = $model->id;
                $credit_application_staff->role = $current_role;
                $credit_application_staff->save();
            }
            /* co maker */
            $coMaker = factory(\App\CoMaker::class)->create();
            $credit_application_co_maker = new \App\CreditApplicationCoMaker();
            $credit_application_co_maker->credit_application_id = $model->id;
            $credit_application_co_maker->co_maker_id = $coMaker->id;
            $credit_application_co_maker->save();


        });

    }
}
