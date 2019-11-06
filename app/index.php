<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <script type="text/javascript" src="js/dist/main.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <form method="POST">
    <?php
    require('../vendor/autoload.php');
    use BreadAndIfit\DbConnector;
    use BreadAndIfit\Ingredients\DisplayIngredients;
    use BreadAndIfit\Ingredients\Ingredient;
    use BreadAndIfit\Ingredients\IngredientHydrator;
    use BreadAndIfit\Ingredients\IngredientValidator;

    $db = DbConnector::getDatabase();

    $ingredients = IngredientHydrator::getIngredients($db);

    $accordion = DisplayIngredients::displayIngredients($ingredients);

    $validator = IngredientValidator::checkUserInput();

    echo $validator;

    echo $accordion;

    ?>
        <input type="submit" value="Submit">
    </form>

</head>
<body>

</body>
</html>