<p>Главная страница ВИД</p>

<h1>Форма 2</h1>
<form action="form2.php" method="post" enctype="multipart/form-data">
    <p>Файл</p>
    <p><input type="file" name="file"></p>
    <p><input type="submit" name="Отправить"></p>
</form>

<?php foreach ($news as $val): ?>
<h3><?php echo $val['title']; ?></h3>
<p><?php echo $val['description']; ?></p>
<hr>
<?php endforeach; ?>

