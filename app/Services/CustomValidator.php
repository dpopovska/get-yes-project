<?php 

namespace App\Services;

use App\NastavenKadar;
use App\Opstina;
use App\StudiskiPredmet;
use App\StudiskiSemestar;
use App\TipPredmetnaAktivnost;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class CustomValidator extends Validator{

	/**
	 * Validated values can contain only letters and spaces.
	 * 
	 * @param  string $attribute 
	 * @param  string $value     
	 * @return boolean
	 */
    public function validateAlphaSpace($attribute, $value){  
        return preg_match('/^[\pL\s]+$/u', $value);
    }

    /**
	 * Validated values can contain: letters, numbers, spaces and ~@#$%&*?()\/\_+,.:-'"`„“
	 * 
	 * @param  string $attribute 
	 * @param  string $value     
	 * @return boolean
	 */
     public function validateAlphaNumSpec($attribute, $value){  
        return preg_match('/^[\'"`„“\pL\s0-9~@#$%&*?(){}\/_+,.:\-=]+$/u', $value);
    }

    /**
	 * Validated values can contain: letters, spaces and -.'"`„“
	 * 
	 * @param  string $attribute 
	 * @param  string $value     
	 * @return boolean
	 */
     public function validatePrefix($attribute, $value){  
        return preg_match('/^[\'"`„“\pL\s.-]+$/u', $value);
    }

    /**
     * Validated facebook link (format: (www).facebook.com/)
     * 
     * @param  string $attribute 
     * @param  string $value     
     * @return boolean
     */
    public function validateFacebook($attribute, $value){
        return  preg_match('/(www\.)?facebook\.com/', $value);
    }
    /**
     * Validate unique combination of two rows, ex. first name and last name
     * 
     * @param  string $attribute  
     * @param  string $value      
     * @param  array  $parameters 
     * @return boolean             
     */
    public function validateUniqueWith($attribute, $value, $parameters)
    {
        $result = DB::table($parameters[0])->where(function($query) use ($attribute, $value, $parameters) {
        	// Don't check for unique combination in the edited row when form is modified
        	if(sizeof($parameters) == 4 || sizeof($parameters) == 6){
               $query->where('id', '!=', $parameters[sizeof($parameters) - 1]);
        	}
        		
            if(isset($value) && $value != "empty")
                $query->where($attribute, '=', $value);

            $query->where($parameters[1], '=', $parameters[2]); 

            if(sizeof($parameters) > 4){
                $query->where($parameters[3], '=', $parameters[4]);
            }

        })->first();

        return $result ? false : true;
    }

     /**
     * Validated values should be lower than 100
     * 
     * @param  string $attribute 
     * @param  string $value     
     * @return boolean
     */
     public function validateBelowValue($attribute, $value){ 

        // in case the float value is inserted with decimal comma instead of decimal point
        $new_value = str_replace(',', '.', $value); 
        return floatval($new_value) <= 100;
    }

     /**
     * Validated values should be float with 2 digits after the decimal point
     * 
     * @param  string $attribute 
     * @param  string $value     
     * @return boolean
     */
     public function validateFloat($attribute, $value){  
        return preg_match('/^\d+([\,.]\d{1,2})?$/', $value);
    } 

    /**
     * If user is allowed to add new select value while adding an entity, then check if it's valid
     * Also it's used for checking the format of the selected value in some of the dropdown lists
     * @param  string $attribute  
     * @param  string $value      
     * @return boolean             
     */
    public function validateNewSelectValue($attribute, $value, $parameters)
    {
       //check if value is null , null is allowed and we will return true
	   if(is_null($value))
		   return true;
	   
	   //if value is number, check if exist in table
	   if(is_numeric($value) && $parameters[0] != ""){	  
	   
		    return DB::table($parameters[0])->find($value);
	   }
	   
	   //if value is string check the value with regex
	   if(is_string($value))
		   return preg_match("/[a-zA-Z ]*$/", $value);
		
		return false;
    }
	
	/**
     * Rule for predmetna aktivnost , diferent number of points are allowed for diferent tip na aktivnost
     *   
     * @param  string $attribute  
     * @param  string $value      
     * @param  array $parameters 
     * @return boolean             
     */
    public function validateActivnostpoeni($attribute, $value, $parameters)
    {		
		$activnost = new TipPredmetnaAktivnost;
		
		if(count($parameters) != 1)
			return false;
	
		if($parameters[0] == '')// za da ne javuva greska koga tip na aktivnost ne e odbrana, toa ne e dozvoleno
			return true;
			
		//if student is nerodven $parameters[2] == true
		$poenizaactivnost = $activnost->getMaxPoeniForTipAktivnost($parameters[0]);

		if($value > $poenizaactivnost){
			return false;
		}
		
		return true;
    }
		
	/**
     * Rule for polozen in crate predmetna aktivnost
     *   
     * @param  string $attribute  
     * @param  string $value      
     * @param  array $parameters 
     * @return boolean             
     */
    public function validatePolozenkolokvium($attribute, $value, $parameters)
    {
		if(count($parameters) < 1)
			return false;

		if((strtolower($parameters[0]) == strtolower('Колоквиум 1') || strtolower($parameters[0]) == strtolower('Колоквиум 2')) && $value == 0)
			return false;
		
		return true;
    }
	
    /**
     * Rule which limits the addition of zavrsni studiski predmeti
     * Only one zavrsen predmet per studiska programa is allowed
     *   
     * @param  string $attribute  
     * @param  string $value      
     * @param  array $parameters 
     * @return boolean             
     */
    public function validateEdinstvenZavrsenPredmet($attribute, $value, $parameters)
    {       
        if(mb_strtolower($value) == 'не' || (sizeof($parameters) == 2 && $parameters[1] == null)) return true;

        $studiski_predmet = new StudiskiPredmet;

        $studiski_semestar = (new StudiskiSemestar)->where('id', $parameters[1])->first();

        if(is_null($studiski_semestar))
            return false;

        // Don't check for unique combination in the edited row when form is modified
        $mark_studiski = sizeof($parameters) > 2 ? $studiski_predmet->where('id', '!=', $parameters[sizeof($parameters) - 1]) : $studiski_predmet;

        $zavrsen_predmet = $mark_studiski->whereHas('studiski_semestar', function($query) use ($studiski_semestar){
            $query->where('studiska_programa_id', '=', $studiski_semestar->studiska_programa_id);
        })->where('zavrsen_predmet', 'like', 'Да')->first();

        return (is_null($zavrsen_predmet)) ? true : false;     
    }

    /**
     * When creating a custom validation rule, we sometimes need to define 
     * custom place-holder replacements for the additionally included 
     * parameters in the error messages.
     * 
     * @param  string $message    
     * @param  string $attribute  
     * @param  string $rule (in this case: UniqueWith)       
     * @param  array $parameters 
     * @return string             
     */
    protected function replaceUniqueWith($message, $attribute, $rule, $parameters)
    {
        $additionals = ['ucebna_godina_id' => 'учебна година', 'ime' => 'име', 'naziv' => 'назив', 'tip_aktivnost' => 'тип на предметна активност',
                        'nacin_studiranje_id' => 'начин на студирање', 'isklucok_ocenuvanje' => 'исклучок оценување', 'nasoka_id' => 'насока',
                        'nivo' => 'ниво', 'studiska_programa_id' => 'студиска програма'];

        return str_replace(':additional', $additionals[$parameters[1]] , $message);
    }
	
}

?>