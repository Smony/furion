<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<div class="installer-header">
    <h3>Installer</h3>
</div>
<div class="col-md-4 installer-body">
    <?php
        if (isset($error)){
            echo $error;
        }
    ?>
    <form action="" method="POST">
        <h5>Настройка</h5>
        <?=csrf_field()?>
        <div class="form-group">
            <label class="control-label">Database Hostname</label>
            <input name="host" class="form-control" type="text" required>
        </div>
        <div class="form-group">
            <label class="control-label">Database Name</label>
            <input name="name" class="form-control" type="text" required>
        </div>
        <div class="form-group">
            <label class="control-label">Database User</label>
            <input name="user" class="form-control" type="text" required>
        </div>
        <div class="form-group">
            <label class="control-label">Database Password</label>
            <input name="password" class="form-control" type="password">
        </div>
        <input class="btn btn-primary" value="Продолжить" name="install" type="submit">
    </form>
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