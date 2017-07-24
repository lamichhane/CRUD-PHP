<?php
include("db.php");
if (!empty($_POST)) {
    $allUser = [];
    $actionName = strip_tags(filter_input(INPUT_POST, 'action'));
    switch ($actionName) {
        case 'addUser':
            $stmt = $mysqli->prepare("INSERT INTO UserRego (firstname, lastname, email,gender,age) VALUES (?, ?, ?, ?, ?)");
            if ($stmt === FALSE) {
                die("Mysql Error: " . $mysqli->error);
            }
            $stmt->bind_param("ssssi", $firstName, $lastName, $email, $gender, $age);
            $firstName = strip_tags(filter_input(INPUT_POST, 'firstName'));
            $lastName = strip_tags(filter_input(INPUT_POST, 'lastName'));
            $email = strip_tags(filter_input(INPUT_POST, 'email'));
            $gender = strip_tags(filter_input(INPUT_POST, 'gender'));
            $age = strip_tags(filter_input(INPUT_POST, 'age'));
            $stmt->execute();
            break;
        case 'listUser':
            $allUser = getUser($mysqli);
            echo json_encode($allUser);
            break;
        
        case 'editUser':
            $stmt = $mysqli->prepare("SELECT * FROM UserRego WHERE id=?");
            if ($stmt === FALSE) {
                die("Mysql Error: " . $mysqli->error);
            }
            $stmt->bind_param("i", $id);
            $id = strip_tags(filter_input(INPUT_POST, 'editID'));
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_row()) {
                    $resultArray['firstname'] = $row[1];
                    $resultArray['lastname'] = $row[2];
                    $resultArray['email'] = $row[3];
                    $resultArray['age'] = $row[5];
                    $resultArray['gender'] = $row[4];
                    $resultArray['id'] = $row[0];
                }
            }
            echo json_encode($resultArray);
            break;   
            
            case 'updateUser':
            $stmt = $mysqli->prepare("UPDATE UserRego  set firstname=?,lastname=?,email=?,gender=?,age=? WHERE id=?");
            if ($stmt === FALSE) {
                die("Mysql Error: " . $mysqli->error);
            }
            $stmt->bind_param('sssssi', $firstName, $lastName, $email,$gender,$age,$id);
            $firstName = strip_tags(filter_input(INPUT_POST, 'firstName'));
            $lastName = strip_tags(filter_input(INPUT_POST, 'lastName'));
            $email = strip_tags(filter_input(INPUT_POST, 'email'));
            $gender = strip_tags(filter_input(INPUT_POST, 'gender'));
            $age = strip_tags(filter_input(INPUT_POST, 'age'));
            $id = strip_tags(filter_input(INPUT_POST, 'updateId'));
            $stmt->execute();
            echo json_encode(getUser($mysqli));
            break;  
            
            case 'deleteUser':
            $stmt = $mysqli->prepare("DELETE FROM UserRego   WHERE id=?");
            if ($stmt === FALSE) {
                die("Mysql Error: " . $mysqli->error);
            }
            $stmt->bind_param('i', $id);
            $id = strip_tags(filter_input(INPUT_POST, 'deleteId'));
            $stmt->execute();
            echo json_encode(getUser($mysqli));
            break; 
    }
}

function getUser($mysqli) {

    $finalResult = [];
    $stmt = $mysqli->prepare("SELECT * FROM UserRego");
    if ($stmt === FALSE) {
        die("Mysql Error: " . $mysqli->error);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_row()) {
            $resultArray['firstname'] = $row[1];
            $resultArray['lastname'] = $row[2];
            $resultArray['email'] = $row[3];
            $resultArray['age'] = $row[5];
            $resultArray['gender'] = $row[4];
            $resultArray['id'] = $row[0];
            array_push($finalResult, $resultArray);
        }
    }
    return $finalResult;
}
