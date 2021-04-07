<div class="container feedback">
    <?= $resultLoader ?>
    <div class="feedbackBox">
        <?php foreach ($feedback as $item) : ?>
            <div class="feedbackBoxItem">
                <p class="dateFeedback"><?= $item['datefeedback'] ?></p>
                <p class="nameUserFeed"> <?= $item['name'] ?></p>
                <p class="feedbackText"><?= $item['feedback'] ?></p>
                <div class="btnFeedbackBox">
                    <form action="" method="post">
                        <input hidden type="text" name="action" value="edit">
                        <input hidden type="text" name="idfeed" value="<?= $item['idfeed'] ?>">
                        <input class="btnFeedbackBoxEdit" type="submit" value="edit">
                    </form>

                    <form action="" method="post">
                        <input hidden type="text" name="action" value="delete">
                        <input hidden type="text" name="idfeed" value="<?= $item['idfeed'] ?>">
                        <input type="submit" value="х">
                    </form>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <form class="feedbackForm" action="" method="post">
        <input hidden type="text" name="idfeed" value="<?= $row['idfeed'] ?>">
        <input class='feedbacknameUser'type="text" name="nameUser" value="<?= $row['nameUser'] ?>" placeholder="Укажите имя" checked>
        <textarea name="textarea" id="" cols="30" rows="10" placeholder="Укажите тескт комментария"><?= $row['textarea'] ?></textarea>
        <?php if ($row['action'] == "update") : ?>
            <input hidden type="text" name="action" value="update">
            <input class="btnFeedbackForm" type="submit" value="<?= $row['submit'] ?>" name="">
        <?php else : ?>
            <input hidden type="text" name="action" value="insert">
            <input class="btnFeedbackForm" type="submit" value="<?= $row['submit'] ?>" name="">
        <?php endif ?>
    </form>
</div>