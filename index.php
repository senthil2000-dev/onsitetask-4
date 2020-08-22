<?php
require_once("includes/header.php");
?>
<body>
    <div class="tools">
        <button onclick="window.location.href='add.php'">ADD STUDENT</button>
        <button onclick="window.location.href='table.php'">VIEW TABLE</button>
    </div>
    <div class="wrapPage index">
        <div class='mainContainer'>
            <div class="trademark">
                <img src="assets/images/logo.png" title="My logo" alt="Site Logo">
            </div>

            <div class="searchDrum">
                <form action="profile.php" method="GET">
                    <div class="autocomplete">
                        <input class="searchInput" type="text" name="phrase" autocomplete="off">
                    </div>
                    <input class="searchBtn" type="submit" value="Search">
                    
                </form>
            </div>   
        </div>
    </div>
<script src="assets/js/autocomplete.js"></script>
</body>
</html>