<!doctype html>

<html lang="ru">
<head>
    <meta charset="utf-8">

    <title>Изменение данных</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="POST" class="row" action="/edit/<?php echo $id; ?>">
        <div class="form-group mx-4">
            <label for="partner_name">Наименование контрагента</label>
            <input id="partner_name" class="form-control" name="partner_name" type="text" value="<?= $formData['partner_name'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="partner_type">Тип контрагента</label>
            <input id="partner_type" class="form-control" name="partner_type" type="text" value="<?= $formData['partner_type'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="city_from">Адрес VLAN От, город</label>
            <input id="city_from" class="form-control" name="city_from" type="text" value="<?= $formData['city_from'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="street_from">Адрес VLAN От, улица</label>
            <input id="street_from" class="form-control" name="street_from" type="text" value="<?= $formData['street_from'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="address_from">Адрес VLAN От, номер дома</label>
            <input id="address_from" class="form-control" name="address_from" type="text" value="<?= $formData['address_from'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="city_to">До, город</label>
            <input id="city_to" class="form-control" name="city_to" type="text" value="<?= $formData['city_to'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="street_to">До, улица</label>
            <input id="street_to" class="form-control" name="street_to" type="text" value="<?= $formData['street_to'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="address_to">До, номер дома</label>
            <input id="address_to" class="form-control" name="address_to" type="text" value="<?= $formData['address_to'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="manager">Ответственный менеджер</label>
            <input id="manager" class="form-control" name="manager" type="text" value="<?= $formData['manager'] ?>">
        </div>
        <div class="form-group mx-4">
            <label for="manager">Сохранение данных</label><br>
            <input type="submit" class="btn btn-primary" value="Отправить">
        </div>
    </form>
</div>
</body>
</html>