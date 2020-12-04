<html>

    <head>
        <link rel="stylesheet" href="style.css">
        <title>GLogout</title>
    </head>

    <body style="background: #0f1923">
    
        <div id="title">
            <a class="titlename" href="/forum_index.php">Home</a>
            
            <?php 

            session_start();
            
            echo "<a class='titleitem' href='signup.php'>Signup</a>";
            
            echo "<a class='titleitem' href='login.php'>Login</a>";
            ?>
        </div>
        
        <?php
        session_unset();
        session_destroy();
        
        echo "<div id='mainbox' class='box''>Logged out successfully</div>";
        
        echo "<a href='/'><div class='box'>Continue</div></a>";
        ?>
        
    </body>
</html>