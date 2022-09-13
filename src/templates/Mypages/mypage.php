<?= $this->Html->css(['mypage']) ?>
<?= $this->fetch('css') ?>

<h2 class="login_user">
    <?= $login_user?><span>さん、お疲れ様です!</span>
</h2>
<P class="date">
    今日は<?= $date ?>です。
</P>
<p>
    <button onClick="location.href='/'"><?= $button_tag[0]?></button>
</p>
<p>
    <button onClick="location.href='/list'"><?= $button_tag[1]?></button>
</p>
<p>
    <button onClick="location.href='/list'"><?= $button_tag[2]?></button>
</p>
<p>
    <button onClick="location.href='/logout'"><?= $button_tag[3]?></button>
</p>