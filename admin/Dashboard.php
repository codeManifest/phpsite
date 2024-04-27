

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

</head>

<body class="">
    <?php include '../config/config.php';
   
$img_display='users/Uploads/profiles/'.$_SESSION['profile_img'].'';


    ?>
  <div class="flex items-center max-sm:flex-col Max-sm:gap-2 max-sm:w-full justify-between px-10 py-3 " >
  <div class="flex items-center gap-3 #add_circle">

  <a href="http://localhost/shogoup/phpsite/ "><span class="material-symbols-outlined text-3xl text-blue-600 hover:text-blue-800 transition">
            home
        </span> </a>
      <h1 class="text-center py-1  font-semibold text-3xl  ">ADMIN DASHBOARD</h1>
  </div>
      <div class="flex items-center gap-4" >

          <p class="text-black text-center">Hello, <span class="font-semibold italic" ><?php echo $_SESSION['username'] ?> </span> </p>
          <div class='profile_img h-[50px] w-[50px] object-cover rounded-full overflow-hidden '> 
            <img onclick="menuPOP()" src="<?php echo $img_display ?>" alt="" class=" cursor-pointer relative h-[100%] w-[100%] rounded-full  object-cover ">
          </div>
          <div id="PopupMenu" class=" shadow-lg hidden  py-[2vh] px-[7vw] absolute top-20 right-5 bg-zinc-100 text white ">
            
          <a href="logout.php" class="py-2 flex items-center text-black gap-3 #add_circle px-4   " >

            Logout
            <span class="material-symbols-outlined text-3xl text-blue-600 hover:text-blue-800 transition">
            logout
        </span>
        </a>
          </div>
          
        </div>
    </div>
    <section class="h-screen flex gap-2 items-center max-sm:flex-col">
        <aside class=" min-h-[100vh] w-[30vw] dark:bg-zinc-800 p-7 max-sm:w-full">
            <img class="text-center m-auto" src="../img/logo.png" alt="">
            <p class="text-center -mt-5 text-white">shopping never Ends...</p>
            <hr class="py-2">
            <div class="navgrp list-none text-white text-lg flex flex-col gap-6">
                <li id="add_circle" name="additem" class="flex items-center text-lg "> <span class="material-icons px-1">
                        add_circle
                    </span>
                    <a href='dashboard.php?action=insert'>

                        Add Items
                    </a>
                </li>
                <li id="category" name="additem" class="flex items-center text-lg "> <span class="material-icons px-1">
                        add_circle
                    </span>
                    <a href='dashboard.php?action=category'>

                        Manage Category
                    </a>
                </li>
                <li id="users" name="users" class="flex items-center text-lg "> <span class="material-icons px-1">
                        group
                    </span>
                    <a href='dashboard.php?action=users'>

                        Users
                    </a>
                </li>
                <li id="manage_accounts" name="manageitems" class="flex items-center text-lg"> <span class="material-icons px-1">
                        manage_accounts
                    </span> <a href='dashboard.php?action=manage'>Manage Items</a>

                </li>
                <li id="storefront" name="totalSell" class="flex items-center text-lg"> <span class="material-icons px-1">
                        storefront
                    </span>
                    Total Sell
                </li>
                <li id="trending_up" name="expences" class="flex items-center text-lg"> <span class="material-icons px-1">
                        trending_up
                    </span>
                    <a href="">

                        Expences
                    </a>
                </li>
                <li id="GrossProfit" name="grossProfit" class="flex items-center text-lg"> <span class="material-icons px-1">
                        monitor
                    </span>
                    Gross Profit
                </li>
                <li id="add_advt" name="addCircle" class="flex items-center text-lg"> <span class="material-icons px-1">
                        add_circle
                    </span>
                    Add Advertisement
                </li>
                <li id="settings" name="settings" class="flex items-center text-lg"> <span class="material-icons px-1">
                        settings
                    </span>
                    <a href="dashboard.php?action=settings">Settings </a>

                </li>


            </div>

        </aside>
        <div class="min-h-[100vh] w-[70vw] bg-slate-200 p-7 max-sm:w-full  overflow-y-scroll	">
            <?php


            $defaultAction = 'insert';

            // Check the 'action' parameter in the URL
            $action = isset($_GET['action']) ? $_GET['action'] : $defaultAction;

            // Include the corresponding page based on the 'action' parameter
            if ($action === 'insert') {
                include('insert.php');
            } elseif ($action === 'manage') {
                include('manage.php');
            } elseif ($action === 'settings') {
                include('settings.php');
            
            } elseif ($action === 'category') {
                include('Manage_category.php');
            
            } 
            
            elseif ($action === 'users') {
                include('users/user_manage.php');
            } else {
                echo "Invalid action";
            }

            ?>


        </div>

    </section>
    <script>
        let addClasses = ['rounded-xl', 'cursor-pointer', 'bg-blue-600']
        document.addEventListener('DOMContentLoaded', () => {
            let url = 'http://localhost/shogoup/phpsite/admin/dashboard.php?action=';

            var currentUrl = window.location.href;
            console.log(currentUrl);

            if (currentUrl === url + 'insert') {
                document.querySelector('#add_circle').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')


            } else if (currentUrl === url + 'manage') {
                console.log('manage');


                document.querySelector('#manage_accounts').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')


            } else if (currentUrl === url + 'total_sell') {


                document.querySelector('#manage_accounts').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')


            } else if (currentUrl === url + 'expences') {


                document.querySelector('#manage_accounts').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')


            } else if (currentUrl === url + 'category') {
                document.querySelector('#category').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')


            } else if(currentUrl === url + 'users'){
                document.querySelector('#users').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')



            }
            else if(currentUrl === url + 'manage'){
                document.querySelector('#manage_accounts').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')



            }
            else if(currentUrl === url + 'settings'){
                document.querySelector('#settings').classList.add('rounded-xl', 'cursor-pointer', 'bg-blue-600')



            }
            
        })
function menuPOP() {
    let PopupMenu =document.querySelector('#PopupMenu')
    PopupMenu.classList.toggle("hidden")

    
}
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