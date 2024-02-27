<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
<?php include '../config/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

    <h1 class="text-center py-1  font-bold text-3xl">Dashboard</h1>
    <hr class="py-1">
    <section class="h-screen flex gap-2 items-center">
        <aside class=" min-h-[100vh] w-[30vw] dark:bg-zinc-800 p-7 ">
        <img class="text-center m-auto" src="../img/logo.png" alt="">
        <p class="text-center -mt-5 text-white">shopping never Ends...</p>
        <hr class="py-2">
        <div class="navgrp list-none text-white text-lg flex flex-col gap-6">
            <li id="add_circle" name="additem" class="flex items-center text-lg bg-blue-600 rounded-xl"  onclick="changeColor(this)" > <span class="material-icons px-1">
                    add_circle
                </span>
                <a href='dashboard.php?action=insert'>

                    Add Items 
                </a>
            </li>
            <li id="manage_accounts" name="manageitems" class="flex items-center text-lg" onclick="changeColor(this)"> <span class="material-icons px-1">
                    manage_accounts
                </span> <a href='dashboard.php?action=manage'>Manage Items</a>
                  
            </li>
            <li id="storefront" name="totalSell" class="flex items-center text-lg" onclick="changeColor(this)"> <span class="material-icons px-1">
                    storefront
                </span>
                 Total Sell 
            </li>
            <li id="trending_up" name="expences" class="flex items-center text-lg" onclick="changeColor(this)"> <span class="material-icons px-1">
                    trending_up
                </span>
                <a href="">

                    Expences 
                </a>
            </li>
            <li id="GrossProfit" name="grossProfit" class="flex items-center text-lg" onclick="changeColor(this)"> <span class="material-icons px-1">
monitor
</span>
                 Gross Profit 
            </li>
            <li id="add_advt" name="addCircle" class="flex items-center text-lg" onclick="changeColor(this)"> <span class="material-icons px-1">
                    add_circle
                </span>
                 Add Advertisement 
            </li>
            <li id="settings" name="settings" class="flex items-center text-lg" onclick="changeColor(this)"> <span class="material-icons px-1">
                    settings
                </span>
                <a href="dashboard.php?action=settings">Settings </a>
                 
            </li>


        </div>

        </aside>
        <div class="min-h-[100vh] w-[70vw] bg-slate-200 p-7 ">
        <?php

        
$defaultAction = 'insert';

// Check the 'action' parameter in the URL
$action = isset($_GET['action']) ? $_GET['action'] : $defaultAction;

// Include the corresponding page based on the 'action' parameter
if ($action === 'insert') {
    include('insert.php');
} elseif ($action === 'manage') {
    include('manage.php');
}
 elseif ($action === 'settings') {
    include('settings.php');
}


else {
    echo "Invalid action";
}
            
            ?>


        </div>

    </section>
    <script>

// let DashboardNav=document.querySelectorAll('.navgrp li')
// DashboardNav.forEach((e)=>{
//     e.classList.add('rounded-xl','cursor-pointer')
    

// })




// function changeColor(clickedElement) {
//     // Remove the 'clicked' class from all navigation links
//     const allLinks = document.querySelectorAll('.navgrp li');
//     allLinks.forEach(link => link.classList.remove('bg-blue-600'));

//     // Add the 'clicked' class to the currently clicked link
//     clickedElement.classList.add('bg-blue-600');
//   }
  

    </script>

</body>

</html>