<?php 

// LOGİN SAYFASI

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "<script> alert('wrong username or password!')</script>";
			// echo "";
		}else
		{
			// echo "wrong username or password!";
			echo "<script> alert('wrong username or password!')</script>";

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
    <style>
        .form h2::before {
            left: 0;
            width: 70px !important;
            height: 4px;
            content: "";
            bottom: -10px;
            background: #fff;
            position: absolute;
        }

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
    </style>
    <title>Log in</title>
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
                    <h2>Log in Form <br>
                        <!--*********************** DataBase ************************ -->
                        <?php
                            // $SQL = "mysql:host=localhost;dbname=signuptb;charset=UTF8";
                            // $pdo = new PDO($SQL, "root", "");
                            // try{
                            //     $pdo = new PDO($SQL, "root","");
                            // }
                            // catch(PDOException $e){
                            //     die("PDO veritabanına ulaşamadı.");
                            // }

                            // PDO nun çalışıp çalışmadığına bakma.
                            // echo '<pre>';
                            //     print_r(PDO::getAvailableDrivers());
                            // echo '<pre>';
                        ?>
                        <!--*********************** DataBase ************************ -->
                    </h2>
                    <form method="post">

                        <div class="input__box">
                            <input type="text" name="user_name" placeholder="Username" required />
                        </div>
                        <div class="input__box">
                            <input type="password" name="password" placeholder="Password" required />
                        </div>
                        <div class="input__box">
                            <input type="submit" name="login" value="login" />
                        </div>
                        <p class="forget">
							
                            Forgot Password? <a href="#"><del>Click Here</del></a>
                        </p>
                        <p class="forget">
                            Don't have an account? <a href="signup.php">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>




<!-- <!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html> -->
