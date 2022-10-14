<h1 class="login_title">新規作成ホーム</h1>
<form method="post">
    <P class="newpost">
    <p class="newpost_title">Name</p>
    <input class="user_input" name="name" type="text" placeholder="nameを入力" required>
    </P>

    <P class="newpost">
    <P class="newpost_title">E-mail</P>
    <input class="user_input" name="email" type="email" placeholder="emailを入力" required>
    </P>

    <P class="newpost">
    <p class="newpost_title">Password</p>
    <input class="user_input" name="password" type="password" placeholder="passwordを入力" required>
    </P>
    <input type="hidden" name="_csrfToken" autocomplete="off"
        value="<?= $this->request->getAttribute('csrfToken') ?>">

    <button class="submitBtn" type="submit" name="submit">送信</button>
</form>
<P class="p_tag">
    <a class="go_register" href="login">登録済の方はコチラ</a>
</P>