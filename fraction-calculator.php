<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>

<h3>Trupmenų skaičiuotuvas</h3>


<form method="GET" action="fraction-calculator.php">
    <input required='required' name="x" placeholder="Sveikoji Dalis" value="<?php echo isset($_GET["x"]) ? $_GET["x"] : "" ; ?>" />
    <input required='required' name="y" placeholder="Skaitiklis" value="<?php echo isset($_GET["y"]) ? $_GET["y"] : "" ; ?>" />
    <input required='required' name="z" placeholder="Vardiklis" value="<?php echo isset($_GET["z"]) ? $_GET["z"] : "" ; ?>" />
    <h1 style="display:inline-block; margin:10px;">+</h1>
    <input required='required' name="x2" placeholder="Sveikoji Dalis" value="<?php echo isset($_GET["x2"]) ? $_GET["x2"] : "" ; ?>" />
    <input required='required' name="y2" placeholder="Skaitiklis" value="<?php echo isset($_GET["y2"]) ? $_GET["y2"] : "" ; ?>" />
    <input required='required' name="z2" placeholder="Vardiklis" value="<?php echo isset($_GET["z2"]) ? $_GET["z2"] : "" ; ?>" />
    <button name="patvirtinti" type="submit">Skaičiuoti</button>
</form>

<div>
    <?php
        if(isset($_GET["patvirtinti"])) {
            $x = $_GET["x"];
            $y = $_GET["y"];
            $z = $_GET["z"];
            $x2 = $_GET["x2"];
            $y2 = $_GET["y2"];
            $z2 = $_GET["z2"];

            
            // is_int($x);
            // is_int($y);
            // is_int($z);
            // is_int($x2);
            // is_int($y2);
            // is_int($z2);

            $xats;
            $yats;
            $zats;
            $skaitiklis1;
            $vardiklis1;
            $skaitiklis2;
            $vardiklis2;

            if(is_numeric($x) && is_numeric($y) && is_numeric($z) && is_numeric($x2) && is_numeric($y2) && is_numeric($z2)) {

                // pasiverciam i netaisiklingasisas
                $skaitiklis1 = $x * $z + $y;
                $vardiklis1=$z;
                $skaitiklis2 = $x2 * $z2 + $y2;
                $vardiklis2=$z2;

                // bendravardiklinimas
                $skaitiklis1=$skaitiklis1*$vardiklis2;
                $skaitiklis2=$skaitiklis2*$vardiklis1;

                $vardiklis1=$vardiklis1*$vardiklis2;
                $vardiklis2=$vardiklis1;

                // sudetis
                $sudetasVardiklis;
                $sudetasSkaitiklis;

                $sudetasSkaitiklis=$skaitiklis1+$skaitiklis2;
                $sudetasVardiklis=$vardiklis2;


                // sveikos dalies iskyrimas
                $SveikojiDalis;

                $SveikojiDalis=intval($sudetasSkaitiklis/$sudetasVardiklis);
                $sudetasSkaitiklis=$sudetasSkaitiklis - $SveikojiDalis * $sudetasVardiklis;
                
                if($sudetasSkaitiklis==0) {
                    echo "Sveikoji dalis: " .$SveikojiDalis;
                } else {
                    echo "Sveikoji dalis: " .$SveikojiDalis. " ";
                    echo "Skatiklis: " .$sudetasSkaitiklis. " ";
                    echo "Vardiklis: " .$sudetasVardiklis. " ";
                }


            } else {
                echo "Užpildytuose laukeliuose turi būti tik skaitmenys!";
            }
        }

    ?>

</div>
</body>