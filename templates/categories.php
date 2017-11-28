<!-- Categories Page Content -->
<div class="container">
    <h1 class="mt-4 mb-3">Categories</h1>

    <!-- mwilliams:  breadcrumb navigation -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Categories</li>            
    </ol>
    <!-- end breadcrumb -->


<?php
   //1. get the configuration file (holds the connection info)
            require './includes/config.php';
            
            //2.connect to the database
            require MYSQL;
            //var_dump($dbc);
            
            
            //3.get the total number of records in categories table
            $sql='select count(*) from categories';
            $stmt= $dbc->query($sql);//execute the query
            //get first column,first row from query
            $cnt= $stmt->fetchColumn();//get one column result
           
            
            //4.  Execute the query
            echo "<h2>Total Categories: $cnt</h2>";
            
            //5. Build the SQL Query to retreive all categories
            $q="SELECT id,category FROM categories ORDER BY 1";
            
            //6. execute the query
            $stmt = $dbc->query($q);
            $category_list = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            //var_dump($category_list);
            //start the list
            echo "<ul>";
            //7.Loop the array and display in ul list
            foreach($category_list as $row){
                echo "<li>".$row['id']." - " .$row['category']."</li>";
                
            }
            
            //end the list
            echo "</ul>";


?>

    </div>