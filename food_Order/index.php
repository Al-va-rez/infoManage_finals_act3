<?php
$menu = [
    'Fishball' => 30,
    'Kikiam' => 40,
    'Corndog' => 50
];
?>

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
            <h1>Welcome to the canteen!</h1>
            <h2>Today's menu is:</h2>
            <ul>
                <li><?php echo 'Fishball' . ' - PHP ' . $menu['Fishball']; ?></li>
                <li><?php echo 'Kikiam' . ' - PHP ' . $menu['Kikiam']; ?></li>
                <li><?php echo 'Corndog' . ' - PHP ' . $menu['Corndog']; ?></li>
            </ul>

            <form action="index.php" method="POST">
                <!-- Food -->
                <p>
                    <label for="customer_order">Choose your order: </label>
                    <select name="food_order" id="customer_order">
                        <option value="Fishball">Fishball</option>
                        <option value="Kikiam">Kikiam</option>
                        <option value="Corndog">Corndog</option>
                    </select>
                </p>

                <!-- Quantity -->
                <p>
                    <label for="num_of_order">Quantity: </label>
                    <input type="text" id="num_of_order" placeholder="How many?" name="food_quantity">
                </p>

                <!-- Cash -->
                <p>
                    <label for="customer_cash">Cash: </label>
                    <input type="text" id="customer_cash" name="payment">
                </p>

                <p><input type="submit" value="Submit" name="submit_order"></p>
            </form>

            <?php
                // Check if the form is submitted
                if(isset($_POST['submit_order'])) {

                    // check if inputs are int and are not negative numbers
                    $valid_input1 = filter_var($_POST['food_quantity'], FILTER_VALIDATE_INT) && $_POST['food_quantity'] > 0;
                    $valid_input2 = filter_var($_POST['payment'], FILTER_VALIDATE_INT) && $_POST['food_quantity'] > 0;

                    // Get the values
                    if ($valid_input1 && $valid_input2) {
                        $user_Food_Order = $_POST['food_order'];
                        $user_Order_Quantity = $_POST['food_quantity'];
                        $user_Payment = $_POST['payment'];

                        $subtotal = $menu[$user_Food_Order] * $user_Order_Quantity;

                        echo '<h2>You ordered: ' . $user_Food_Order . '</h2>';
                        echo '<h2>Quantity: ' . $user_Order_Quantity . '</h2>';
                        echo '<h2>Total price is: ' . $subtotal . '</h2>';
                        echo '<h2>Your payment is: ' . $user_Payment . '</h2>';

                        // check if amount paid is correct
                        if ($user_Payment >= $subtotal) {
                            echo '<h2>Thank you! Enjoy your meal!</h2>';
                        } else {
                            echo '<h2><u>Not enough cash</u></h2>';
                        }
                    }
                    // check if a text fields remaines empty
                    else if ($_POST['food_quantity'] == '' || $_POST['payment'] == '') {
                        echo '<h2>THERE ARE MISSING INFORMATION</h2>';
                    }
                    else {
                        echo '<h2>INVALID INPUT. POSITIVE INTEGERS ONLY</h2>';
                    }
                }
            ?>
        </div>
    </body>
</html>