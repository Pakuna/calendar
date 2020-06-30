<?php require_once "helper.php"; $iYear = $_GET["y"] ?? date("Y"); ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kalender</title>
    <link href="favicon.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <div id="prev" class="va-center control">
        <a href="?y=<?=$iYear-1?>" class="fa fa-arrow-left"></a>
    </div>
    <div id="current" class="va-center">
        <span id="cDay"></span>
        <span id="cMonth">Juni</span>
        <span id="cYear"><?=$iYear?></span>
    </div>
    <div id="next" class="va-center control">
        <a href="?y=<?=$iYear+1?>" class="fa fa-arrow-right"></a>
    </div>

    <ul id="calendar" class="year">
        <?=getFYear($iYear)?>
    </ul>
    <script src="js/main.js"></script>
</body>
</html>