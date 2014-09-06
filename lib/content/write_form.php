<div id="upldcont">
    <form id="upldform" enctype="multipart/form-data" action="loading.php" method="POST">
        <h3>Add a song</h3>
        <fieldset>
            <label for="name">Song name:</label><input type="text" name="name" maxlength="25" id="name" required><br>
            <label for="lyrics">Lyrics:</label><textarea name="lyrics" maxlength="500" id="lyrics" required></textarea><br>
            <label for="desc">Song description:</label><textarea name="desc" maxlength="500" id="desc" required></textarea><br><!-- TinyMCE -->
            <label for="tags">Tags:</label><input type="text" name="tags" maxlength="1000" id="tags"><br>
        </fieldset>
        <fieldset title="You can upload <?=ini_get('max_file_uploads')?> file(s), each being less than <?=ini_get('upload_max_filesize')?> in size. The upload can't be bigger than <?=ini_get('post_max_size')?>.">
        <?php
        if ($loggedin){
            echo "<li><label for=\"sheet_music\">Sheet music, video performances:</label><input type=\"file\" name=\"sfile[]\" id=\"sfile\" multiple></li><br>";
        } else {
            echo "<li>You'll need to log in in order to upload a file. You can log in <a href=\"login.php\">here</a>.</li><br>";
        }?>
        </fieldset>
        
        <div id="submit">
            <input type="submit" name="submit" value="Upload">
        </div>
        <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
        <input type="hidden" id="action" name="action" value="addSong">
    </form>
</div>