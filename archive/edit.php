<!DOCTYPE html>

<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>Write | Wellspring</title>
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    
</head>

<body>   
    <div class="page">
        <?php include_once('incl/header.html'); ?>
        
            <div id="upldcont">
            <form id="upldform" enctype="multipart/form-data" action="php/upload.init.php" method="POST">
                <h3>Add a song</h3>
                <fieldset><ul>
                    <li><legend>Song name:</legend><input type="text" name="sname" maxlength="25" id="sname" required></li><br>
                    <li><legend>Lyrics:</legend><textarea name="lyrics" maxlength="500" id="lyrics" required></textarea></li><br>
                    <li><legend>Song description:</legend><pre><textarea name="sdesc" maxlength="500" id="desc"></textarea></pre></li><br>
                    <li><legend>Tags:</legend><input type="text" name="stags" maxlength="1000" id="tags"></li><br>
                    <li><label for="sheet music">Sheet music:</label><input type="file" name="sfile[]" required multiple></li><br>
                    <!-- <li><label for="video performances">Video performances:</label><input type="file" name="vfile[]" multiple></li><br> -->
                    <li>You need to log in in order to upload a file, log in <a href="#">here</a>.</li><br>
                </ul></fieldset>
                
            <div id="submit">
                <input type="submit" name="submit" value="Upload">
            </div>
            
            </form>
            
            
                

        </div>
            
        <div id="footer">
            <?php include_once('incl/footer.html'); ?> <!-- Include for the footer -->
        </div>
    </div> <!-- closing tags for the page div -->

</body>

</html>
