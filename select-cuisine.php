<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User selects the cuisine</title>
</head>
<body>
<h1>Select your cuisine</h1>
<form method="post" action="foods.php">
    <fieldset>
        <label for="cuisineId">Choose Cuisine</label>
        <select name="cuisineId" id="cuisineId">
            <?php
            // connect to database
            $db = new PDO('mysql:host=172.31.22.43;dbname=Adam882094', 'Adam882094', '842ojmV_vQ');
            // write the querys
            $sql = "SELECT cuisineId, name FROM cuisines";
            // grab query and items from it
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $cuisines = $cmd->fetchAll();
            // loop each item in database
            foreach ($cuisines as $c) {
                echo '<option value="' . $c['cuisineId'] . '">' . $c['name'] . '</option>';
            }
            $db = null;
            ?>
        </select>
    </fieldset>
    <button>Get Foods</button>
</form>
</body>
</html>