<?php require_once "helper.php"; ?>
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
        <a href="<?=getPrevLink()?>" class="fa fa-arrow-left"></a>
    </div>
    <div id="next" class="va-center control">
        <a href="<?=getNextLink()?>" class="fa fa-arrow-right"></a>
    </div>
    <div id="current" class="va-center">
        <span id="cMonth"><?=$sMonthName?></span>
        <span id="cYear"><?=$iYear?></span>
    </div>
    <div id="close" class="va-center control" <?php if (!$iMonth): ?>style="display:none"<?php endif; ?>>
        <a href="?y=<?=$iYear?>" class="fa fa-close"></a>
    </div>

    <div id="calendar">
    <?php
        if ($iMonth) echo getFMonth(getMonthString($iYear, $iMonth));
        else echo getFYear($iYear);
    ?>
    </div>
    <script src="js/main.js"></script>
</body>
</html>