<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="pizza.css">

</head>
<body>
<?php
    $pizzaTypes = array(
        array("Margherita", 14.50),
        array("Pepperoni", 12.50),
        array("BBQ Chicken", 13.50)
    );
?>
    <div id="main">
        <h1>Order Confirmation</h1>
        <table id="container">
            <tr>
                <td>Number of pizzas: </td>
                <td>
                    <?php
                        $numPizza = $_POST["numPizza"];
                        echo $numPizza;
                        $subtotal = 0;
                    ?>
                </td>
            </tr>
            <tr>
                <td>Pizza Type Selected: </td>
                <td>
                    <?php
                        $selected_radio = $_POST['pizzaType'];
                        echo $selected_radio;
                        foreach($pizzaTypes as $pizza) {
                            if ($selected_radio == $pizza[0]) {
                                $subtotal += $pizza[1];
                                echo " - $" . number_format($pizza[1], 2, '.', ',');;
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Toppings selected: </td>
                <td>
                    <?php
                        if (isset($_POST['toppings'])) {
                            $toppings = $_POST['toppings'];
                            $subtotal += (3 * count($toppings));
                            foreach($toppings as $item) {
                                echo "<li style='list-style-type: none'>" . $item . " - $3.00 " . "</li>" ;
                            }
                        } else {
                            echo "No toppings were selected";
                        }
                    ?>
                </td>    
            </tr>
            <tr>
                <td>Subtotal: </td>
                <td><?php 
                    $subtotal = $subtotal * $numPizza;
                    echo "$" . number_format($subtotal, 2, '.', ','); ?></td>
            </tr>
            <tr>
                <td>Tax (15%): </td>
                <td><?php 
                    $tax = $subtotal * 0.15;
                    
                    echo "$" . number_format($tax, 2, '.', ','); ?></td>
            </tr>
            <tr>
                <td>Tip (20%): </td>
                <td><?php 
                    $tip = $subtotal * 0.20;
                    echo "$" . number_format($tip, 2, '.', ','); ?></td>
            </tr>
            <tr>
                <td>Total: </td>
                <td><?php 
                    $total = $subtotal + $tax + $tip;
                    echo "$" . number_format($total, 2, '.', ','); ?></td>
            </tr>

        </table>
    </div>
</body>
</html>



