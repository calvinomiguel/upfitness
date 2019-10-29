<?php
//Create a new instance in order to calculate and display users data
$athlete = new Athlete();
$athlete->setData("$goal", "$age", "$height", "$weight", "$sex");

//Calculate BMI
$bodyMassIndex = new BMI();
$bmi = $bodyMassIndex->calculateBMI($weight, $height);

//Define variables for later use
$checkMuscle = $checkWeight = $checkMale = $checkFemale = "";

//Checks the current value of goal and sex in the database and checks the input automatically to the current value
$goal == "Lose weight" ? $checkWeight = "checked=\"checked\"" : $checkMuscle = "checked=\"checked\"";
$sex == "Male" ? $checkMale = "checked=\"checked\"" : $checkFemale = "checked=\"checked\"";
?>
<h1 class="dash-h1">My data</h1>
<section class="dash-content">
    <h5 class="dash-h5">My info</h5>
    <form name="my-data" class="my-data" method="post">
        <div class="input-wrapper">
            <span class="dash-label">Goal</span>
            <span class="input-data"><?php print $athlete->getGoal(); ?></span>
            <label for="weight" class="field-choice">
                <input id="weight" type="radio" name="goal" value="Lose weight" <?php print $checkWeight ?>>
                Lose weight
            </label>
            <label for="muscles" class="field-choice">
                <input id="muscles" type="radio" name="goal" value="Build muscles" <?php print $checkMuscle ?>>
                Build muscles
            </label>
        </div>
        <div class="divider"></div>
        <div class="input-wrapper">
            <span class="dash-label">Sex</span>
            <span class="input-data"><?php print $athlete->getSex(); ?></span>
            <label for="male" class="field-choice">
                <input id="male" type="radio" name="sex" value="Male" <?php print $checkMale ?>>
                Male
            </label>
            <label for="female" class="field-choice">
                <input id="female" type="radio" name="sex" value="Female" <?php print $checkFemale ?>>
                Female
            </label>
        </div>
        <div class="divider"></div>
        <div class="input-wrapper bmi">
            <span class="dash-label">Age</span>
            <div class="bmi-flex">
                <span class="input-data"><?php print $athlete->getAge(); ?></span>
            </div>
        </div>
        <div class="divider"></div>
        <div class="input-wrapper">
            <span class="dash-label" for="weight">Weight</span>
            <span class="input-data weight"><?php print $athlete->getWeight(); ?> kg</span>
            <div class="field-choice text-field weight">
                <input id="weight" type="number" name="weight" placeholder="e.g. 81"
                       value="<?php print $athlete->getWeight(); ?>">
            </div>
        </div>
        <div class="divider"></div>
        <div class="input-wrapper">
            <span class="dash-label" for="weight">Height</span>
            <span class="input-data height"><?php print $athlete->getHeight(); ?> cm</span>
            <div class="field-choice text-field weight">
                <input id="height" type="number" name="height" placeholder="e.g. 180"
                       value="<?php print $athlete->getHeight(); ?>">
            </div>
        </div>
        <div class="divider"></div>
        <div class="input-wrapper bmi">
            <span class="dash-label">Body mass index</span>
            <div class="bmi-flex">
                <span class="input-data bmi-value"><?php print $bmi; ?></span>
                <div class="health-indicator-wrapper">
                    <div class="health-indicator"></div>
                    <span class="indicator-text">Normal</span>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="input-wrapper bmi">
            <span class="dash-label">Daily calorie requirement</span>
            <div class="bmi-flex">
                <span class="input-data"><?php print $athlete->calculateCaloriesRequired(); ?> kcal</span>
            </div>
        </div>
        <div class="divider"></div>
        <div class="input-wrapper bmi">
            <span class="dash-label">Daily protein requirement</span>
            <div class="bmi-flex">
                <span class="input-data"><?php print $athlete->calculateRequiredProtein() ?> g</span>
            </div>
        </div>
        <div class="divider"></div>
        <div class="edit-wrapper">
            <button class="form-button edit" type="button">Edit</button>
        </div>
        <div class="save-wrapper">
            <button class="form-button cancel" type="button">Cancel</button>
            <button class="form-button save" name="submit-mydata" type="submit">Save</button>
        </div>
    </form>
</section>
