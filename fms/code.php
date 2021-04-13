<?php

include('dbconfig.php');

// login
if (isset($_POST['loginbtn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' ";
    $query_run = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_array($query_run);

    $username = $data['name'];
    $hash = $data['password'];

    if ($data['usertype'] == 'Admin') {
        if ($data) {
            // function to verify the hashed password and user-entered password
            if (password_verify($password_login, $hash)) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $email_login;
                $_SESSION['display'] = $username;
                $_SESSION['role'] = $data['usertype'];
                header('Location: index.php');
            } else {
                $_SESSION['status'] = "Email/Password is Invalid";
                header('Location: login.php');
            }
        } else {
            $_SESSION['status'] = "Not found";
            header('Location: login.php');
        }
    } else if ($data['usertype'] == 'User') {
        // function to verify the hashed password and user-entered password
        if (password_verify($password_login, $hash)) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $email_login;
            $_SESSION['display'] = $username;
            $_SESSION['role'] = $data['usertype'];
            header('Location: index.php');
        } else {
            $_SESSION['status'] = "Email/Password is Invalid";
            header('Location: login.php');
        }
    } else {
        $_SESSION['status'] = "Email OR password is INVALID";
        header('Location: login.php');
    }
}


// save faculty
if (isset($_POST['save_faculty'])) {

    $name = $_POST['faculty_name'];
    $designation = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
    $images = $_FILES["faculty_image"]['name'];

    if (file_exists("upload/" . $_FILES["faculty_image"]["name"])) {
        $store = $_FILES['faculty_image']["name"];
        $_SESSION['status'] = "Image already exist. '. $store.'";
        header('Location: faculty.php');
    } else {

        $query = "INSERT INTO faculty(name, designation, description, images) VALUES('$name', '$designation', '$description', '$images')";
        $query_run = mysqli_query($mysqli, $query);

        if ($query_run) {
            move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . $_FILES["faculty_image"]["name"]);
            $_SESSION['success'] = "Faculty Added";
            header('Location: faculty.php');
        } else {
            $_SESSION['status'] = "Faculty Not Added";
            header('Location: faculty.php');
        }
    }
}


// check email valid / exist 
if (isset($_POST['check_submit_btn'])) {
    $email = $_POST['email_id'];
    $emailquery = "SELECT * FROM register WHERE email='$email'";
    $emailquery_run = mysqli_query($mysqli, $emailquery);

    $response = null;

    if (mysqli_num_rows($emailquery_run) > 0) {
        $response = "<span style='color: red;'>Email already taken, please try another email.</span>";
    } else {
        $response = "<span style='color: green;'>Available.</span>";
    }
    echo $response;
}

// signup
if (isset($_POST['registerbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['user_id'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // to encrpyt the password stored in database

    if ($password === $cpassword) {
        $sql = "INSERT INTO register(name, email, user_ID, password, usertype) VALUES ('$name','$email','$id', '$hashed_password', '$usertype')";
        $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

        if ($result) {
            echo "Saved";
            $_SESSION['success'] = "Admin profile added";
            header('Location: signup.php');
        } else {
            $_SESSION['status'] = "Admin profile not added";
            header('Location: signup.php');
        }
    } else {
        $_SESSION['status'] = "Password and confirm password does not match";
        header('Location: register.php');
    }
}

// update
if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $account_id = $_POST['edit_accountID'];
    $password = $_POST['edit_password'];
    $usertype = $_POST['update_usertype'];

    $hashPW = password_hash($_POST['edit_password'], PASSWORD_DEFAULT);
    $query = "UPDATE register SET name='$username', email='$email', user_ID='$account_id', password='$hashPW', usertype='$usertype' WHERE id = $id ";
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your data is updated";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your data is not updated";
        header('Location: register.php');
    }
}

// delete user data
if (isset($_POST['deletebtn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' "; // add * to test the failed msg
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "Data deleted successfully";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Failed to delete data";
        header('Location: register.php');
    }
}


// register name verification
if (isset($_POST['user_name'])) {
    $name = $_POST['user_name'];

    $checkName = "SELECT name FROM register WHERE name='$name' ";

    $query_run = mysqli_query($mysqli, $checkName);

    if (mysqli_num_rows($query_run) > 0) {
        echo "User Name Already Exist";
    } else {
        echo "OK";
    }
    exit();
}

// register email verification
if (isset($_POST['user_email'])) {
    $email = $_POST['user_email'];

    $checkEmail = "SELECT email FROM register WHERE email='$email' ";

    $query_run = mysqli_query($mysqli, $checkEmail);

    if (mysqli_num_rows($query_run) > 0) {
        echo "User Name Already Exist";
    } else {
        echo "OK";
    }
    exit();
}

// add report
if (isset($_POST['addReportBtn'])) {
    $branch = $_POST['branch'];
    $incidentType = $_POST['incidentType'];
    $reportDate = $_POST['report_date'];

    $sql = "INSERT INTO report(branch, incidentType, reportDate) VALUES ('$branch', '$incidentType', '$reportDate')";
    $sql_run = mysqli_query($mysqli, $sql);

    if ($sql_run) {
        $_SESSION['success'] = "Data added";
        header('Location: reportTest.php');
    } else {
        $_SESSION['status'] = "Not added";
        header('Location: reportTest.php');
    }
}
