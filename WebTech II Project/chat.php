<html>

    <head>
        <link rel="stylesheet" href="style.css">
        <title>GChat</title>
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
        function validate($data) {

            return htmlspecialchars(stripslashes($data));
        }
        

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $content = validate($_POST["content"]);
            

            mysqli_query($db, "INSERT INTO comments (posterid, chatid, content) VALUES ('" . $_SESSION["userid"] . "', '" . $_GET["chat"] . "', '" . $content . "')");
            
        }
        
        if (array_key_exists("chat", $_GET)) {

            $chats_query = mysqli_query($db, "SELECT chatid, name FROM chats WHERE chatid = " . $_GET["chat"]);
            
            $row_c = mysqli_fetch_assoc($chats_query);
        
            if (mysqli_num_rows($chats_query) > 0) {
            
                echo "<div id='mainbox' class='box''>" . $row_c["name"] . ":</div>";
                

                $comment_query = mysqli_query($db, "SELECT * FROM comments JOIN users ON comments.posterid = users.userid AND comments.chatid = '" . $row_c["chatid"] . "'");
                
                while($row = mysqli_fetch_assoc($comment_query)) {
                    echo "<div class='box'>" . $row["username"] . ": " . $row["content"] . "</div>";
                }
                

                if (array_key_exists("username", $_SESSION)) {
                    echo "
                        <form action='/chat.php?chat=" . $_GET["chat"] . "' method='post' id='chat'>
                            <input name='content' type='text' class='box' style='background-color:#dddddd'><br>
                        </form>
                        
                    <button type='submit' form='chat' value='Send' class='button' style='background-color:#dddddd'>Send</button>";
                }
                
            } else {
                echo "<div id='mainbox' class='box'>Error:</div>";
                echo "<div class='box'>Chat not found</div>";
            }
            
            echo "";
            
        } else {
            echo "<div id='mainbox' class='box'>Error:</div>";
            echo "<div class='box'>Chat not found</div>";
        }
        
        ?>
        
    </body>
</html>