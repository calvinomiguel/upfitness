<?php

class BMI {
    private $bmi;

    public function  calculateBMI($weight, $height )
    {
        $this->bmi = $weight / pow($height / 100, 2);
        $this->bmi = floor($this->bmi * 10) / 10;
        return $this->bmi;
    }
}