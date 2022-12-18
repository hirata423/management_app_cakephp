<p class="login_user">
    <span class="login_user_span">●</span><?= $loginUser->get_Login_User_Name() ?>
</p>
<h1 class="title">
    記録一覧
</h1>
<div class="input_and_btn">
    <div>
        <form action="/mypage/list" method="post" class="search-form">
        <?php if(isset($text)): ?>
                <input type="text" class="search-box" placeholder="内容で検索 (調整中)" value="<?= $text ?>" name="text">
            <?php else: ?>
                <input type="text" class="search-box" placeholder="内容で検索 (調整中)" value="" name="text">
            <?php endif ;?>
            <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
        </form>
    </div>
    <div>
        <button class="btn" onClick="location.href='/mypage/create'">開始</button>
        <button class="btn" onClick="location.href='/'">戻る</button>
    </div>
</div>
<table>
    <tr>
        <?php  $list_titles=["内容","開始時間","終了時間","経過時間","",""] ?>
        <? foreach ($list_titles as $list_title):?>
            <th>
                <?=$list_title?>
            </th>
        <?php endforeach; ?>
    </tr>
    <?php foreach($user as $time) :?>
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
            $finish_times->diff($start_times)->format('%d-%h:%I') : "進行中";
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
                onClick="location.href='/mypage/<?= $time->id ?>'">
                <?php echo $this->Html->image('dustBox.png', ['alt' => 'DustBox']) ?>
            </button>
        </td>
    </tr>
<?php endforeach ; ?>
</table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('先頭')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->last(__('最後') . ' >>') ?>
        </ul>
        <p class="hit" ><?= $this->Paginator->counter(__('{{page}}ページ目　/ {{count}}件の記録')) ?></p>
    </div>