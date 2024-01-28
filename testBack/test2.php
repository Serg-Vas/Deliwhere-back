<form action="<?=$_SERVER['SCRIPT_NAME']?>">
<select name="days[]" size="7" multiple>
<option value="1">Понедельник</option>
<option value="2">Вторник</option>
<option value="3">Среда</option>
<option value="4">Четверг</option>
<option value="5">Пятница</option>
<option value="6">Суббота</option>
<option value="7">Воскресенье</option>
</select><br>
<input type="submit" value="Отправить">
</form>
<?php
if (isset($_GET['days']) && is_array($_GET['days'])) {
echo "Выбранные пункты<br>\n";
foreach ($_GET['days'] as $item) {
echo "{$item}<br>\n";
}
}