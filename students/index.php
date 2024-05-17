<?php
include '../connection.php';
$qry=$con->query('SELECT * FROM students');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="mx-44">
    <nav class="flex justify-between mt-5 shadow-md">
        <div class="text-blue-600 text-2xl">
            WMHS MS
        </div>
        <div class="">
            <ul class="flex space-x-10 items-center h-full">
                <li> <a href="index.php"> home</a></li>
                <li> <a href="create.php"> add A student</a></li>
                <li> <a href="retrieve.php"> all students</a></li>
            </ul>
        </div>
    </nav>
    <div class="uppercase text-blue-600 text-center mt-5">

      welcome to world mission high school management system

    </div>
    <div class="text-center text-gray-600">
        <p>so far we have <?php
            echo $qry->num_rows;
        ?> student(s) in the database</p>
    </div>

</body>

</html>