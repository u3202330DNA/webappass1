<?php 

// this code will only execute after the submit button is clicked
if (isset($_POST['submit'])) {
	
    // include the config file that we created before
    require "../config.php"; 
    
    // this is called a try/catch statement 
	try {
        // FIRST: Connect to the database
        $connection = new PDO($dsn, $username, $password, $options);
		
        // SECOND: Get the contents of the form and store it in an array
        $new_work = array( 
            "dishname" => $_POST['dishname'], 
            "cookingtime" => $_POST['cookingtime'],
            "dietaries" => $_POST['dietaries'],
            "ingridients" => $_POST['ingridients'],
             "preparation" =>$_POST['preparation'], 
        );
        
        // THIRD: Turn the array into a SQL statement
        $sql = "INSERT INTO works (dishname, cookingtime, dietaries, ingridients, preparation) VALUES (:dishname, :cookingtime, :dietaries, :ingridients, :preparation)";        
        
        // FOURTH: Now write the SQL to the database
        $statement = $connection->prepare($sql);
        $statement->execute($new_work);

	} catch(PDOException $error) {
        // if there is an error, tell us what it is
		echo $sql. "<br>" . $error->getMessage();
	}	
}
?>
<?php include "templates/header.php"; ?>
<h2>Add a work</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Work successfully added.</p>
<?php } ?>
<!--form to collect data for each artwork-->

<form method="post">
    <label for="dishname">Dish Name</label>
    <input type="text" name="dishname" id="dishname">
    <label for="cookingtime">Cooking Time</label>
    <input type="text" name="cookingtime" id="cookingtime">
    <label for="dietaries">Dietaries</label>
    <input type="text" name="dietaries" id="dietaries">
    <label for="ingridients">Ingridients</label>
    <input type="text" name="ingridients" id="ingridients">
    <label for="preparation">Preparation</label>
    <input type="text" name="preparation" id="preparation">
    <input type="submit" name="submit" value="Submit">
</form>

<?php include "templates/footer.php"; ?>
