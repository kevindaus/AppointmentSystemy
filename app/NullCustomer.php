<?php


namespace App;


class NullCustomer extends Customer
{


    /**
     * NullCustomer constructor.
     */
    public function __construct()
    {
        $this->title = '--';
        $this->first_name = '--';
        $this->last_name = '--';
        $this->middle_name = '--';
    }
}
