<header class="flex justify-between px-10 py-4 items-center font-semibold" >
<div class="logo text-2xl font-semibold flex items-center"> <img class="w-[70px]" src="./img/logo.png" alt=""> </div>
<nav class="flex items-center max-sm:hidden">
<a class="px-3" href="index.php">Home</a>
<a class="px-3" href="">Terms & Service</a>
<a class="px-3" href="">Refund Policy </a>
<a class="px-3" href="">offers%</a>
<a href="" class="flex items-center" > <span class="material-icons px-3">
add_shopping_cart
</span> </a>
 <a href="login.php" class="flex items-center text-blue-600 " >  <?php
$img_display='admin/users/Uploads/profiles/'.'';


 if (isset($_SESSION['username'])) {

     echo 'Hello,'.$_SESSION['username'];

    }

     ?> 
     <span class="material-icons px-3"> 
     <div class=' bg-zinc-500 profile_img h-[30px] w-[30px] object-cover rounded-full overflow-hidden '> 
            <img src="admin/users/Uploads/profiles/<?php echo$_SESSION['profile_img'] ?>" alt="" class="h-[100%] w-[100%] rounded-full  object-cover ">
          </div>
    
 
 

</span></a>


</nav>

<span class="material-symbols-outlined hidden max-sm:block relative z-[666] " id="menu" >
menu
</span>



</header>
<div class="  flex w-[80vw] text-xl items-center justify-center h-screen hidden h-[100vh]  top-0 right-0 bg-zinc-200/70  backdrop-blur-sm	 fixed z-20" id="hemberger">
<nav class="flex flex-col font-semibold  gap-4 j items-center  ">
<a class="px-3" href="index.php">Home</a>
<a class="px-3" href="">Terms & Service</a>
<a class="px-3" href="">Refund Policy </a>
<a class="px-3" href="">offers%</a>
<a href="" class="flex items-center" > <span class="material-icons px-3">
add_shopping_cart
</span> </a>
 <a href="login.php" class="flex items-center text-blue-600 " >  <?php
 if (isset($_SESSION['username'])) {

     echo 'Hello,'.$_SESSION['username'];

    }

     ?> 
     <span class="material-icons px-3"> 
    
 
 
account_circle
</span></a>


</nav>
</div>
<hr>
<script>
let menu=document.querySelector('#menu');
let hemberger=document.querySelector('#hemberger');


menu.addEventListener('click',()=>{
    hemberger.classList.toggle('hidden');
    

    if (hemberger.classList.contains('hidden')) {
        console.log('HIDDEN');
        menu.textContent='menu'
    }
    else{
        menu.textContent='close'
        console.log('HIDDEN DONT HAVE');



    }

})

</script>