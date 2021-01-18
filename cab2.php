<?php
session_start();
$Dist = array(
    "Charbagh" => 0,           //Distances in Km
    "Indira Nagar" => 10,
    "BBD" => 30,
    "Faizabad" => 100,
    "Barabanki" => 60,
    "Basti" => 150,
    "Gorakhpur" => 210
);
$pick = $_POST['pickup'];
$dr = $_POST['drop'];
$cab = $_POST['cabtype'];
$weight = $_POST['luggage'];
$_SESSION['cabtype']=$cab;
$_SESSION['weight']=$weight;
$_SESSION['distance']=abs($Dist[$pick] +$Dist[$dr]);
$_SESSION['pickup']=$pick;
$_SESSION['drop']=$dr;
// echo $_SESSION['cabtype'];
// echo $_SESSION['weight'];
// echo $_SESSION['distance'];
// session_destroy();
class CedMicro
{
    function Micro()
    {
        $Dist = array(
            "Charbagh" => 0,           //Distances in Km
            "Indira Nagar" => 10,
            "BBD" => 30,
            "Faizabad" => 100,
            "Barabanki" => 60,
            "Basti" => 150,
            "Gorakhpur" => 210
        );
        $pick = $_POST['pickup'];
        $dr = $_POST['drop'];
        $cab = $_POST['cabtype'];
        $weight = $_POST['luggage'];
        $distance = abs($Dist[$pick] - $Dist[$dr]);
        echo "Total Distance:" . $distance . "Km" . "<br>";
        echo "CAB-Type:" . $cab . "<br>";
        echo "Luggage: 0Kg" . "<br>";

        //CONDITIONS FOR CEDMICRO
        if ($cab == "CedMicro") {
            $Fair = 50; //in Rs.
            //For First 10Km
            if ($distance <= 10) {
                $Fair += ($distance * 13.50);
                echo "Your total Fair is:" . "₹" . $Fair;
                $_SESSION['fair']=$Fair;
            }
            //For next 50Km
            elseif ($distance > 10 && $distance <= 60) {
                $Fair = (10 * 13.5);
                $Fair+= (($distance - 10) * 12) + 50;
                echo "Your total Fair is:" . "₹" . $Fair . " ";
                $_SESSION['fair']=$Fair;
            }
            //For next 100Km
            elseif ($distance <= 160) {

                $Fair = (($distance - 60) * 10.2) + (10 * 13.5) + (50 * 12) + 50;
                echo "Your total Fair is" . "₹" . $Fair . " ";
                $_SESSION['fair']=$Fair;
            }
            //For above 160Km
            else {
                $Fair += (($distance - 160) * 8.50) + ((10 * 13.50) + (50 * 12.00)) + (100 * 10.20);
                echo "Your total Fair is:" . "₹" . $Fair . " ";
                $_SESSION['fair']=$Fair;
            }
        }
    }
}
class CedMini
{
    function Mini()
    {
        $Dist = array(
            "Charbagh" => 0,           //Distances in Km
            "Indira Nagar" => 10,
            "BBD" => 30,
            "Faizabad" => 100,
            "Barabanki" => 60,
            "Basti" => 150,
            "Gorakhpur" => 210
        );
        $pick = $_POST['pickup'];
        $dr = $_POST['drop'];
        $cab = $_POST['cabtype'];
        $weight = $_POST['luggage'];
        $distance = abs($Dist[$pick] - $Dist[$dr]);
        echo "Pick-Up Location:" . $distance . "Km" . "<br>";
        echo "CAB-Type:" . $cab . "<br>";
       
        //CONDITIONS FOR CEDMINI
        if ($cab == "CedMini") {
            $Fair = 150; //in Rs.
            //For First 10Km
            if ($distance <= 10 &&($weight <= 10)) {
                if ($weight <= 0) {
                    $weight=0;
                    $Fair += ($distance * 14.50);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>";
                    echo "Luggage: $weight KG" . "<br>";
                    $_SESSION['fair']=$Fair;
                } else {
                    $Fair += ($distance * 14.50) + 50;
                    echo "Your total Fair is" . "₹" . $Fair . " <br>";
                    echo "Luggage: $weight KG" . "<br>";
                    $_SESSION['fair']=$Fair;
                }
            } elseif ($distance <= 10 && ($weight > 10 && $weight <= 20)) {
                $Fair += ($distance * 14.50) + 100;
                echo "Your total Fair is" ."₹".$Fair . "<br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance <= 10 && ($weight > 20)) {

                $Fair += ($distance * 14.50) + 200;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            
            //For next 50Km
            elseif ($distance > 10 && $distance <= 60 && ($weight <= 10)) {
                if ($weight <= 0) {
                    $weight=0;
                    $Fair = (10 * 14.50)+150;
                    $Fair += (($distance - 10) * 13.00);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                } else {
                    $Fair = (10 * 14.50) + 50+150;
                    $Fair += (($distance - 10) * 13.00);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
            } elseif ($distance > 10 && $distance <= 60 && ($weight > 10 && $weight <= 20)) {

                $Fair = (10 * 14.50) + 100+150;
                $Fair += (($distance - 10) * 13.00);
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance > 10 && $distance <= 60 && ($weight > 20)) {

                $Fair = (10 * 14.50) + 200+150;
                $Fair += (($distance - 10) * 13.00);
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For next 100Km
            elseif ($distance <= 160 && ($weight <= 10)) {
                if ($weight <= 0) {
                    $weight=0;
                    $Fair += (($distance - 60) * 11.20) + (10 * 14.50) + (50 * 13);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                } else {
                    $Fair += (($distance - 60) * 11.20) + (10 * 14.50) + (50 * 13) + 50;
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
            } elseif ($distance <= 160 && ($weight > 10 && $weight <= 20)) {
                $Fair += (($distance - 60) * 11.20) + (10 * 14.50) + (50 * 13) + 100;
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance <= 160 && ($weight > 20)) {
                $Fair += (($distance - 60) * 11.20) + (10 * 14.50) + (50 * 13) + 200;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For next above 160km
            elseif ($distance > 160 && ($weight <= 10)) {
                if ($weight <= 0) {
                    $weight=0;
                    $Fair += (($distance - 160) * 9.50) + (10 * 14.50) + (50 * 13) + (100 * 11.2);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                } else {
                    $Fair += (($distance - 160) * 9.50) + (10 * 14.50) + (50 * 13) + (100 * 11.2) + 50;
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
            } elseif ($distance > 160 && ($weight > 10 && $weight <= 20)) {
                $Fair += (($distance - 160) * 9.50) + (10 * 14.50) + (50 * 13) + (100 * 11.2) + 100;
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance > 160 && ($weight > 20)) {
                $Fair += (($distance - 160) * 9.50) + (10 * 14.50) + (50 * 13) + (100 * 11.2) + 200;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
        }
    }
}
class CedRoyal
{
    function royal()
    {
        $Dist = array(
            "Charbagh" => 0,           //Distances in Km
            "Indira Nagar" => 10,
            "BBD" => 30,
            "Faizabad" => 100,
            "Barabanki" => 60,
            "Basti" => 150,
            "Gorakhpur" => 210
        );
        $pick = $_POST['pickup'];
        $dr = $_POST['drop'];
        $cab = $_POST['cabtype'];
        $weight = $_POST['luggage'];
        $distance = abs($Dist[$pick] - $Dist[$dr]);
        echo "Pick-Up Location:" . $distance . "Km" . "<br>";
        echo "CAB-Type:" . $cab . "<br>";
       
        //CONDITIONS FOR CedRoyal
        if ($cab == "CedRoyal") {
            $Fair = 200; //in Rs.
            //For First 10Km
            if ($distance <= 10 && ($weight <= 10)) {
                if ($weight <= 0) {
                    $weight=0;
                    $Fair += ($distance * 15.50);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    echo "Luggage: $weight KG" . "<br>";
                    $_SESSION['fair']=$Fair;
                } else {
                    $Fair += ($distance * 15.50) + 50;
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
            } elseif ($distance <= 10 && ($weight > 10 && $weight <= 20)) {
                $Fair += ($distance * 15.50) + 100;
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance <= 10 && ($weight > 20)) {
                $Fair += ($distance * 15.50) + 200;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For next 50Km
            elseif ($distance > 10 && $distance <= 60 && ($weight <= 10)) {
                if ($weight <= 0) {
                    $weight=0;
                    $Fair = (10 * 15.50)+200;
                    $Fair += (($distance - 10) * 14.00);
                    echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                } else {
                    $Fair = (10 * 15.50) + 200+50;
                    $Fair += (($distance - 10) * 14.00);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
            } elseif ($distance > 10 && $distance <= 60 && ($weight > 10 && $weight <= 20)) {
                $Fair = (10 * 15.50) + 100+200;
                $Fair += (($distance - 10) * 14.00);
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance > 10 && $distance <= 60 && ($weight > 20)) {
                $Fair = (10 * 15.50) + 200+100;
                $Fair += (($distance - 10) * 14.00);
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For next 100Km
            elseif ($distance <= 160 && ($weight <= 10)) {
                if($weight<=0)
                {
                        $weight=0;
                    $Fair += (($distance - 60) * 12.20) + (10*15.5)+(50*14);
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
                }
                else
                {
                    $Fair += (($distance - 60) * 12.20) + (10*15.5)+(50*14)+50;
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
               
            } elseif ($distance <= 160 && ($weight > 10 && $weight <= 20)) {
                $Fair += (($distance - 60) * 12.20) + (10*15.5)+(50*14)+100;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance <= 160 && ($weight > 20)) {
                $Fair += (($distance - 60) * 12.20) + (10*15.5)+(50*14)+200;
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For Above 100Km
            elseif ($distance > 160 && ($weight <= 10)) {
                if($weight<=0)
                {
                    $weight=0;
                    $Fair += (($distance - 160) * 10.50) +(10*15.50)+(50*14)+(100*12.2);
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
                }
                else{
                    $Fair += (($distance - 160) * 10.50) +(10*15.50)+(50*14)+(100*12.2)+50;
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
                
            } elseif ($distance > 160 && ($weight > 10 && $weight <= 20)) {
                $Fair += (($distance - 160) * 10.50) +(10*15.50)+(50*14)+(100*12.2)+100;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance > 160 && ($weight > 20)) {
                $Fair += (($distance - 160) * 10.50) +(10*15.50)+(50*14)+(100*12.2)+200;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
        }
    }
}
class CedSUV
{
    function suv()
    {
        $Dist = array(
            "Charbagh" => 0,           //Distances in Km
            "Indira Nagar" => 10,
            "BBD" => 30,
            "Faizabad" => 100,
            "Barabanki" => 60,
            "Basti" => 150,
            "Gorakhpur" => 210
        );
        $pick = $_POST['pickup'];
        $dr = $_POST['drop'];
        $cab = $_POST['cabtype'];
        $weight = $_POST['luggage'];
        $distance = abs($Dist[$pick] - $Dist[$dr]);
        echo "Pick-Up Location:" . $distance . "Km" . "<br>";
        echo "CAB-Type:" . $cab . "<br>";
        

        //CONDITIONS FOR CedSUV
        if ($cab == "CedSUV") {
            $Fair = 250; //in Rs.
            //For First 10Km
            if ($distance <= 10 && ($weight <= 10)) {
                if ($weight <= 0) {
                    $weight=0;
                    $Fair += ($distance * 16.50);
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    echo "Luggage: $weight KG" . "<br>";
                    $_SESSION['fair']=$Fair;
                } else {
                    $Fair += ($distance * 16.50) + 100;
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
            } elseif ($distance <= 10 && ($weight > 10 && $weight <= 20)) {
                $Fair += ($distance * 16.50) + 200;
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance <= 10 && ($weight > 20)) {
                $Fair += ($distance * 16.50) + 400;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For next 50Km
            elseif (($distance > 10 && $distance <= 60) && ($weight <= 10)) {
                if($weight<=0)
                {
                    $weight=0;
                    $Fair +=(10 * 16.50);
                $Fair = (($distance - 10) * 15.00);
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
                }
                else{
                    $Fair += (10 * 16.50) + 100;
                    $Fair = (($distance - 10) * 15.00);
                    echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
                
            } elseif (($distance > 10 && $distance <= 60) && ($weight > 10 && $weight <= 20)) {

                $Fair += (10 * 16.50) + 200;
                $Fair = (($distance - 10) * 15.00);
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif (($distance > 10 && $distance <= 60) && ($weight > 20)) {
                $Fair += (10 * 16.50) + 400;
                $Fair = (($distance - 10) * 15.00);
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For next 100Km
            elseif ($distance <= 160 && ($weight <= 10)) {
                if($weight<=0)
                {
                    $weight=0;
                    $Fair += (($distance - 60) * 13.20) + (10*16.50)+(50*15.00);
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
                }
                else
                {
                    $Fair += (($distance - 60) * 13.20) + (10*16.50)+(50*15.00) + 100;
                    echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
               
            } elseif ($distance <= 160 && ($weight > 10 && $weight <= 20)) {

                $Fair += (($distance - 60) * 13.20) + (10*16.50)+(50*15.00) + 200;
                echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance <= 160 && ($weight > 20)) {
                $Fair += (($distance - 60) * 13.20) + (10*16.50)+(50*15.00) + 400;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
            //For Above 100Km
            elseif ($distance >= 100 && ($weight <= 10)) {
                if($weight<=0)
                {
                        $weight=0;
                    $Fair += (($distance - 160) * 11.50) + (10*16.5)+(50*15)+(100*13.2);
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
                }
                else{
                    $Fair += (($distance - 160) * 11.50) + (10*16.5)+(50*15)+(100*13.2) + 100;
                    echo "Your total Fair is" . "₹" . $Fair . "<br>  ";
                    $_SESSION['fair']=$Fair;
                    echo "Luggage: $weight KG" . "<br>";
                }
                
            } elseif ($distance >= 100 && ($weight > 10 && $weight <= 20)) {
                $Fair += (($distance - 160) * 11.50) + (10*16.5)+(50*15)+(100*13.2) + 200;
                echo "Your total Fair is" . "₹" . $Fair . " <br> ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            } elseif ($distance >= 100 && ($weight > 20)) {

                $Fair += (($distance - 160) * 11.50) + (10*16.5)+(50*15)+(100*13.2) + 400;
                echo "Your total Fair is:" . "₹" . $Fair . "<br>  ";
                $_SESSION['fair']=$Fair;
                echo "Luggage: $weight KG" . "<br>";
            }
        }
    }
}
if ($cab == "CedMicro") {
    $micro = new CedMicro();
    echo $micro->Micro();
} elseif ($cab == "CedMini") {
    $mini = new CedMini();
    echo $mini->Mini();
} elseif ($cab == "CedRoyal") {
    $royal = new CedRoyal();
    echo $royal->royal();
} elseif ($cab == "CedSUV") {
    $suv = new CedSUV();
    echo $suv->suv();
}
$servername = "localhost";
$username = "root";
$password = "";
$database="CedCab";



?>






