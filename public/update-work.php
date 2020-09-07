<?php include "templates/header.php"; ?>
<?php 
    // include the config file that we created last week
    require "../config.php";
require "common.php";

   // run when submit button is clicked
    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
      
            
            } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        
                //grab elements from form and set as varaible
    $work =[
      "id"         => $_POST['id'],
      "dishname" => $_POST['dishname'],
      "cookingtime"  => $_POST['cookingtime'],
      "dietaries"   => $_POST['dietaries'],
      "ingridients"   => $_POST['ingridients'],
      "preparation"   => $_POST['preparation'],
    ];

    // create SQL statement
    $sql = "UPDATE `works` 
            SET id = :id, 
                dishname = :dishname, 
                cookingtime = :cookingtime, 
                dietaries = :dietaries, 
                ingridients = :ingridients, 
                preparation = :preparation,
            WHERE id = :id";

    //prepare sql statement
    $statement = $connection->prepare($sql);

    //execute sql statement
   $statement->execute($work);
        
        echo "<p>Edit successful!</p>";
    }

    //simple if/else statement to check if the id is available
    if (isset($_GET['id'])) {
               try {
            // standard db connection
            $connection = new PDO($dsn, $username, $password, $options);
            
            // set if as variable
            $id = $_GET['id'];
            
            //select statement to get the right data
            $sql = "SELECT * FROM works WHERE id = :id";
            
            // prepare the connection
            $statement = $connection->prepare($sql);
            
            //bind the id to the PDO id
            $statement->bindValue(':id', $id);
            
            // now execute the statement
            $statement->execute();
            
            // attach the sql statement to the new work variable so we can access it in the form
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        
    } else {
        // no id, show error
        echo "No id - something went wrong";
        //exit;
    }
?>
<form method="post">
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>">

    <label for="dishname">Dish Name</label>
    <input type="text" name="dishname" id="dishname" value="<?php echo escape($work['dishname']); ?>">

    <label for="cookingtime">Cooking Time</label>
    <input type="text" name="cookingtime" id="cookingtime" value="<?php echo escape($work['cookingtime']); ?>">

    <label for="dietaries">Dietaries</label>
    <input type="text" name="dietaries" id="dietaries" value="<?php echo escape($work['dietaries']); ?>">

    <label for="ingridients">Ingridients</label>
    <input type="text" name="ingridients" id="ingridients" value="<?php echo escape($work['ingridients']); ?>">

    <label for="preparation">Preparation</label>
    <input type="text" name="preparation" id="preparation" value="<?php echo escape($work['preparation']); ?>">
    <input type="submit" name="submit" value="Save">
</form>
<?php include "templates/footer.php"; ?>
