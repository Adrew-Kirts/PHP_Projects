<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>

    <form action="" method="get">
        <input type="number" name="num1" placeholder="Number 1">
        <br>
        <input type="number" name="num2" placeholder="Number 2">
        <br>
        <select name="operator">
            <option>Choose operator:</option>
            <option>Add</option>
            <option>Substract</option>
            <option>Multiply</option>
            <option>Divide</option>
        </select>
        <button type="submit" name= "submit" value="submit">Calculate</button>
<p>
    </form>

    <?php 

if (isset($_GET['submit'])) {
    $result1 = $_GET['num1'];
    $result2 = $_GET['num2'];
    $operator = $_GET['operator'];
    switch ($operator) {

        case "Add":
            echo "You calculated ",$result1, "+", $result2, "<br><br>";
            echo "Answer: ", $result1 + $result2;
        break;
        
        case "Substract":
            echo "You calculated ",$result1, "-", $result2, "<br><br>";
            echo "Answer: ", $result1 - $result2;
        break;
        
        case "Multiply":
            echo "You calculated ",$result1, "*", $result2, "<br><br>";
            echo "Answer: ", $result1 * $result2;
        break;
        
        case "Divide":
            echo "You calculated ",$result1, "/", $result2, "<br><br>";
            echo "Answer: ", $result1 / $result2;
        break;

        default:
            die("You need to select an operator!");
        
    }
}

?>
</p>
</body>
</html>


            