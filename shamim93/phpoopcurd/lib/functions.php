<?php
include 'db.php';

function get_all_user_list()
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM user";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $all_user_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $all_user_info;
}

function get_user_from_search($search_query)
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM user WHERE id LIKE '%{$search_query}%' OR name LIKE  '%{$search_query}%' OR email LIKE  '%{$search_query}%'";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $searched_user_info = $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $searched_user_info;
}


function get_single_user_info($id)
{
    $pdo = Database::connect();
    $sql = "SELECT * FROM user where id = {$id} ";

    try {

        $query = $pdo->prepare($sql);
        $query->execute();
        $user_info = $query->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {

        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    Database::disconnect();
    return $user_info;
}




function update_user_info($id,$name,$email)
{
    $pdo = Database::connect();
    $sql = "UPDATE user SET name = '{$name}', email = '{$email}' where id = '{$id}'";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        
        if($result)
        {
            $status['message'] = "Data updated";
        }
        else{
            $status['message'] = "Data is not updated";
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage(); 
    }

    Database::disconnect();
    return $status;
}


function add_user_info($name,$email)
{
    $pdo = Database::connect();
    $sql = "INSERT INTO user(`name`,`email`) VALUES('{$name}', '{$email}')";
    $status = [];

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        if($result)
        {
            $status['message'] = "Data inserted";
        }
        else{
            $status['message'] = "Data is not inserted";
        }

    } catch (PDOException $e) {

        $status['message'] = $e->getMessage(); 
    }

    Database::disconnect();
    return $status;
}

function delete_user_info($id)
{
    $pdo = Database::connect();
    $sql ="DELETE FROM user where id = '{$id}'";

    try {

        $query = $pdo->prepare($sql);
        $result = $query->execute();
        
        if($result)
            $status = true;
        else
            $status = false;

    } catch (PDOException $e) {

        die($e->getMessage()); 
    }

    Database::disconnect();
    return $status;
}