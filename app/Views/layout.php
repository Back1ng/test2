<!doctype html>

<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Главная страница</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <tr>
            <td>Наименование контрагента</td>
            <td>Тип контрагента</td>
            <td>Населенный пункт</td>
            <td>Адрес VLAN От</td>
            <td>До</td>
            <td>Ответственный менеджер</td>
            <td></td>
        </tr>
        <?php
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>".$row['partner_name']."</td>";
            echo "<td>".$row['partner_type']."</td>";
            echo "<td>".$row['city_from']."</td>";
            echo "<td>".$row['city_from'] . ', '. $row['street_from'] . ', ' . $row['address_from'] ."</td>";
            echo "<td>".$row['city_to']   . ', '. $row['street_to']   . ', ' . $row['address_to'] ."</td>";
            echo "<td>".$row['manager']."</td>";
            ?>
            <td>
                <button class="btn btn-primary" onclick="location.href = '/show-edit/<?php echo $row['id'] ?>';">Редактировать</button>
                <button class="btn btn-danger" onclick="location.href = '/delete/<?php echo $row['id'] ?>';">Удалить</button>
            </td>
            <?php
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>