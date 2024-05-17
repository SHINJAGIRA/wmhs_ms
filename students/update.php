<?php
include '../connection.php';
$id = $_GET['id'];
$qry = $con->query('SELECT * FROM students WHERE id=' . $id);
$res = $qry->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $t = time();
        $created_at = date("Y-m-d", $t);

        $qry = $con->query("UPDATE students SET first_name='$first' ,last_name='$last',email='$email',phone_number='$phone' WHERE id=".$id);
        if ($qry) {
            echo 'updated successfully';
            header('Location:retrieve.php');
            exit();
        }
    }
}
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
    <div class="">
        <?php
        foreach ($res as $row)
        ?>
        <div class="">
            <form class="max-w-sm mx-auto" method="post">
                <div class="mb-5">
                    <label for="first" class="block mb-2 text-sm font-medium text-gray-900 ">student's firstname</label>
                    <input type="text" value=<?= $row['first_name'] ?> name="first" id="first" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="firstname" required />
                </div>
                <div class="mb-5">
                    <label for="last" class="block mb-2 text-sm font-medium text-gray-900 ">student's lastname</label>
                    <input type="text" id="last" value=<?= $row['last_name'] ?> name="last" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="lastname" required />
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">student's email</label>
                    <input type="email" id="email" value=<?= $row['email'] ?> name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="email" required />
                </div>
                <div class="mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">student's phone</label>
                    <input type="tel"  id="phone" value=<?=$row['phone_number'] ?> name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5    " placeholder="phone" required />
                </div>
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>

    </div>

</body>

</html>