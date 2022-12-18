<h1 class="title">
    作業終了
</h1>
<table>
    <tr>
        <?php $list_titles=["内容","開始時間","終了時間","",""];
        foreach ($list_titles as $list_title):?>
        <th>
            <?=$list_title?>
        </th>
        <?php endforeach; ?>
    </tr>
    <form action="/mypage/edit/<?=$time->id?>" method="post">
        <tr>
            <td>
                <?= $time->category?>
            </td>
            <td>
                <?php echo date('Y-m-d H:i', strtotime($time->start_time))?>
            </td>
            <td>
                <!-- //既に終了時間が登録済の場合はDBから表示、無ければ現在時刻の表示だけ。
                登録されるのは下のhidden -->
                <?php $finish = $time->finish_time;
                    echo  $finish ? date('Y-m-d H:i', strtotime($time->finish_time)) : date('Y-m-d H:i');?>
            </td>
            <!-- //送信される終了時刻 -->
            <input type="hidden" name="finish_time"
                value="<?= date('Y-m-d H:i')?>">
            <input type="hidden" name="_csrfToken" autocomplete="off"
                value="<?= $this->request->getAttribute('csrfToken') ?>">
            <td>
                <button class="btn" type="submit">登録</button>
            </td>
        </tr>
    </form>
</table>
<div class="input_and_btn">
    <button class="btn" onClick="location.href='/mypage/list'">戻る</button>
</div>