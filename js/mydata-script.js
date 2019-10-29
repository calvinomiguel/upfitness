//DEFINE VARIABLES FOR FORM EDITING
const edit = document.getElementsByClassName('edit');
const formFields = document.getElementsByClassName('field-choice');
const formInfo = document.getElementsByClassName('input-data');
const editWrapper = document.querySelector('.edit-wrapper');
const saveWrapper = document.querySelector('.save-wrapper');
const divider = document.getElementsByClassName('divider');
const cancel = document.getElementsByClassName('cancel');
const inputWrapper = document.getElementsByClassName('input-wrapper');
const bmiWrapper = document.getElementsByClassName('bmi');

//DEFINE VARIABLES FOR BMI CALCULATION
const weight = document.querySelector('.weight').innerHTML;
const height = document.querySelector('.height').innerHTML;

//DEFINE VARIABLES FOR BMI STATUS
const healthIndicatorColor = document.querySelector('.health-indicator');
const healthIndicatorText = document.querySelector('.indicator-text');
let bmiValue = document.querySelector('.bmi-value');

//WHAT HAPPENS AFTER CLICKING THE EDIT BUTTON
for(let i = 0; i < edit.length; i++){
	edit[i].addEventListener('click', function(){

		editWrapper.style.display="none"; // MAKES EDIT BUTTON DISAPPEAR
		saveWrapper.style.display="flex"; //MAKES SAVE BUTTON APPEAR

		//CHANGES INPUT WRAPPER'S MARGIN
        for(let a = 0; a < inputWrapper.length; a++){
				inputWrapper[a].style.margin ="36px 0";
		}

        //MAKES FORM'S INPUTS APPEAR
        for(let x = 0; x < formFields.length; x++){
				formFields[x].style.display ="flex";
		}

        //MAKES DISPLAYED VALUE DISAPPEAR
        for(let y = 0; y < formInfo.length; y++){
				formInfo[y].style.display ="none";
		}

		//MAKES DIVIDERS DISAPPEAR
		for(let z = 0; z < divider.length; z++){
				divider[z].style.display ="none";
		}

		//MAKES BMI FIELD AND DIVIDER BENEATH IT DISAPPEAR
        for(let b = 0; b < formInfo.length; b++){
            bmiWrapper[b].style.display ="none";
            divider[divider.length - 1].style.display = "none";
        }
	}, false);
}

//WHAT HAPPENS AFTER CLICKING THE CANCEL BUTTON
for(let i = 0; i < cancel.length; i++){
	cancel[i].addEventListener('click', function(){

		editWrapper.style.display="flex"; //MAKES EDIT BUTTON REAPPEAR
		saveWrapper.style.display="none"; //MAKES SAVE BUTTON DISAPPEAR

        //CHANGES INPUT WRAPPER'S MARGIN
        for(let a = 0; a < inputWrapper.length; a++){
				inputWrapper[a].style.margin ="18px 0";
		}

        //MAKES FORM'S INPUTS DISAPPEAR
        for(let x = 0; x < formFields.length; x++){
				formFields[x].style.display ="none";
		}

        //MAKES DISPLAYED VALUE REAPPEAR
		for(let y = 0; y < formInfo.length; y++){
				formInfo[y].style.display ="block";
		}

        //MAKES DIVIDERS REAPPEAR
        for(let z = 0; z < divider.length; z++){
				divider[z].style.display ="block";
		}

        //MAKES BMI FIELD AND DIVIDER BENEATH IT REAPPEAR
        for(let b = 0; b < formInfo.length; b++){
            bmiWrapper[b].style.display ="block";
            divider[divider.length - 1].style.display = "block";
        }
	}, false);
}

//FUNCTION TO DISPLAY BMI STATUS
function showBMIStatus(){

    //UNDERWEIGHT
    if(bmiValue.innerHTML < 18.5){
        healthIndicatorColor.style.backgroundColor = "#3D79F6";
        healthIndicatorText.innerHTML = "Underweight";
    }

    //NORMAL
    if(bmiValue.innerHTML < 25 && bmiValue.innerHTML > 18.4){
        healthIndicatorColor.style.backgroundColor = "#38BA67";
        healthIndicatorText.innerHTML = "Normal";
    }
//OVERWEIGHT
    if(bmiValue.innerHTML >= 25 && bmiValue.innerHTML < 30){
        healthIndicatorColor.style.backgroundColor = "#F6CE18";
        healthIndicatorText.innerHTML = "Overweight";
    }

    //OBESE
    if(bmiValue.innerHTML >= 30){
        healthIndicatorColor.style.backgroundColor = "#B61912";
        healthIndicatorText.innerHTML = "Obese";
    }
}

//CALL BMI FUNCTIONS
showBMIStatus();
