<?php
include '../connection.php';
$qry = $con->query('SELECT * FROM students');
$res = $qry->fetch_all(MYSQLI_ASSOC);


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
    <nav class="flex justify-between my-5 px-3 py-4 shadow-md">
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
    <div class="flex justify-between">
        <h1 class="text-gray-700">welcome to student management system</h1>
        <button><a href="create.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> add a new student</a></button>
    </div>
    <div class="mt-14">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <tr class="text-lg text-gray-700 uppercas">
                <td>#id</td>
                <td>firstname</td>
                <td>last_name</td>
                <td>email</td>
                <td>telephone</td>
                <td>options</td>

            </tr>
            <?php
            foreach ($res as $key => $data) {
                
            ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['first_name'] ?></td>
                        <td><?= $data['last_name'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td>0<?= $data['phone_number'] ?></td>
                        <td><a href="update.php?id=<?= $data['id'] ?>">update</a>|<a href="delete.php?id=<?= $data['id'] ?>">delete</a></td>
                        <td></td>
                    </tr>
                <?php }
            ?>
        </table>
    </div>

</body>

</html>