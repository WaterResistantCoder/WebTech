<html>

    <head>
        <link rel="stylesheet" href="style.css">
        <title>GTopic</title>
    </head>

    <body style="background: #0f1923">
    
        <div id="title">
            <a class="titlename" href="/forum_index.php">Home</a>
            
            <?php 
            $db = mysqli_connect("localhost", "root", "", "forumDB");
            

            session_start();
            

            if (array_key_exists("username", $_SESSION)) {
                echo "<span class='titleitem' style='color:blue'>Welcome " . $_SESSION["username"] . "</span>";
                
                echo '<a class="titleitem" href="logout.php">Logout</a>';
            } else {
                echo '<a class="titleitem" href="signup.php">Signup</a>';
            
                echo '<a class="titleitem" href="login.php">Login</a>';
            }
            ?>
        </div>
        
        <?php

        if (array_key_exists("topic", $_GET)) {

            $topics_query = mysqli_query($db, "SELECT topicid, name FROM topics WHERE topicid = " . $_GET["topic"]);
            
            $row = mysqli_fetch_assoc($topics_query);
            
            echo "<div id='mainbox' class='box''>" . $row["name"] . " Chats:</div>";
            
            echo "<a href='/newchat.php?topic=" . $_GET["topic"] . "'><div id='mainbox' class='box'>New Chat</div></a>";
            

            $chats_query = mysqli_query($db, "SELECT chatid, creatorid, topicid, name, username FROM chats JOIN users ON chats.creatorid = users.userid AND topicid = " . $_GET["topic"]);
        
            if (mysqli_num_rows($chats_query) > 0) {

                while($row = mysqli_fetch_assoc($chats_query)) {
                    echo "<a href='/chat.php?chat=" . $row["chatid"] . "'><div class='box'>" . $row["name"] . "<span class='right'>Creator: " . $row["username"] . "</span></div></a>";
                }
            }
            
        } else {
            echo "<div id='mainbox' class='box'>Error:</div>";
            echo "<div class='box'>Topic not found</div>";
        }
        
        ?>
        
    </body>
</html>