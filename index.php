<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="icon" href="assets/icon/icon.png">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="assets/font/css/all.css">
</head>

<body>


    <section class="container">
        <div class="max-width">
            <h2 class="title">Expense Tracker</h2>
            <div class="flex">

                <div class="bx-1">
                    <h1>history</h1>
                    <?php

                    include "connection/config.php";

                    $sql = "SELECT * FROM tracker";
                    $query = mysqli_query($con, $sql);
                    $result = mysqli_num_rows($query);
                    $totalIncome = 0;
                    $totalExpense = 0;
                    if ($result > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $id = $row['ID'];
                            $text = $row['Text'];
                            $amount = $row['Amount'];
                    ?>

                            <div class="flex-1">
                                <div><?php echo $text ?></div>
                                <div><?php echo $amount;
                                        $totalIncome += $amount;
                                        $totalExpense -= $amount; ?></div>
                                <a href="controller/controller.php?id=<?php echo $id; ?>"><i class="fas fa-times-circle"></i></a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<h3 style='text-align:center; padding:10px 0px;'>Not Found</h3>";
                    }
                    ?>

                </div>



                <div class="bx-2">
                    <h3>Your Balance</h3>
                    <h2>₹<?php echo $totalIncome . ".00"; ?></h2>
                    <div class="flex-1">
                        <div>
                            <?php if (@$amount < 0) {
                            ?>
                                <h1>Expense</h1>
                                <p style="color: crimson;">₹<?php echo $totalIncome . ".00"; ?></p>
                            <?php
                            } else {
                            ?>
                                <h1>income</h1>
                                <p>₹<?php echo $totalIncome . ".00"; ?></p>

                            <?php } ?>
                        </div>

                    </div>



                    <div>
                        <div class="form_title">add new transaction</div>
                        <form action="controller/controller.php" method="POST">


                            <div class="label">Text</div>
                            <input type="text" class="input" name="text" placeholder="Enter text..." required>


                            <div class="label">Amount</div>
                            <input type="number" class="input" name="amount" placeholder="Enter amount..." required><br>

                            <button type="submit" class="saveBtn" name="submit">add transaction</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




</body>

</html>