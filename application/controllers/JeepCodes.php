<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JeepCodes extends CI_Controller {
	public function index()
	{
        $answer = $this->session->flashdata("answer");
        $data["answer"] = null;
		if($answer)
			$data["answer"] = $answer;
        $this->load->view('pages/jeep-code.php', $data);
	}

    public function parseCodes() {

        $jeepCode = $this->input->post("jeepCode");
        $answer = "";
        $jeepCodesArr = array(
                "01A" => array("Alpha", "Bravo", "Charlie", "Echo", "Golf"),
                "02B" => array("Alpha", "Charlie", "Delta", "Foxtrot", "Golf"),
                "03C" => array("Charlie", "Delta", "Foxtrot", "Hotel", "India"),
                "04A" => array("Charlie", "Delta", "Echo", "Foxtrot", "Golf"),
                "04D" => array("Charlie", "Echo", "Foxtrot", "Golf", "India"),
                "06B" => array("Delta", "Hotel", "Juliet", "Kilo", "Lima"),
                "06D" => array("Delta", "Foxtrot", "Golf", "India", "Kilo"),
                "10C" => array("Foxtrot", "Golf", "Hotel", "India", "Juliet"),
                "10H" => array("Foxtrot", "Hotel", "Juliet", "Lima", "November"),
                "11A" => array("Foxtrot", "Golf", "Kilo", "Mike", "November"),
                "11B" => array("Foxtrot", "Golf", "Lima", "Oscar", "Papa"),
                "20A" => array("India", "Juliet", "November", "Papa", "Romeo"),
                "20C" => array("India", "Kilo", "Lima", "Mike", "Romeo"),
                "42C" => array("Juliet", "Kilo", "Lima", "Mike", "Oscar"),
                "42D" => array("Juliet", "November", "Oscar", "Quebec", "Romeo")
            );
        
            $jeepCode = strtoupper($jeepCode);
            $jeepCodes = explode(",", $jeepCode);
            $jeepCodesLength = count($jeepCodes);
            $matchingJeepColors = array();
            $arrayOfColors = array("text-primary", "text-success", "text-warning", "text-danger");
        
            if (empty($jeepCodes)) {
                // echo "JeepCode/s is empty";
                $answer .= "JeepCode/s is empty";
            } else {
                for ($row = 0; $row < $jeepCodesLength; $row++) {
                // current jeep
                $code = trim($jeepCodes[$row]);
                
                // echo "$code=>";
                $answer .= "$code=>";
                // get routes
                $routesOfJeep = (array) $jeepCodesArr[$code];
                // print routes
                for ($routesIndex = 0; $routesIndex < count($routesOfJeep); $routesIndex++) {
                    $value = $routesOfJeep[$routesIndex];
                    $exists_in_others = false;
                    $matching_code = "";
                    // for more than 1 codes
                    if ($jeepCodesLength > 1) {
                    for ($col = 0; $col < $jeepCodesLength; $col++) {
                        $codeToCheckAgainst = trim($jeepCodes[$col]);
                        $routesOfJeepToCheckAgainst = (array) $jeepCodesArr[$codeToCheckAgainst];
                        if ($col != $row && in_array($value, $routesOfJeepToCheckAgainst)) {
                        if (!isset($matchingJeepColors[$value])) {
                            $color = $arrayOfColors[$row%4];
                            $matchingJeepColors[$value] = $color;
                            // echo  $matchingJeepColors[$value];
                            $answer .= "$matchingJeepColors[$value]";
                        }
                        $matching_code = $value;
                        $exists_in_others = true;
                        break;
                        }
                    }
                    }
                    if ($exists_in_others)
                        // echo " <b class=" . "$matchingJeepColors[$matching_code]" . ">$value</b>";
                        $answer .= " <b class=" . "$matchingJeepColors[$matching_code]" . ">$value</b>";
                    else
                        // echo " $value";
                        $answer .=" $value";
                    if ($routesIndex !=  count($routesOfJeep) - 1) {
                        // echo "<->";
                        $answer .= "<->";
                    }
                }
                if ($row != $jeepCodesLength - 1) {
                    // echo ", ";
                    $answer .= "<->";
                }
            }
        }
        // echo $answer;
        $this->session->set_flashdata('answer', $answer);
        redirect("/");
        // $this->session->set_flashdata('answer', $username." - This username already exists.");
    }
}
