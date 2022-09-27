<h2 class="top_title">
    Wime
</h2>
<P class="introduction">
<P>仕事　勉強　趣味</P>
</P>
<p class="introduction">
    などの時間を<span class="introduction_span">視える化</span>する
</p>
<P>
<p class="introduction">作業時間管理アプリ</p>

<p>
    <!-- //セッションユーザーを入れる -->
    <?php if ($user->get_Login_User_Name()): ?>
    <button onClick="location.href='/mypage'">始める</button>
    <?php elseif (!$user->get_Login_User_Name()):?>
    <button>ログイン</button>
    <?php endif; ?>
</p>