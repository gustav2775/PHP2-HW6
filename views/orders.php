<div class="container">
    <?php if ($orders) : ?>
        <h3>Размещенные заказы</h3>
        <div class="orders">
            <div class="ordersHeader">
                <p class="">№ Заказа</p>
                <p class="">id пользователя</p>
                <p>Сумма заказа</p>
                <?php if ($is_admin) : ?>
                    <p class="status">Статус заказа</p>
                    <p>Удалить заказ из базы</p>
                <?php else : ?>
                    <p class="status"></p>
                    <p>Пометить на удаление</p>
                <?php endif ?>

            </div>
            <?php foreach ($orders as $order) : ?>
                <div class="orderAdm">
                    <p> <a href="/orders/order/?id= <?= $order['id'] ?>"> <?= $order['id_order'] ?></a></p>
                    <p> <?= $order['iduser'] ?></p>
                    <p> <?= $order['sumOrder'] ?></p>
                    <?php if ($is_admin) : ?>
                        <form action="" method="post" class="status">
                            <input hidden type="text" name="action" value="update">
                            <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                            <select name="status" id="status">
                                <option hidden value="processing"><?= $order['status'] ?></option>
                                <option value="Заказ подтвержден">Заказ подтвержден</option>
                                <option value="Заказ отправлен">Заказ отправлен</option>
                                <option value="Заказ выполнен">Заказ выполнен</option>
                                <option value="Заказ отменен">Заказ отменен</option>
                            </select>
                            <input type="submit" value="Изменить">
                        </form>
                        <form action="" method="post" class="deleteOrder">
                            <input hidden type="text" name="action" value="delete">
                            <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                            <input type="submit" value="X">
                        </form>
                    <?php else : ?>
                        <form action="" method="post" class="deleteOrder">
                            <input hidden type="text" name="Pay" value="<?= $order['sumOrder'] ?>">
                            <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                            <input type="submit" value="Оплатить">
                        </form>
                        <form action="" method="post" class="deleteOrder">
                            <input hidden type="text" name="idorder" value="<?= $order['id'] ?>">
                            <input type="checkbox" name="remove" value="X">
                            <input type="submit" value="Подтвердить">
                        </form>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <p>Заказов нет</p>
    <?php endif ?>
</div>