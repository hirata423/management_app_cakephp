<h2 class="login_user">
    <?= $user->get_Login_User_Name() ?>
    <span>、お疲れ様です!</span>
</h2>
<P class="date">
    今日は<?= $this->getToDay() ?>です。
</P>
<p>
    <!-- 開始 -->
    <button onClick="location.href='/mypage/create'">開始</button>
</p>
<p>
    <!-- 一覧 -->
    <button onClick="location.href='/mypage/list'">一覧</button>
</p>
<p>
    <!-- トップ -->
    <button onClick="location.href='/'">トップ</button>
</p>
<p>
    <!-- ログアウト -->
    <button onClick="location.href='/logout'">ログアウト</button>
</p>