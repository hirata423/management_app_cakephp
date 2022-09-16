<?= $this->Html->css(['create']) ?>
<?= $this->fetch('css') ?>

<h2 class="title">作業開始</h2>
<form class="create_form" action="create.php" method="post">

    <label for="category">
        <!-- //inputのcssはmilligram.min.cssに記述あり -->
        <input class="category_inout" name="category" placeholder="作業内容を入力" required>
    </label>

    <!-- //以下2つは登録しない。表示だけ。 -->
    <label for="today">
        日付：<?=$date?>
    </label>
    <label for="start_time">
        開始時刻：<?=$time?>
    </label>
    <!-- //ログインユーザーのIDをuser_idに追加。
    //開始時刻はdatetime型で自動登録? -->
    <p>
        <button type="submit" name="submit" title="作業内容を登録します">登録</button>
    </p>
</form>
<p>
    <button type="button" title="一覧に戻ります" onclick="location.href='/list'">戻る</button>
</p>