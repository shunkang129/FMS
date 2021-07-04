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
    $userID = $data['user_ID'];
    $hash = $data['password'];

    if ($data['status'] == 'Enable') {
        if ($data['usertype'] == 'Admin') {
            if ($data) {
                // function to verify the hashed password and user-entered password
                if (password_verify($password_login, $hash)) {
                    $_SESSION['login'] = true;
                    $_SESSION['username'] = $email_login;
                    $_SESSION['display'] = $username;
                    $_SESSION['userID'] = $userID;
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
                $_SESSION['userID'] = $userID;
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
    } else if ($data['status'] == 'Disable') {
        $_SESSION['status'] = "Your account has been disabled. Please contact Admin";
        header('Location: login.php');
    } else {
        $_SESSION['status'] = "Email/Password is Invalid";
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
            header('Location: login.php');
        } else {
            $_SESSION['status'] = "Admin profile not added";
            header('Location: signup.php');
        }
    } else {
        $_SESSION['status'] = "Password and confirm password does not match";
        header('Location: signup.php');
    }
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
        header('Location: user.php');
    } else {
        $_SESSION['status'] = "Status updated failed";
        header('Location: user.php');
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
        header('Location: profile.php');
    } else {
        $_SESSION['status'] = "Your data is not updated";
        $_SESSION['display'] = $username;
        header('Location: profile.php');
    }
}


// register name verification
if (isset($_POST['user_name'])) {
    $name = $_POST['user_name'];

    $checkName = "SELECT name FROM register WHERE name='$name' ";

    $query_run = mysqli_query($mysqli, $checkName);

    if (mysqli_num_rows($query_run) > 0) {
        echo "<span style='color: red;'>User Name Already Exist</span>";
    } else {
        echo  "<span style='color: green;'>Available</span>";
    }
    exit();
}


// register email verification
if (isset($_POST['user_email'])) {
    $email = $_POST['user_email'];

    $checkEmail = "SELECT email FROM register WHERE email='$email' ";

    $query_run = mysqli_query($mysqli, $checkEmail);

    if (mysqli_num_rows($query_run) > 0) {
        echo "<span style='color: red;'>User Email Already Exist</span>";
    } else {
        echo  "<span style='color: green;'>Available</span>";
    }
    exit();
}


// register ID verification
if (isset($_POST['user_registerID'])) {
    $registerID = $_POST['user_registerID'];

    $checkID = "SELECT user_id FROM register WHERE user_id='$registerID' ";

    $checkID_query_run = mysqli_query($mysqli, $checkID);

    if (mysqli_num_rows($checkID_query_run) > 0) {
        echo "<span style='color: red;'>ID had registered account</span>";
    } else {
        echo  "<span style='color: green;'>Available</span>";
    }
    exit();
}


// register password and confirm password verification
if (isset($_POST['pw'])) {
    $password = $_POST['pw'];
    $confirmpassword = $_POST['cpw'];


    if ($password != $confirmpassword) {
        echo "<span style='color: red;'>Not Match</span>";
    } else {
        echo  "<span style='color: green;'>Match</span>";
    }
    exit();
}


// add report section updated with doc upload
if (isset($_POST['addReportBtn'])) {
    $branch = $_POST['branch'];
    $incidentArea = $_POST['incidentArea'];
    $incidentCause = $_POST['incidentCause'];
    $reportDate = $_POST['report_date'];
    $fata = $_POST['fatality'];
    $injured = $_POST['injured'];
    $saved = $_POST['saved'];
    $lost = $_POST['assetLost'];
    $recovered = $_POST['assetRecovered'];
    $contactMethod = $_POST['contact'];
    $PIC = $_POST['personInCharge'];
    $reportStatus = $_POST['reportStatus'];

    // check if users upload any document
    if ($_FILES['myfile']['tmp_name']) {
        // name of the uploaded file
        $filename = $_FILES['myfile']['name'];

        // destination of the file on the server
        $destination = 'uploads/' . $filename;

        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];

        if (!in_array($extension, ['zip', 'pdf', 'docx', 'doc', 'jpeg', 'png', 'gif'])) {
            $_SESSION['status'] = "Your file extension must be .zip, .pdf, .docx, .doc, .jpeg, .png, .gif";
            header('Location: report.php');
        } else if ($_FILES['myfile']['size'] > 10000000) {
            // file shouldnt larger than 10MB
            $_SESSION['status'] = "You file is larger than 10MB";
            header('Location: report.php');
        } else {
            if (move_uploaded_file($file, $destination)) {
                $sql = "INSERT INTO report(branch, incidentArea, incidentCause, reportDate, victimFatality, victimInjured, victimSaved, asset_lost, asset_recover, contactMethod, personInCharge, reportStatus, docName, docSize) VALUES ('$branch', '$incidentArea', '$incidentCause', '$reportDate', '$fata', '$injured', '$saved', '$lost', '$recovered', '$contactMethod', '$PIC', '$reportStatus', '$filename', '$size')";
                $sql_run = mysqli_query($mysqli, $sql);

                if ($sql_run) {
                    $_SESSION['success'] = "Data added and file is uploaded";
                    header('Location: report.php');
                } else {
                    $_SESSION['status'] = "Failed to add data and upload file";
                    header('Location: report.php');
                }
            }
        }
    } else {
        $sql = "INSERT INTO report(branch, incidentArea, incidentCause, reportDate, victimFatality, victimInjured, victimSaved, asset_lost, asset_recover, contactMethod, personInCharge, reportStatus) VALUES ('$branch', '$incidentArea', '$incidentCause', '$reportDate', '$fata', '$injured', '$saved', '$lost', '$recovered', '$contactMethod', '$PIC', '$reportStatus')";
        $sql_run = mysqli_query($mysqli, $sql);

        if ($sql_run) {
            $_SESSION['success'] = "Data added with no files uploaded";
            header('Location: report.php');
        } else {
            $_SESSION['status'] = "Data Not added with no files uploaded";
            header('Location: report.php');
        }
    }
}


//edit report section
if (isset($_POST['editReportButton'])) {

    $id = $_POST['update_ReportID'];
    $new_branch = $_POST['update_branch'];
    $new_incidentArea = $_POST['update_incidentArea'];
    $new_incidentCause = $_POST['update_incidentCause'];
    $new_reportDate = $_POST['update_incidentDate'];
    $new_fata = $_POST['update_fatality'];
    $new_injured = $_POST['update_injury'];
    $new_saved = $_POST['update_saved'];
    $new_lost = $_POST['update_assetLost'];
    $new_recovered = $_POST['update_assetRecovered'];
    $new_contactMethod = $_POST['update_contact'];
    $new_personInCharge = $_POST['update_personInCharge'];
    $new_reportStatus = $_POST['update_reportStatus'];

    $sql = "UPDATE report SET branch='$new_branch', incidentArea='$new_incidentArea', incidentCause='$new_incidentCause', reportDate='$new_reportDate', victimFatality='$new_fata', victimInjured='$new_injured', victimSaved='$new_saved', asset_lost='$new_lost', asset_recover='$new_recovered', contactMethod='$new_contactMethod', personInCharge='$new_personInCharge', reportStatus='$new_reportStatus' WHERE id = '$id' ";
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


// delete report section
if (isset($_POST['deleteReportBtn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM report WHERE id='$id' "; // add * to test the failed msg
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $_SESSION['success'] = "Selected Report is deleted";
        header('Location: reportTable.php');
    } else {
        $_SESSION['status'] = "Failed to delete Report";
        header('Location: reportTable.php');
    }
}


// database backup section
if (isset($_POST['backup'])) {
    sleep(2);
    $backup_file = $_SESSION['userID'] . '_' . date("Y-M-d") . '.sql';
    $filepath = "dbBackup/$backup_file";
    $backup = exec('C:/xamppNew/mysql/bin/mysqldump --user=root --password=' . $db_password . ' --host=localhost ' . $db_name . ' > ' . $filepath . ' 2>&1');

    if (file_exists($filepath)) {

        $_SESSION['success'] = $backup_file . " Backup Success";
        header('Location: backup.php');
    } else {
        $_SESSION['status'] = "Backup of " . $db_name . " does not exist in " . $filepath;
        header('Location: backup.php');
    }
}


// database download section
if (isset($_POST['download'])) {
    $backup_file = $_SESSION['userID'] . '_' . date("Y-M-d") . '.sql';
    $filepath = "dbBackup/$backup_file";
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '.sql"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        $_SESSION['status'] = $backup_file . " File does not exist!";
        header('Location: backup.php');
    }
}
