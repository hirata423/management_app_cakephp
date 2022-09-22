<h2 class="title">作業開始</h2>
<form class="create_form" action="/mypage/list" method="post">

    <label for="category">
        <!-- //inputのcssはmilligram.min.cssに記述あり -->
        <input class="category_inout" name="category" placeholder="例）勉強" value="" required>
    </label>
    <!-- //以下2つは登録しない。表示だけ。 -->
    <label>
        日付：<?= $this->getToDay() ?>
    </label>
    <label>
        開始時刻：<?= date('H:i') ?>
    </label>
    <!---------------------------------->
    <!-- //スタイル崩れ防止のために下に記述 -->
    <label>
        <input type="hidden" name="start_time"
            value="<?=date('Y-m-d H:i')?>">
    </label>
    <label>
        <!-- セッションIdをValueに格納 -->
        <input type="hidden" name="user_id" value="1">
    </label>
    <label>
        <input type="hidden" name="_csrfToken" autocomplete="off"
            value="<?= $this->request->getAttribute('csrfToken') ?>">
    </label>
    <p>
        <button type="submit" name="submit">登録</button>
    </p>
</form>

<p>
    <button type="button" title="一覧に戻ります" onclick="location.href='/mypage/list'">戻る</button>
</p>