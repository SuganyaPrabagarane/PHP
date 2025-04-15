<html>

<head>
    <title>Calculator</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <div class='container'>

        <form action='' method='POST'>
            <label>First Number</label><br>
            <input type='number' name='number1' /><br><br>
            <label>Second Number </label>
            <input type='number' name='number2' /><br><br>
            <label>Choose Operations: </label>
            <select name='operation'>
                <option value='add'>Addition</option>
                <option value='sub'>Subtraction</option>
                <option value='mul'>Multiplication</option>
                <option value='divide'>Division</option>
            </select> <br><br>
            <div class='calc-button'>
                <button type='submit'>Calculate</button>
            </div>

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $number1 = $_POST['number1'];
                $number2 = $_POST['number2'];
                $operation = $_POST['operation'];

                switch ($operation) {
                    case 'add':
                        $result = $number1 + $number2;
                        break;
                    case 'sub':
                        $result = $number1 - $number2;
                        break;
                    case 'mul':
                        $result = $number1 * $number2;
                        break;
                    case 'divide':
                        $result = $number2 != 0 ? $number1 / $number2 : 'Can not divide by zero';
                        break;
                    default:
                        $result = 'Invalid operation';
                        break;
                }
            }

            if (isset($result)) { ?>

                <div class='result'>

                    <p> <?= is_numeric($result) ? "Result: " . number_format($result, 2) : "Error: $result" ?> </p>

                <?php } ?>
                </div>

        </form>
    </div>
</body>

</html>