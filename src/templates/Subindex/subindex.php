<?= $this->Html->css(['normalize.min', 'milligram.min', 'sample']) ?>
<?= $this->fetch('css') ?>

<h1>
    <?= $text ?>
</h1>
<div>
    <button onClick="location.href='/mypage'">MyPageへ移動</button>
</div>