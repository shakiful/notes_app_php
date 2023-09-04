<?php


$connection = require_once './connection.php';

$notes = $connection->getNotes();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <div>
        <form class="new-note" action="create.php" method="post">
            <input type="text" name="title" placeholder="Note title" autocomplete="off">
            <textarea name="description" cols="30" rows="4" placeholder="Note Description"></textarea>
            <button>
                New Note
            </button>
        </form>
        <div class="notes">
            <?php foreach ($notes as $note) : ?>
                <div class="note">
                    <div class="title">
                        <a href="?id=<?php echo $note['id'] ?>">
                            <?php echo $note['title'] ?>
                        </a>
                    </div>
                    <div class="description">
                        <?php echo $note['description'] ?>
                    </div>
                    <small><?php echo date('d/m/Y H:i', strtotime($note['create_date'])) ?></small>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                        <button class="close">X</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>