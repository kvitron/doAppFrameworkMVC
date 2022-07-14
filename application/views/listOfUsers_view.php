<h1>Список пользователей</h1>
<p>
<table>
    <tr>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>Количество лет</td>
    </tr>
    <?php if (isset($data['array_all_users']) && $data['array_all_users']) : ?>
        <?php foreach ($data['array_all_users'] as $array_user) : ?>
            <tr>
                <td><?= $array_user['first_name'] ?></td>
                <td><?= $array_user['second_name'] ?></td>
                <td><?= $array_user['age'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
</p>