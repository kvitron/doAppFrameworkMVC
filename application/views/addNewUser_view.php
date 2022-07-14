<h1>Добавление нового пользователя</h1>
<p>
    <form action="" method="POST">
        <p>Имя</p>
        <input name="first-name" type="text" size="45" required>
        <p>Фамилия</p>
        <input name="second-name" type="text" size="45" required>
        <p>Возраст</p>
        <input name="age" type="text" size="45" required>
        <p>Логин</p>
        <input name="login" type="text" size="45" required>
        <p>Пароль</p>
        <input name="password" type="text" size="45" required>
        <input type="submit" name="add-new-user" value="Сохранить пользователя">
    </form>
    
    <?php if (isset($data['info_message']) && $data['info_message']) : ?>
        <p><?=$data['info_message']?></p>
    <?php endif; ?>
</p>