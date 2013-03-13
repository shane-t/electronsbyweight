<?php
$formtext = "
<p>Please fill in values for the following variables:<br/>
<form action = 'electronbyweight.php' method = 'GET'>
<table width='600px'>
<tr><td>AC Voltage in your country - e.g. 110, 230, 240</td><td><input name='voltage' type='text' value='230'/></tr>
<tr><td>Kilowatt Hour price for electricity (normally unit price) - eg 16 (cents)</td><td><input name='price' type='text' value='16'/></tr>
</table>
<input type='hidden' name='action' value='calculate'/>
<input type='submit' value='Submit'/>
</form>
";
$notes="
<p>Please note the following constants:<br/>
Mass of an electron = 9.10938188  x 10^-28 grams<br/>
1 Coulomb = 6.022 x 10^23 electrons<br/>
1 ampere = 1 coulomb/sec<br/>
Current = Power / Voltage<br/>
Current of one fixed-voltage kilowatt = 1000 W / Mains Voltage<br/>
1 hour = 3600 seconds<br/>
";

function calculate(){
$amphours = 1000 / $_GET['voltage'];
echo "1 Kilowatt hour at " . $_GET['voltage'] . "VAC is " . $amphours . " ampere hours.<br>";
$coulombs = $amphours * 3600;
$electronspercoulomb = 6.02200 * pow(10,23);
$electrons = ($coulombs * $electronspercoulomb);
echo "This is ". $coulombs . " coulombs or " . $electrons . " electrons.<br/>";
$electronmass = 9.10938188  * pow(10,-28);
$kilowatthourmass = $electrons * $electronmass;
echo "Which weighs exactly " . $kilowatthourmass . " grams.<br/><br/>";
echo "For one cent/pence you can buy " . $kilowatthourmass / $_GET['price'] . " grams of electrons.";
}

?>

<html>
<head>
<title>electron price by weight calculator</title>
</head>
<body>
<h1>ELECTRON PRICE BY WEIGHT CALCULATOR</h1>
<?php
if ($_GET['action'] == "calculate"){
calculate();
} else {
echo $formtext;
echo $notes;
}
?>
</p>
</body>
</html>
