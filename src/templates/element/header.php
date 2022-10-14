<div class="header">
    <div>
        <h2 class="header_title">
            <a class="header_link" href="/">Wime</a>
        </h2>
    </div>
    <div>
        <!-- //セッションユーザーを入れる -->
        <?php if (isset($user)):?>
        <button class="logoutBtn" onClick="location.href='/users/logout'">ログアウト</button>
        <?php else:?>
        <h2 class="not_login"><span class="not_login_user_span">●</span> 未ログイン</h2>
        <?php endif; ?>
    </div>
</div>