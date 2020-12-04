<html>

    <head>
        <link rel="stylesheet" href="style.css">
        <title>Gaming Queries</title>
    </head>

    <body style="background: #0f1923">
    
        <div id="title">
            <a class="titlename" href="/forum_index.php">Gamers, bring up your queries!</a>
            
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
        
        <div id='mainbox' class='box'>Topics:</div>
    
        <?php

        $topics_query = mysqli_query($db, "SELECT topicid, name FROM topics");
        

        if (mysqli_num_rows($topics_query) > 0) {
            while($row = mysqli_fetch_assoc($topics_query)) {
                echo "<a href='/topic.php?topic=" . $row["topicid"] . "'><div class='box'>". $row["name"] . "</div></a>";
            }
        }
        mysqli_close($db);
        ?>
        
    </body>
</html>