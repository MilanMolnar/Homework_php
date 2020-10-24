<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Exercise 2</title>
</head>
<body>

<h1 id="title" >Falatozz.hu Homework</h1>
<div id="form">
    <?php
    if (isset($_POST['submit'])) {

        //collect form data
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        //check phone number is valid
        if(!filter_var($phone, FILTER_SANITIZE_NUMBER_INT))
        {
            $error[] = 'Invalid Phone number!';
        }

        //check for a valid email address
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = 'Please enter a valid email address';
        }

        //if no errors carry on
        if (!isset($error)) {
            echo "<p style='color:#5ae23e'>Data saved !</p>";
            $csvFile = "users.csv";
            $fileOpen = fopen($csvFile, 'a') or die("Cant open file");
            $stringData = $phone . ','. $email .  "\n";
            fwrite($fileOpen, $stringData);
        }
    }
    //if their are errors display them
    if (isset($error)) {
        foreach ($error as $err) {
            echo "<p style='color:#ff0000'>$err</p>";
        }
    }
    ?>

    <form action='' method='post'>
        <p><label>Phone</label><br>
            <input type='text' name='phone' placeholder="E.g.: +303003030" value=''></p>
        <p><label>Email</label><br>
            <input type='text' name='email' placeholder="E.g.: example@email.com" value=''></p>
        <p><input type='submit' name='submit' value='Submit'></p>
    </form>
</div>

</body>
</html>
