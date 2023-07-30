<?php
    $number = $_POST['number'];
    $temp = $_POST['temperature'];
    $resultMessage = '';
    
// Check if the form is submitted
if (isset($_POST["submit_f"]) || isset($_POST["submit_c"])) {
    // Check the number and unit have been inputted
    if (isset($number) && isset($temp)) {
        // Check if user has inputted a C temp to convert to F and pressed the right button
        if ($temp == "celcius" && isset($_POST["submit_f"])) {
            $result = $number * 9 / 5 + 32;
            $resultMessage = "Result: " . $result . "F";
        } else if ($temp == "celcius" && isset($_POST["submit_c"])) {
            $resultMessage = "You cannot convert celcius to celcius!";
            // Check if user has inputted an F temp to convert to C and pressed the right button
        } else if ($temp == "farenheit" && isset($_POST["submit_c"])) {
            $result = ($number - 32) * 5 / 9;
            $resultMessage = "Result: " . $result . "C";
        } else if ($temp == "farenheit" && isset($_POST["submit_f"])) {
            $resultMessage = "You cannot convert farenheit to farenheit!";
        } else {
            $resultMessage = "There was an error, please try again";
        }
    } else {
        $resultMessage = "Please enter a number and select a temperature unit.";
    }
}

    // Table of conversions
    $celciusArray = ['10', '20', '30', '40', '50', '60', '70', '80', '90', '100'];
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>LCG Temperature Conversion</title>
</head>

<body>
    <div class="container py-2">
        <div class="row justify-content-center flex-row pb-4">
            <div class="col-12">
                <h1>Convert a temperature below</h1>
            </div>
            <form class="col-12 w-100" action="temperature.php" method="post">
                <div class="form-group">
                    <label for="number">Enter a number to convert</label>
                    <input type="number" name="number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="temperature">Select a unit</label>
                    <select class="form-control" name="temperature" id="temperature">
                        <option value="null" selected="selected">Select a temperature unit</option>
                        <option value="celcius">Celcius</option>
                        <option value="farenheit">Farenheit</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="submit_f">Convert to F</button>
                    <button class="btn btn-secondary" type="submit" name="submit_c">Convert to C</button>
                </div>
                <div class="form-group">
                    <h3 class="font-weight-bold"><?php echo $resultMessage; ?></h3>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Here are some examples...</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>C</th>
                            <th>F</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    foreach($celciusArray as $c) {
                      $f = $c * 9 / 5 + 32;
                    ?>
                        <tr>
                            <td><?php echo $c; ?></td>
                            <td><?php echo $f; ?></td>
                        </tr>
                        <?php
            }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</body>

</html>