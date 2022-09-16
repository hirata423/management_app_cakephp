<h2 class="login_user">
    <?= $user->getName() ?>
    <span>、お疲れ様です!</span>
</h2>
<P class="date">
    今日は<?= $date ?>です。
</P>
<p>
    <!-- 開始 -->
    <button onClick="location.href='/create'"><?= $button_tag[0]?></button>
</p>
<p>
    <!-- 一覧 -->
    <button onClick="location.href='/list'"><?= $button_tag[1]?></button>
</p>
<p>
    <!-- トップ -->
    <button onClick="location.href='/'"><?= $button_tag[2]?></button>
</p>
<p>
    <!-- ログアウト -->
    <button onClick="location.href='/logout'"><?= $button_tag[3]?></button>
</p>