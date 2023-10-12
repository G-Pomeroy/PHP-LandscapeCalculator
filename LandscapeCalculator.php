<!DOCTYPE>
<html lang="en">
<head>
    <title>Landscape Calculator</title>
</head>
<body>
<?php
//Set variables
$number = $length = $width = $footage = $grass = $treeNum = "";
$total = $grassCost = $treeCost = 0.00;


// Checking for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = ($_POST["number"]);
    $length = ($_POST["length"]);
    $width = ($_POST["width"]);
    $grass = ($_POST["grass"]);
    $treeNum = ($_POST["treeNum"]);
}
?>

<h2>Landscape Calculator</h2>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

    Enter House Number: <input type="text" name="number"><br><br>
    Enter Property length (feet): <input type="text" name="length"><br><br>
    Enter Property width (feet): <input type="text" name="width"><br><br>

    <h3>Select type of grass:</h3>
    Fescue <input type="radio" name="grass" id="fescue" value="Fescue"/>
    Bentgrass <input type="radio" name="grass" id="bentgrass" value="Bentgrass"/>
    Campus <input type="radio" name="grass" id="campus" value="Campus"/>
    <br><br>

    Enter amount of trees: <input type="text" name="treeNum"><br><br>
    <input type="submit" value="Submit">
</form>
<br>

<?php
//Calculate grass based on selection
switch ($grass) {
    case "Fescue":
        $grassCost = 0.05;
    break;
    case "Bentgrass":
        $grassCost = 0.02;
    break;
    case "Campus":
        $grassCost = 0.01;
    break;
    default:
        echo "Incorrect value. Please try again";
}

//Convert tree total into cost to add to total
$treeCost = $treeNum * 100.00;

//If sqft is larger than 5000 sq, add 500.00 to total
if($width * $length > 5000){
    $total += 500.00;
}

//Add total together
$total = (($width * $length) * $grassCost) + $treeCost + 1000.00;

//Display output
echo "<h2>Your Input:</h2>";
echo "Enter house number: ",$number;
echo "<br>";
echo "Enter property length (feet): ",$length;
echo "<br>";
echo "Enter property width (feet): ",$width;
echo "<br>";
echo "Enter type of grass (Fescue, Bentgrass, Campus):", $grass;
echo "<br>";
echo "Enter the number of trees: ", $treeNum;
echo "<br>";
echo "Total cost for the house number ", $number, " is: ";
echo "$ ".number_format($total, 2);
?>

</body>
</html>