<h1 class="title">
    記録一覧
</h1>
<div class="input_and_btn">
    <div>
        <form action="list.php" method="get" class="search-form">
            <input type="text" class="search-box" placeholder="内容で検索" name="keyword">
        </form>
    </div>
    <div>
        <button class="btn" onClick="location.href='/mypage/create'">開始</button>
        <button class="btn" onClick="location.href='/'">戻る</button>
    </div>
</div>
<table>

    <tr>
        <?php  $list_titles=["内容","開始時間","終了時間","経過時間","",""];
        foreach ($list_titles as $list_title):?>
        <th>
            <?=$list_title?>
        </th>
        <?php endforeach; ?>
    </tr>

    <!-- //userテーブルに紐付けられた、timesテーブルからデータ取得してる。 -->
    <!-- //TimesTable.phpは不使用-->
    <?php foreach ($user->times as $time) :?>
    <tr>
        <td>
            <?= $time->category?>
        </td>
        <td>
            <?php $start_times=$time->start_time;
        echo date('Y-m-d H:i', strtotime($start_times))
        ?>
        </td>
        <td>
            <?php $finish_times=$time->finish_time;
        echo $finish_times == null ? "ー" : date('Y-m-d H:i', strtotime($finish_times)); ?>
        </td>
        <td>
            <?php echo $finish_times ?
            $finish_times->diff($start_times)->format('%d-%h:%i') : "進行中";
        ?>
        </td>
        <td>
            <button class="table_btn"
                onClick="location.href='/mypage/edit/<?= $time->id ?>'">
                <?php echo $this->Html->image('edit.png', ['alt' => 'Edit']) ?>
            </button>
        </td>
        <td>
            <button class="table_btn"
                onClick="location.href='/mypage/list/<?= $time->id ?>'"
                title='作業内容の削除ができます'>
                <?php echo $this->Html->image('dustBox.png', ['alt' => 'DustBox']) ?>
            </button>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


<!-- //ページネーション -->
<!-- <div class="paginator">
<ul class="pagination">
<?= $this->Paginator->first('<<') ?>
<?= $this->Paginator->prev('<') ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next('>') ?>z
<?= $this->Paginator->last('>>') ?>
</ul>
</div> -->