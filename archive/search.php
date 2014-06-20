<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>Refined Search | Wellspring</title>
        <meta charset="utf-8">
            
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    
    <body>
        <div class="page">
            <?php include_once('incl/header.html');?>
            <div id="content">
                <?php
                require("php/connect01.php");
                require("php/functions.php");
                
                $database = "wellspr_test";
                $dbs = mysqli_select_db($dbc, $database);
                
                if ($dbc == true){
                    if ($dbs == true){
                        $search_terms = sanitize($_GET['query']);
                        $search_terms_exploded = explode(" ", $search_terms);
                        $search_sql = "SELECT `song_id`,`song_name`,`song_desc`,`lyrics` FROM songs_meta WHERE (`song_name` LIKE '%$search_terms%' OR `song_desc` LIKE '%$search_terms%' OR `lyrics` LIKE '%$search_terms%' ";
                        foreach ($search_terms_exploded as $key => $k){
                            $search_sql .= "OR `song_name` LIKE '%$k%' OR `song_desc` LIKE '%$k%' OR `lyrics` LIKE '%$k%'";
                        }
                        $search_sql .= ");";
                        $search_query_result = mysqli_query($dbc, $search_sql);
                        if (mysqli_num_rows($search_query_result) != 0){
                            echo "<div id=\"sdetails\">";
                            echo "<p>Results of search: '$search_terms'</p><br></div>";
                            echo "<div id=\"sresults\">";
                            while ($results = mysqli_fetch_array($search_query_result, MYSQLI_ASSOC)){
                                //echo $results['song_name'] ."<br><br>\n";
                                //echo "Lyrics: " . $results['lyrics'] . "<br>\n";
                                echo "<a href=\"song_view.php?song_id=" . $results['song_id'] . "\">" . $results['song_name'] ."</a><br>
                                        Song description: " . $results['song_desc'] ."<br> Lyrics:<br> ". $results['lyrics'] ."<br><br>\n";
                            }
                            echo "</div>";
                        } else {
                            echo "No results with the search: '$search_terms'<br>\n</div>";
                        }
                        //$replace = preg_replace();
                        //$queries = explode(" ",$_GET['query']); //Defining the queries as an exploded string
                        //print_r($queries); //viewing array
                    } else {
                        echo "There was an error selecting the database $database.<br>\n";
                    } 
                } else {
                    echo "There was an error connecting to the database $database.<br>\n";
                }
                mysqli_free_result($search_query_result);
                mysqli_close($dbc);
                ?>
            </div>
            <div id="sidebar">
                <?php include_once('incl/updates.php');?>
            </div>
            <div id="footer">
                <?php include_once('incl/footer.html');?>
            </div>
        </div>
    </body>
</html>