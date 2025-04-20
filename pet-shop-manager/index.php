<?php
session_start();

class Pets
{
    public $name;
    public $age;
    public $type;

    public function __construct($type, $name, $age)
    {
        $this->type = $type;
        $this->name = $name;
        $this->age = $age;
    }

    public function greetings()
    {
        return "Hi, I am $this->name from $this->type family and  my age is $this->age years";
    }

    public function actions()
    {
        if ($this->type == 'Dog') {
            return "Bow bow...";
        } elseif ($this->type == 'Cat') {
            return "Meow, meow";
        } elseif ($this->type == 'Bird') {
            return "Cukoo cukoo";
        }
    }
}


// Initialize the session array if its not set
if (!isset($_SESSION['pets'])) {
    $_SESSION['pets'] = [];
}

//Clear the array
if (isset($_POST['clear'])) {
    $_SESSION['pets'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectType = $_POST['types'] ?? '';
    $inputName = $_POST['name'] ?? '';
    $inputAge = $_POST['age'] ?? '';

    if ($selectType && $inputName && $inputAge !== ' ') {
        $myPet = new Pets($selectType, $inputName, $inputAge);
        $_SESSION['pets'][] = $myPet;  // Adding $mypet into $_SESSION['pets'] array

        //Redirect to the same page to avoid resubmitted the same data when we refresh page
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

?>

<html>

<head>
    <title>Pet Shop Manager</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <div class='container'>

        <form method='POST'>
            <h1>PET SHOP MANAGER</h1>
            <div class='input-wrapper'>
                <label>Pet Type: </label>
                <select name='types'>
                    <option value='select'>Select</option>
                    <option value='Dog'>Dog</option>
                    <option value='Cat'>Cat</option>
                    <option value='Bird'>Birds</option>
                </select> <br><br>
            </div>
            <div class='input-wrapper'>
                <label>Name: </label>
                <input type='text' name='name' /><br><br>
            </div>
            <div class='input-wrapper'>
                <label>Age: </label>
                <input type='number' name='age' /><br><br>
            </div>

            <div class='buttons'>
                <button type='submit'>SAVE</button>
                <button type='submit' name='clear'>CLEAR</button>

            </div>


            <div class='result'>

                <?php if (!empty($_SESSION['pets'])) :  ?>
                    <h2>Saved Pets</h2>
                    <table>
                        <tr>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Greeting</th>
                            <th>Action</th>
                        </tr>

                        <!-- To display all the data from the array -->
                        <?php foreach ($_SESSION['pets'] as $pet): ?>

                            <tr>
                                <td><?= $pet->type ?> </td>
                                <td><?= $pet->name ?> </td>
                                <td><?= $pet->age ?> </td>
                                <td><?= $pet->greetings() ?> </td>
                                <td><?= $pet->actions() ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </table>

                    <?php if (empty($_SESSION['pets'])) :  ?>
                        <h2>No pets available</h2>
                    <?php endif; ?>
            </div>

        </form>
    </div>
</body>

</html>