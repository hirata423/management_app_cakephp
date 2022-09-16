<h2 class="top_title">
    <?= $title ?>
</h2>
<P class="introduction">
    <?= $text[0]?>
    <?= $text[1]?>
    <?= $text[2]?>
</P>
<p class="introduction">
    などの時間を<span class="introduction_span">視える化</span>する
</p>
<P>
<p class="introduction"><?= $text2 ?>
</p>

<p>
    <button onClick="location.href='/mypage'">
        <!-- //セッションでログイン済なら$link_text[1]に切り替える -->
        <?=$link_text[0]?>
    </button>
</p>