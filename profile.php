<?php
require_once("includes/header.php");
require_once("includes/classes/ResultProvider.php");
include("includes/config.php");
    if(isset($_GET["phrase"]))
        $phrase=$_GET["phrase"];
    else
        exit("You must enter a search term");
?>

<body>
    <div class="wrapPage">
            <div class="rubricContent">
                <div class="trademark">
                    <a href="index.php">
                        <img src="assets/images/logo.png">    
                    </a>
                </div>

                <div class="searchDrum">
                    <form method="GET">
                        <div class="searchBarContainer">
                            <div class="autocomplete">
                                <input class="searchInput" type="text" name="phrase" autocomplete="off" value="<?php echo $phrase; ?>">
                            </div>
                            <button class="searchBtn">
                                <img src="assets/images/search.png" alt="search button">
                            </button>
                        </div>
                    </form>
                </div>   
            </div>
        <div class="resultsSection">
            <?php
            $resultProvider=new ResultProvider($con);
            $countOfResults=$resultProvider->getCount($phrase);
            echo "<p class='totalCount'>$countOfResults results found</p>";
            echo $resultProvider->getResults($phrase);
            ?>
        </div>
    </div>
    <script src="assets/js/autocomplete.js"></script>
</body>
</html>