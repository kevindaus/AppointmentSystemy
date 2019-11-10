<?php


namespace App\Helpers;


class StringHelper
{
    public static function labelify($rawLabel)
    {
        $rawLabelArr = explode("_", $rawLabel);
        $finalLabel = '';
        foreach ($rawLabelArr as $currentLabel) {
            $finalLabel .= ' '.ucwords($currentLabel);
        }
        return $finalLabel;
    }

}
