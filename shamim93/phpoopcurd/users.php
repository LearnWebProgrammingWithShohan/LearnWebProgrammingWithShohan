<?php
 include('lib/functions.php');
 if(isset($_GET['s']))
 {
   $search_query = $_GET['s'] ;
   $users = get_user_from_search($search_query);
 }
 else
 {
   $users = get_all_user_list();
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display All users</title>
    <base href="http://localhost/phpoopcurd/">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="container-fluid">
<?php include('inc/header.php'); ?>
    <section class="row">
    <div class="col-md-12">

      <?php
        if(isset($search_query))
          if(!empty($users))
            echo "<h2>Showing search results for {$search_query} </h2>";
          else
            echo "<h2>No matching results found for {$search_query} </h2>";
        else
          echo "<h2>All Users</h2>";
      ?>
 
    <table class="table table-responsive table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php

    foreach($users as $user)
        {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td><a href='update/{$user['id']}'><i class='fas fa-pen'></i></a> <a class='red' title='Delete' href='delete/{$user['id']}'><i class='fas fa-times-circle'></i></a> </td>";
            echo "</tr>";
        }
    ?>
    </tbody>
    </table>
    </div>
    </section>
    <footer>
    
    </footer>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>