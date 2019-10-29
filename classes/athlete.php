<?php


class Athlete
{
    private $goal;
    private $sex;
    private $age;
    private $height;
    private $weight;
    private $bmi;
    private $calories;
    private $requiredProtein;

    function setData($goal, $age, $height, $weight, $sex)
    {
        $this->goal = $goal;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
        $this->sex = $sex;
    }

    function getGoal()
    {
        return $this->goal;
    }

    function getAge()
    {
        return $this->age;
    }

    function getHeight()
    {
        return $this->height;
    }

    function getWeight()
    {
        return $this->weight;
    }

    function getSex()
    {
        return $this->sex;
    }

    function calculateAge($userBirthDate)
    {
        $currentDate = new DateTime();
        $dateArray = preg_split('[/]', $userBirthDate);
        $birthDate = $dateArray[0] . "-" . $dateArray[1] . "-" . $dateArray[2];
        $birthDate = new DateTime($birthDate);
        $difference = date_diff($currentDate, $birthDate);
        return $difference->format('%Y');
    }

    function calculateCaloriesRequired()
    {
        //CALORIES INTAKE FORMULA FOR FEMALES TO LOSE WEIGHT
        if ($this->goal == "Lose weight" && ucfirst($this->sex) == "Female") {
            $this->calories = (655.1 + (9.6 * $this->weight) + (1.8 * $this->height) - (4.7 * $this->age)) - 200;
            return floor($this->calories);
        }

        //CALORIES INTAKE FORMULA FOR MALES TO LOSE WEIGHT
        if ($this->goal == "Lose weight" && ucfirst($this->sex) == "Male") {
            $this->calories = (66.47 + (13.7 * $this->weight) + (5 * $this->height) - (6.8 * $this->age)) - 200;
            return floor($this->calories);
        }

        //CALORIES INTAKE FORMULA FOR FEMALES TO BUILD MUSCLE
        if ($this->goal == "Build muscles" && ucfirst($this->sex) == "Female") {
            $this->calories = (655.1 + (9.6 * $this->weight) + (1.8 * $this->height) - (4.7 * $this->age)) + 200;
            return floor($this->calories);
        }

        //CALORIES INTAKE FORMULA FOR MALES TO BUILD MUSCLE
        if ($this->goal == "Build muscles" && ucfirst($this->sex) == "Male") {
            $this->calories = (66.47 + (13.7 * $this->weight) + (5 * $this->height) - (6.8 * $this->age)) + 200;
            return floor($this->calories);
        }
    }

    function calculateRequiredProtein()
    {
        if ($this->goal == "Build muscles") {
            return $this->requiredProtein = floor($this->weight * 0.8);
        }

        if ($this->goal == "Lose weight") {
            return $this->requiredProtein = floor($this->calories * 0.075);
        }
    }
}