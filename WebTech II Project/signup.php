<html>

    <head>
        <link rel="stylesheet" href="style.css">
        <title>GSignup</title>
    </head>

    <body  style="background: #0f1923">
    
        <div id="title">
            <a class="titlename" href="/forum_index.php">Home</a>
            
            <?php 
            $db = mysqli_connect("localhost", "root", "", "forumDB");
            

            session_start();
            

            if (array_key_exists("username", $_SESSION)) {
                echo "<span class='titleitem' style='color:blue'>Welcome " . $_SESSION["username"] . "</span>";
                
                echo "<a class='titleitem' href='logout.php'>Logout</a>";
            } else {
                echo "<a class='titleitem' href='signup.php'>Signup</a>";
            
                echo "<a class='titleitem' href='login.php'>Login</a>";
            }
            ?>
        </div>
        
        <div id='mainbox' class='box''>Signup:</div>
        
        <?php 
        function validate($data) {

            return htmlspecialchars(stripslashes($data));
        }
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = validate($_POST["email"]);
            $username = validate($_POST["username"]);
            $password = validate($_POST["password"]);
            

            $email_query = mysqli_query($db, "SELECT userid, email, username FROM users WHERE email = \"" . $email . "\"");
            
            if (mysqli_num_rows($email_query) > 0) {
                echo "<div class='box'>Email already in use</div>";
                mysqli_close($db);
                
            } else {

                mysqli_query($db, "INSERT INTO users (email, username, password) VALUES (\"" . $email . "\", \"" . $username . "\", \"" . $password . "\")");
                
                session_start();
                $_SESSION["username"] = $username;
                

                $email_query = mysqli_query($db, "SELECT userid FROM users WHERE email = \"" . $email . "\"");
                $row = mysqli_fetch_assoc($email_query);
                $_SESSION["userid"] = $row["userid"];
                
                mysqli_close($db);

                header("Location: /");
                exit();
            }
            
        }
        ?>
        
        <div class="box">
            <form action="" method="post" id="signup">
                Email:<br>
                <input name="email" type="text"><br>
                Username:<br>
                <input name="username" type="text"><br>
                Password:<br>
                <input name="password" type="text"><br>
            </form>
        </div>
            
        <button type="submit" form="signup" value="Signup" class="button">Signup</button>
        
    </body>
</html>