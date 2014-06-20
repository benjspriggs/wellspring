<!DOCTYPE html>

<html lang="en-us">
<head>
    <title>Read | Wellspring</title>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/read.css">
</head>

<body>
    <div class="page">
        <?php include_once('incl/header.html'); ?>
        <div id="content">
            <div id="insert">
                <?php include_once('php/readpopulate.php'); ?>
            </div>
        </div>
        
    <div id="sidebar">
        <?php include_once('incl/updates.php'); ?>
    </div>
    
    <div id="footer">
            <?php include_once('incl/footer.html'); ?> <!-- Include for the footer -->
    </div>
    
    </div> <!-- closing tag for the page div -->
    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/read.js"></script>

</body>
</html>
