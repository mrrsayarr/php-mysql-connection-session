<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			// DATABASE'E KAYDETME
			$user_id = random_num(20);
			$query = "INSERT INTO users(user_id, user_name, password) VALUES ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			// echo "<script> alert('Sign Up succesfully')</script>"; // VERİTABANINA KAYDETSE BURASI SAYFADA ÇIKAR !!

			// header("Location: login.php");
			// die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../assets/img/gallery.jpg" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Sign up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            overflow: hidden;
        }

        .btn {
            background-color: DodgerBlue;
            /* Blue background */
            border: none;
            /* Remove borders */
            color: white;
            /* White text */
            padding: 12px 16px;
            /* Some padding */
            font-size: 16px;
            /* Set a font size */
            cursor: pointer;
            /* Mouse pointer on hover */
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
        }

        section {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to bottom, #f7f7fe, #dff1ff);
        }

        section .colour {
            position: absolute;
            filter: blur(150px);
        }

        section .colour:nth-child(1) {
            top: -350px;
            width: 600px;
            height: 600px;
            background: #bf4ad4;
        }

        section .colour:nth-child(2) {
            left: 100px;
            width: 500px;
            height: 500px;
            bottom: -150px;
            background: #ffa500;
        }

        section .colour:nth-child(3) {
            right: 100px;
            bottom: 50px;
            width: 300px;
            height: 300px;
            background: #2b67f3;
        }

        .box {
            position: relative;
        }

        .box .square {
            position: absolute;
            border-radius: 10px;
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.1);
            animation-delay: calc(-1s * var(--i));
            animation: animate 10s linear infinite;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes animate {

            0%,
            100% {
                transform: translateY(-40px);
            }

            50% {
                transform: translateY(40px);
            }
        }

        .box .square:nth-child(1) {
            top: -50px;
            left: -60px;
            width: 100px;
            height: 100px;
        }

        .box .square:nth-child(2) {
            z-index: 2;
            top: 150px;
            left: -100px;
            width: 120px;
            height: 120px;
        }

        .box .square:nth-child(3) {
            z-index: 2;
            width: 80px;
            height: 80px;
            right: -50px;
            bottom: -60px;
        }

        .box .square:nth-child(4) {
            left: 100px;
            width: 50px;
            height: 50px;
            bottom: -80px;
        }

        .box .square:nth-child(5) {
            top: -80px;
            left: 140px;
            width: 60px;
            height: 60px;
        }

        .container {
            width: 400px;
            display: flex;
            min-height: 400px;
            position: relative;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form {
            width: 100%;
            height: 100%;
            padding: 40px;
            position: relative;
        }

        .form h2 {
            color: #fff;
            font-size: 24px;
            font-weight: 600;
            position: relative;
            letter-spacing: 1px;
            margin-bottom: 40px;
        }

        .form h2::before {
            left: 0;
            width: 95px;
            height: 4px;
            content: "";
            bottom: -10px;
            background: #fff;
            position: absolute;
        }

        .form .input__box {
            width: 100%;
            margin-top: 20px;
        }

        .form .input__box input {
            width: 100%;
            color: rgba(16, 16, 16, 0.597);
            border: none;
            outline: none;
            font-size: 16px;
            padding: 10px 20px;
            letter-spacing: 1px;
            border-radius: 35px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form::placeholder {
            color: #fff;
        }

        .form .input__box input[type="submit"] {
            color: #666;
            cursor: pointer;
            background: #fff;
            max-width: 100px;
            font-weight: 600;
            margin-bottom: 20px;

        }

        .forget {
            color: rgb(64, 57, 57);
            margin-top: 5px;
        }

        .forget a {
            color: rgb(64, 57, 57);
            font-weight: 600;
            text-decoration: none;
        }

        /* @media screen and (max-width: 630px) {
    .section {
        display: flex;
        min-height: 100vh;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom, #000000, #000000);
    }
} */
    .pass-alert{
        margin-top: 3px;
    }
    </style>
</head>

<body>
    <section>
        <div class="colour"></div>
        <div class="colour"></div>
        <div class="colour"></div>
        <div class="box">
            <div class="square" style="--i: 0"></div>
            <div class="square" style="--i: 1"></div>
            <div class="square" style="--i: 2"></div>
            <div class="square" style="--i: 3"></div>
            <div class="square" style="--i: 4"></div>
            <div class="container">
                <div class="form">
                    <h2>Sign Up Form</h2>
                    <form method="POST">     
                        <!-- username -->
                        <div class="input__box">
                            <input type="text" name="username" placeholder="Username" required />
                        </div>
                        <!-- mail -->
                        <div class="input__box">
                            <input type="email" name="user_name" id="email" placeholder="Mail" required />
                        </div>
                        <div class="pass">
                            <!-- password -->
                            <div class="input__box">
                                <input id="pass" name="password" type="password" placeholder="Password" minlength="4" maxlength="21" required />
                            </div>
                            <!-- confirm password -->
                            <div class="input__box">
                                <input id="confirm_pass" name="confirm_password" type="password" placeholder="Confirm Password" required minlength="4" maxlength="21" onkeyup="validate_password()">
                            </div>
                        </div>
                        <span id="wrong_pass_alert" class="pass-alert"></span>

                        <div class="input__box">
							<a href="login.php"><input id="create" type="submit" value="Sign Up" /></a>
                            <!-- <input id="create" type="submit" value="Sign Up" /> -->
                        </div>
                        <p class="forget">
                            You have an account? <a href="login.php">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function validate_password() {

            var pass = document.getElementById('pass').value;
            var confirm_pass = document.getElementById('confirm_pass').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML = '     Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '     Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }

        function wrong_pass_alert() {
            if (document.getElementById('pass').value != "" &&
                document.getElementById('confirm_pass').value != "") {
                alert("Your response is submitted");
            } else {
                alert("Please fill all the fields");
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>






<!-- <!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html> -->
