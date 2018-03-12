<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <title>Install</title>
</head>
<body>
<div class="installer-header">
    <h3>Installer</h3>
</div>
<div class="col-md-4 installer-body">
    <h5>Рекомендации</h5>
    <?php
    if (is_array($requirements)){
        foreach ($requirements as $requirement){
            echo '<p>'.$requirement.'</p>';
        }
        echo '<a href='.url('install/database').'><button class="btn btn-primary">Продолжайте установку в любом случае</button>';
    } else {
        echo '<p>Все гуд :)</p>
				<a href='.url('install/database').'><button class="btn btn-primary">Продолжить установку</button></a>';
    }
    ?>
</div>
<style>
    .installer-header {
        background: linear-gradient(to right, #4c77c6,#649bf2) repeat scroll 0% 0%;
        padding: 70px 0px 100px 0px;
        text-align: center;
    }
    .installer-header h3 {
        margin: 0px;
        color: white;
    }
    .installer-body {
        float: none;
        margin: auto;
        background: white;
        margin-top: -30px;
        border-radius: 5px;
        padding: 10px 20px;
    }
    .btn  {
        display: table;
        border-radius: 50px;
        margin: 10px auto;
    }
</style>
</body>
</html>