<?php



function valid($X, $Y, $R)
{
    if(filter_input(INPUT_GET, "X", FILTER_VALIDATE_FLOAT) && filter_input(INPUT_GET, "Y", FILTER_VALIDATE_FLOAT) && filter_input(INPUT_GET, "R", FILTER_VALIDATE_FLOAT)) {
        $FX = floatval($X);
        $FY = floatval($Y);
        $FR = floatval($R);

        if(($FX >= -2 && $FX <= 2) && ($FY > -3 && $FY < 3) && ($FR > 2 && $FR < 5)) { // лень вбивать все точки

            return true;
        }


    }

return false;
}



?>