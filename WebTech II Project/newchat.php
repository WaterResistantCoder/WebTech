<html>

    <head>
        <link rel="stylesheet" href="style.css">
        <title>GNew Chat</title>
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
        
        <?php
        function validate($data) {

            return htmlspecialchars(stripslashes($data));
        }
        

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = validate($_POST["name"]);
            

            $name_query = mysqli_query($db, "SELECT chatid, topicid, name FROM chats WHERE name = '" . $name . "' AND topicid = '" . $_GET["topic"] . "'");
            
            if (mysqli_num_rows($name_query) > 0) {
                echo "<div class='box'>Name already in use</div>";
                
            } else {

                mysqli_query($db, "INSERT INTO chats (creatorid, topicid, name) VALUES (\"" . $_SESSION["userid"] . "\", \"" . $_GET["topic"] . "\", \"" . $name . "\")");
                
                mysqli_close($db);

                header("Location: /topic.php?topic=" . $_GET["topic"]);
                exit();
            }
            
        }
        

        if (array_key_exists("username", $_SESSION)) {

            $topics_query = mysqli_query($db, "SELECT topicid, name FROM topics WHERE topicid = " . $_GET["topic"]);
            
            $row = mysqli_fetch_assoc($topics_query);
            
            echo "<div id='mainbox' class='box'>" . $row["name"] . " new chat:</div>";

            echo "<div class='box'>
                <form action='/newchat.php?topic=" . $_GET["topic"] . "' method='post' id='newchat'>
                    Name:<br>
                    <input name='name' type='text'><br>
                </form>
            </div>
                
            <button type='submit' form='newchat' value='Confirm' class='button'>Confirm</button>";
            
        } else {
            echo "<div id='mainbox' class='box'>Error:</div>";
            echo "<div class='box'>Not logged in</div>";
        }
        
        mysqli_close($db);
        ?>
        
    </body>
</html>