<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];

    $sql = "INSERT into confesstable (name, message) values ('$name', '$message')";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/styles.css">
    <title>Rant</title>
</head>

<body class="primary-dark">

    <h1 class="header-title">CURSE</h1>
    <div class="container">
        <form class="px-4 my-32" method="POST">
            <div class="form-div">
                <input type="text" id="name" placeholder="To:" name="name">
                <br />
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" name="message"></textarea>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>


    <div class="confess-div">
        <?php
        $sql = "Select * from confesstable";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $message = $row['message'];
            echo '
    <div class="confess-div">
    <div class="confess">
        <h1>' . $name . '</h1>
        <div class="message">
            <p>"'.$message.'"</p>
        </div>
    </div>
    </div>
        ';
        }
        ?>
    </div>

</body>

</html>