<?php

include('dbconfig.php');

// login section
if (isset($_POST['loginbtn'])) {
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' ";
    $query_run = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_array($query_run);

    $username = $data['name'];
    $hash = $data['password'];

    if ($data['status'] == 'Enable') {
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
    } else {
        $_SESSION['status'] = "Your account has been disabled. Please contact Admin";
        header('Location: login.php');
    }
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
        header('Location: signup.php');
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


// swap status section
if (isset($_POST['chgBtn'])) {
    $chgID = $_POST['chg_id'];
    $userNextStatus = "";
    $retrieve = "SELECT * FROM register WHERE id='$chgID'";
    $retrieve_run = mysqli_query($mysqli, $retrieve);
    if (mysqli_num_rows($retrieve_run) > 0) {
        while ($row = mysqli_fetch_assoc($retrieve_run)) {

            if ($row['status'] == 'Enable') {
                $userNextStatus = 'Disable';
                $row['status'] == $userNextStatus;
            } else if ($row['status'] == 'Disable') {
                $userNextStatus = 'Enable';
                $row['status'] == $userNextStatus;
            }
        }
    }

    $query = "UPDATE register SET `status`='$userNextStatus' WHERE id='$chgID'";
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "Status updated";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Status updated failed";
        header('Location: register.php');
    }
}


// update profile section
if (isset($_POST['updateProfilebtn'])) {
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
        $_SESSION['display'] = $username;
        header('Location: register_edit.php');
    } else {
        $_SESSION['status'] = "Your data is not updated";
        $_SESSION['display'] = $username;
        header('Location: register_edit.php');
    }
}


// delete user data (currently removed)
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


// add report section
if (isset($_POST['addReportBtn'])) {
    $branch = $_POST['branch'];
    $incidentType = $_POST['incidentType'];
    $incidentCause = $_POST['incidentCause'];
    $reportDate = $_POST['report_date'];
    $fata = $_POST['fatality'];
    $injured = $_POST['injured'];
    $saved = $_POST['saved'];
    $lost = $_POST['assetLost'];
    $recovered = $_POST['assetRecovered'];
    $PIC = $_POST['personInCharge'];

    $sql = "INSERT INTO report(branch, incidentType, incidentCause, reportDate, victimFatality, victimInjured, victimSaved, asset_lost, asset_recover, personInCharge) VALUES ('$branch', '$incidentType', '$incidentCause', '$reportDate', '$fata', '$injured', '$saved', '$lost', '$recovered', '$PIC')";
    $sql_run = mysqli_query($mysqli, $sql);

    if ($sql_run) {
        $_SESSION['success'] = "Data added";
        header('Location: reportTest.php');
    } else {
        $_SESSION['status'] = "Not added";
        header('Location: reportTest.php');
    }
}


//edit report section
if (isset($_POST['editReportButton'])) {

    $id = $_POST['update_ReportID'];
    $new_branch = $_POST['update_branch'];
    $new_incidentType = $_POST['update_incidentType'];
    $new_incidentCause = $_POST['update_incidentCause'];
    $new_reportDate = $_POST['update_incidentDate'];
    $new_fata = $_POST['update_fatality'];
    $new_injured = $_POST['update_injury'];
    $new_saved = $_POST['update_saved'];
    $new_lost = $_POST['update_assetLost'];
    $new_recovered = $_POST['update_assetRecovered'];
    $new_personInCharge = $_POST['update_personInCharge'];

    $sql = "UPDATE report SET branch='$new_branch', incidentType='$new_incidentType', incidentCause='$new_incidentCause', reportDate='$new_reportDate', victimFatality='$new_fata', victimInjured='$new_injured', victimSaved='$new_saved', asset_lost='$new_lost', asset_recover='$new_recovered', personInCharge='$new_personInCharge' WHERE id = '$id' ";
    $sql_run = mysqli_query($mysqli, $sql);

    if ($sql_run) {
        $_SESSION['success'] = "Data updated";
        //printf("Affected rows: %d\n", $mysqli->affected_rows); //to test the update function
        header('Location: reportTable.php');
    } else {
        $_SESSION['status'] = "Not updated";
        header('Location: reportTable.php');
    }
}
