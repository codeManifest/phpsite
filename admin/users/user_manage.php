
<?php
// session_start()
?>

<section>
    


    
    <?php
     
    
    
    
    if (isset($_POST['additems'])) {
        header('location:dashboard.php?action=users');
        # code...
    } ?>

    <a href="http://localhost/shogoup/phpsite/admin/users/user_insert.php" class="py-2  px-3 bg-blue-500 text-white rounded-lg m-2" name="additem" >
        Add User +
    </a>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                      User Role  
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>


<?php  


 $new_table=


$sql=" SELECT * FROM users ";
$result_list = $conn->query($sql);
if ($result_list->num_rows > 0) {
    while ($row = $result_list->fetch_assoc()) {

        echo"

        
<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
    <td class='w-4 p-4'>
        <div class='flex items-center'>
            <input id='checkbox-table-search-1' type='checkbox' class='w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600'>
            <label for='checkbox-table-search-1' class='sr-only'>checkbox</label>
        </div>
    </td>
    <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
        $row[Id] 
    </th>
    <td class='px-6 py-4'>
     $row[_name]
    </td>
    <td class='px-6 py-4'>
      $row[Username] 
    </td>
    <td class='px-6 py-4'>
    $row[email]
        
    </td>
    <td class='px-6 py-4'>
     $row[_Role] 
    </td>
    
    <td class='flex items-center px-6 py-4'>
        <a href=users/user_edit.php?Id=".$row['Id']." name=edit class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
        <a href=users/user_delete.php?Id=".$row['Id']." class='font-medium text-red-600 dark:text-red-500 hover:underline ms-3'>Remove</a>
    </td>
</tr>
";




       
        # code...
    }
    # code...
} else{
    echo "No Product Found";
    
}


?>




            
            
            
            
            
            
            
        </tbody>
    </table>
</div>



<?php $conn->close() ?>
</section>