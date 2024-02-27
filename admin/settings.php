<section  >
<h1 class="text-2xl py-2" >Settings</h1>
<hr class="py-4 border-white" >
<div class="flex gap-4 max-sm:flex-col">

    <?php include_once '../config/config.php'   ?>
    <div class="w-[33%] max-sm:w-[100%] p-5 m-2 bg-zinc-100 shadow-md rounded-lg min-h-[20vh] ">
        <h1 class="center text-md">Database Status : </h1>
        
        <div>
            
            
            
            
            <?php 
    if ($conn->query($createDB)) {
        
        echo"
        
        <div class='flex items-center gap-4 '>
        
        <h1 class='text-2xl' > Database Connected </h1> <span class='material-symbols-outlined text-green-500'>
        check_circle
        </span>
        </div>
        <p>Database Name : <span class='font-semibold my-2'> $database <span> </p>
        </div>
        
        ";
        
        
    } else{
        echo"
        
        <div class='flex items-center gap-4 '>
        
            <h1 class='text-2xl' > Database Error </h1> <span class='material-symbols-outlined text-red-500'>
            error
            </span>
            </div>
            <p>Database Name : <span class='text-semibold my-2'> $database <span> </p>
            </div>
            
            ";
            
        };
        
        
        
        ?>


</div>
<div class="w-[33%] max-sm:w-[100%] p-5 m-2 bg-zinc-100 shadow-md rounded-lg min-h-[20vh] ">
    <h1 class="center text-md">Table Status : </h1>
    
    <div>
        
        
     <?php 
    
    $tblnames = implode(', ', $tables);
    if ($conn->query($tableSQL) === TRUE) {
        // $mytablestatus= "Table $tablename created ";

        echo"
        
        <div class='flex items-center gap-4 '>
        
        <h1 class='text-2xl' > Table Created </h1> <span class='material-symbols-outlined text-green-500'>
        check_circle
        </span>
        </div>
        <p>Tables Name : <span class='font-semibold my-2'>$tblnames <span> </p>
        </div>
        
        ";
    } else {
        
        echo"
        
        <div class='flex items-center gap-4 '>
        
        <h1 class='text-2xl' > Table creating Error </h1> <span class='material-symbols-outlined text-red-500'>
        error
        </span>
        </div>
        <p>Tables Name : <span class='text-semibold my-2'> $tblnames <span> </p>
        </div>
        
        ";
    }
    
    
    ?>


</div>
<?php    $conn->close()    ?>

</div>
</section>