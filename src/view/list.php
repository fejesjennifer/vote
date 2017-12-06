<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voting App</title>
    <link href="../view/style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php foreach ($kerdesek as $kerdes):?>
    <div class="questions">
        <div class="text"><?=$kerdes['text']?> </div>
        <div class="upvote"><a href="?up=<?=$kerdes['id']?>"> <?=$kerdes['up']?></a> </div>
        <div class="downvote"><a href="?down=<?=$kerdes['id']?>"> <?=$kerdes['down']?></a> </div>
    </div>
<?php endforeach; ?>
</body>
</html>