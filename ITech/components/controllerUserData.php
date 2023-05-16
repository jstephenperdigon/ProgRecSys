<?php
session_start();
require "connection.php";
$email = "";
$lastName = "";
$firstName = "";
$middleInitial = "";
$phone = "";
$role = "";
$errors = array();


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            $user_type = $fetch['role'];
            if ($status == 'verified' && $user_type == 'Admin') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                if (isset($_POST['remember_me'])) {
                    setcookie('email', $_POST['email'], time() + (60 * 60 * 24));
                    setcookie('password', $_POST['password'], time() + (60 * 60 * 24));
                } else {
                    setcookie('email', '', time() - (60 * 60 * 24));
                    setcookie('password', '', time() - (60 * 60 * 24));
                }
                header('location: adminpanel/index.php');
            } else if ($status == 'verified' && $user_type == 'Student') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                if (isset($_POST['remember_me'])) {
                    setcookie('email', $_POST['email'], time() + (60 * 60 * 24));
                    setcookie('password', $_POST['password'], time() + (60 * 60 * 24));
                } else {
                    setcookie('email', '', time() - (60 * 60 * 24));
                    setcookie('password', '', time() - (60 * 60 * 24));
                }
                header('location: components/home.php');
            } else {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: components/user-otp.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

//if user signup button
if (isset($_POST['signup'])) {
    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    $email = mysqli_real_escape_string($con, $_POST['regemail']);
    $phone = mysqli_real_escape_string($con, $_POST['phoneNumber']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['regemail'] = " Email address is already in use.";
    }

    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code1 = rand(1, 9);
        $code2 = rand(1, 9);
        $code3 = rand(1, 9);
        $code4 = rand(1, 9);
        $code5 = rand(1, 9);
        $code6 = rand(1, 9);
        $status = "notverified";
        $role = "Student";
        $insert_data = "INSERT INTO usertable (lastName, firstName , middleInitial , email , phoneNumber, password, code , code1 , code2 , code3 , code4 , code5 , status, role)
                        values('$lastName','$firstName','$middleInitial', '$email','$phone', '$encpass', '$code1','$code2','$code3','$code4','$code5','$code6', '$status','$role')";
        $data_check = mysqli_query($con, $insert_data);
        if ($data_check) {
            //headers
            $subject = "Your One-Time Password (OTP) Code";
            $sender = "From: UCC.ITECH <ucc.itech@gmail.com>\r\n";
            $sender .= "MIME-Version: 1.0\r\n";
            $sender .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = "<html>
                <body><p> Hi, <b>$firstName<b/>.</p><br><br>
                    
                    <p>We recently received a request to sign in to your Gmail account from a new device or location.
                    To ensure the security of your account, we have sent a One-Time Password (OTP) code to your registered phone number or email address</p><br><br>
                    
                    Please enter the following OTP code to verify your identity and sign in to your Gmail account:<br><br>

                    <h1> $code1$code2$code3$code4$code5$code6 </h1> <br>

                    If you did not make this request or are unsure about the authenticity of this message, please immediately change your account password and enable two-factor authentication.
                    If you need further assistance, please contact our support team.<br>

                    Thank you for helping us keep your Gmail account secure.<br>

                    Welcome to Program Recommendation System! 
                    <br>
                    Best regards,
                    ITech
                </body>
            </html>
            ";


            if (mail($email, $subject, $message, $sender)) {
                $info = "Thank you for registering to our website!
                        A code has been sent to: $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}




//if user click verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code1 = mysqli_real_escape_string($con, $_POST['otp1']);
    $otp_code2 = mysqli_real_escape_string($con, $_POST['otp2']);
    $otp_code3 = mysqli_real_escape_string($con, $_POST['otp3']);
    $otp_code4 = mysqli_real_escape_string($con, $_POST['otp4']);
    $otp_code5 = mysqli_real_escape_string($con, $_POST['otp5']);
    $otp_code6 = mysqli_real_escape_string($con, $_POST['otp6']);
    $check_code = "SELECT * FROM usertable WHERE code = '$otp_code1' AND code1 = '$otp_code2' AND code1 = '$otp_code2' AND code2 = '$otp_code3'
        AND code3 = '$otp_code4' AND code4 = '$otp_code5' AND code5 = '$otp_code6' ";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code1 = $fetch_data['code'];
        $fetch_code2 = $fetch_data['code1'];
        $fetch_code3 = $fetch_data['code2'];
        $fetch_code4 = $fetch_data['code3'];
        $fetch_code5 = $fetch_data['code4'];
        $fetch_code6 = $fetch_data['code5'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE usertable SET code = $code, code1 = $code, code2= $code, code3 = $code, code4 = $code, code5 = $code, status = '$status' 
            WHERE code = $fetch_code1 AND code1 = $fetch_code2 AND code2 = $fetch_code3 AND code3 = $fetch_code4 AND code4 = $fetch_code5 AND code5 = $fetch_code6";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['firstName'] = $firstName;
            $_SESSION['email'] = $email;
            header('location: home.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM usertable WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code1 = rand(1, 9);
        $code2 = rand(1, 9);
        $code3 = rand(1, 9);
        $code4 = rand(1, 9);
        $code5 = rand(1, 9);
        $code6 = rand(1, 9);
        $insert_code = "UPDATE usertable SET code = $code1, code1 = $code2, code2= $code3, code3 = $code4, code4 = $code5, code5 = $code6 WHERE email = '$email'";
        $run_query = mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "
                Hi $firstName
                Forgot your password?
                We received a request to reset the password for your account. 
                
                To reset your password, enter this OTP.
                Your password reset code is 
                
                 $code1$code2$code3$code4$code5$code6 
                 
                If you did not make this request then please ignore this email.

                Best regards,
                ITech";
            $sender = "From: ucc.itech@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "A code has been sent to:  $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: components/reset-code.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
}

//if user click check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $email_fetch = "SELECT * FROM usertable WHERE email = '$email'";
    $otp_code1 = mysqli_real_escape_string($con, $_POST['otp1']);
    $otp_code2 = mysqli_real_escape_string($con, $_POST['otp2']);
    $otp_code3 = mysqli_real_escape_string($con, $_POST['otp3']);
    $otp_code4 = mysqli_real_escape_string($con, $_POST['otp4']);
    $otp_code5 = mysqli_real_escape_string($con, $_POST['otp5']);
    $otp_code6 = mysqli_real_escape_string($con, $_POST['otp6']);
    $check_code = "SELECT * FROM usertable WHERE code = '$otp_code1' AND code1 = '$otp_code2' AND code1 = '$otp_code2' AND code2 = '$otp_code3'
        AND code3 = '$otp_code4' AND code4 = '$otp_code5' AND code5 = '$otp_code6'";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);

        //If user does not process to changing password this will change the OTP into value of zero
        $fetch_code1 = $fetch_data['code'];
        $fetch_code2 = $fetch_data['code1'];
        $fetch_code3 = $fetch_data['code2'];
        $fetch_code4 = $fetch_data['code3'];
        $fetch_code5 = $fetch_data['code4'];
        $fetch_code6 = $fetch_data['code5'];
        $email = $fetch_data['email'];
        $code = 0;

        $update_otp = "UPDATE usertable SET code = $code, code1 = $code, code2= $code, code3 = $code, code4 = $code, code5 = $code 
            WHERE code = $fetch_code1 AND code1 = $fetch_code2 AND code2 = $fetch_code3 AND code3 = $fetch_code4 AND code4 = $fetch_code5 AND code5 = $fetch_code6";
        $update_res = mysqli_query($con, $update_otp);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//if user click change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password1']);
    $cpassword = mysqli_real_escape_string($con, $_POST['password2']);
    if ($password !== $cpassword) {
        $errors['password1'] = "Confirm password not matched!";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE usertable SET code = $code, code1 = $code, code2= $code, code3 = $code, code4 = $code, code5 = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}


//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: ../index.php');
}
?>