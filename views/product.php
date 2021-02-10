<div class="container">
    <div class="productconteiner">
        <div class="item">
            <img src="/img/imgCatalog/<?= $item['img_prod'] ?>" style="width: 550px;" alt="">
            <p class="catalogItem"><?= $item['name_product'] ?></p>
            <p> Price : <span><?= $item['price'] ?> USD</span></p>
            <p><?= $item['description'] ?></p>

            <a href="/catalog/buy/?id=<?= $item['id'] ?>">Купить</a>
        </div>

        <?php if ($_SESSION['id'] == 1) : ?>
            <p>Изменить данные по товару</p>
            <form class="productUpdate" action="/catalog/save/?id=<?= $item['id'] ?>" method="post">
                <input hidden type="text" name='id' value="<?= $item['id']?>">
                <input class='newProductInput' type="text" name='name_product' value="" placeholder="Название товара">
                <input class='newProductInput' type="text" name='price' value=""placeholder="Цена">
                <input class='newProductInput' type="text" name='description' value=""placeholder="Описание">
                <input type="file" name="productImg" id="">
                <input class="newProductSubmit" type="submit" value="Создать">
            </form>
        <?php endif ?>
    </div>
    <div class="views">Просмотры: <?= $item['veiws'] ?></div>
</div>
<?php include_once "feedback.php" ?>