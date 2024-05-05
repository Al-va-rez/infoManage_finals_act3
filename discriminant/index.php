<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Discriminant Value</title>
        <style>
            body {
                background-color: cornflowerblue;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            div {
                background-color: white;
                border: 5px solid;
                width: fit-content;
                padding: 50px;
                margin: auto;
                margin-top: 50px;
            }
            form {
                margin-top: 36px;
            }
            h2 {
                margin-top: 40px;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>DISCRIMINANT OF A QUADRATIC EQUATION</h1>
            <p><i>b^2 - 4ac</i></p>

            <form action="index.php" method="POST">
                <p>
                    <label for="value_a">A: </label>
                    <input type="text" id="value_a" placeholder="Value of a" name="input_a">
                </p>
                <p>
                    <label for="value_b">B: </label>
                    <input type="text" id="value_b" placeholder="Value of b" name="input_b">
                </p>
                <p>
                    <label for="value_c">C: </label>
                    <input type="text" id="value_c" placeholder="Value of c" name="input_c">
                </p>
                <p><input type="submit" value="Submit" name="submit_values"></p>
            </form>

            <?php
                // Check if the form is submitted
                if(isset($_POST['submit_values'])) {

                    // check if inputs are int
                    $valid_input1 = filter_var($_POST['input_a'], FILTER_VALIDATE_INT);
                    $valid_input2 = filter_var($_POST['input_b'], FILTER_VALIDATE_INT);
                    $valid_input3 = filter_var($_POST['input_c'], FILTER_VALIDATE_INT);

                    // Get the values
                    if ($valid_input1 && $valid_input2 && $valid_input3) {
                        $a_value = $_POST['input_a'];
                        $b_value = $_POST['input_b'];
                        $c_value = $_POST['input_c'];

                        // get b^2
                        $b2 = pow($b_value, 2);
                        // get 4ac
                        $ac4 = 4 * ($a_value * $c_value);

                        // get the final answer
                        $result = $b2 - $ac4;

                        echo '<h2>' . $b_value . '^2 - 4(' . $a_value . ')(' . $c_value. ')</h2>';
                        echo '<h2>The answer is ' . $result . '</h2>';
                    }
                    // check if a text fields remaines empty
                    else if ($_POST['input_a'] == '' || $_POST['input_b'] == '' || $_POST['input_c'] == '') {
                        echo '<h2>THERE ARE MISSING VALUES</h2>';
                    }
                    else {
                        echo '<h2>INVALID INPUT. INTEGERS ONLY</h2>';
                    }
                }
            ?>
        </div>
    </body>
</html>