<html>

<head>
    <title>Measurement Conversion</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class='container'>

        <form action='' method='POST'>
            <div class='input-wrapper'>
                <label>Temperature</label>
                <input type='number' name='temperature' placeholder="Temperature" />
                <select name='convert_temp'>
                    <option value='select'>Select</option>
                    <option value='fahrenheit'>Celcius to fahrenheit</option>
                    <option value='kelvin'>Celcius to Kelvin</option>
                </select>
            </div> <br>
            <div class='input-wrapper'>
                <label>Speed</label>
                <input type='number' name='speed' placeholder="Speed" />
                <select name='convert_speed'>
                    <option value='select'>Select</option>
                    <option value='meter'>Kilometer to Meter</option>
                    <option value='knots'>Kilometer to Knots</option>
                </select>
            </div><br>
            <div class='input-wrapper'>
                <label>Mass</label>
                <input type='number' name='mass' placeholder="Mass" />
                <select name='convert_mass'>
                    <option value='select' name='select'>Select</option>
                    <option value='gram' name='gram'>Kilogram to Gram</option>
                    <option value='kilogram' name='kilogram'>Gram to Kilogram</option>
                </select>
            </div>
            <br><br>
            <div class='conversionBtn'>
                <button type='submit'>CONVERT</button>
            </div>

            <?php



            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $temperature = $_POST['temperature'];
                $speed =  $_POST['speed'];
                $mass =  $_POST['mass'];

                $convertTemp = $_POST['convert_temp'];
                $convertSpeed = $_POST['convert_speed'];
                $convertMass = $_POST['convert_mass'];

                if ($convertTemp == 'fahrenheit') {
                    $result = number_format($temperature * 1.8 + 32, 2) . ' ' . 'F';
                    $result = "Converting a temperature of $temperature degrees Celsius to Fahrenheit is: $result";
                } elseif ($convertTemp == 'kelvin') {
                    $result = number_format($temperature + 273.15, 2) . ' ' . 'Kelvin';
                    $result = "Converting a temperature of $temperature degrees Celsius to Kelvin is: $result";;
                }

                if ($convertSpeed == 'meter') {
                    $result = number_format($speed * 0.2777777778, 2) . ' ' . 'm/s';
                    $result = "Converting speed $speed km/h to meters per second is: $result ";
                } elseif ($convertSpeed == 'knots') {
                    $result = number_format($speed * 0.5399568035, 2) . 'knots';;
                    $result = "Converting speed $speed km/h to knots is: $result ";
                }

                if ($convertMass == 'gram') {
                    $result = number_format($mass * 1000, 2)  . ' ' . 'g';
                    $result = "Converting $mass kilogram to gram is: $result";
                } elseif ($convertMass == 'kilogram') {
                    $result = number_format($mass / 1000, 2) . 'Kg';
                    $result = "Converting $mass gram to kilogram is: $result";
                }
            }

            ?>

            <div class='result'>
                <p> <?= $result ?> </p>
            </div>
        </form>
    </div>
</body>

</html>