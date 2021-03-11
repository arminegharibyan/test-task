<?php
/**
 * Created by PhpStorm.
 * User: Armine
 * Date: 3/11/2021
 * Time: 12:14 PM
 */
?>
<form action="http://backend/index.php?r=teams%2Fplay" method="get">
    <?= \yii\helpers\Html::csrfMetaTags() ?>
<p>
    <input type="hidden" name="r" value="teams/play">
<?= \yii\helpers\Html::dropDownList('team1', null, $teams)?>
</p>
<p>
<?= \yii\helpers\Html::dropDownList('team2', null, $teams)?>
</p>
<p>
<button type="submit" class="btn btn-primary">Play</button>
</p>
</form>
