<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = [];

    public function getFullName()
    {
        return sprintf("%s. %s %s %s %s", $this->title, $this->first_name, $this->middle_name, $this->last_name, $this->suffix);
    }

}
