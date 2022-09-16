<h1 class="title">
    <?= $title ?>
</h1>
<div class="input_and_btn">
    <form action="list.php" method="get" class="search-form">
        <input type="text" class="search-box" placeholder="内容で検索" name="keyword">
        <!-- +value="<?= $keyword ?>"> -->
    </form>
    <button class="btn" onClick="location.href='/create'"><?= $button_tag[0]?></button>
    <button class="btn" onClick="location.href='/mypage'"><?= $button_tag[1]?></button>
</div>
<table>

    <tr>
        <?php foreach ($list_titles as $list_title):?>
        <th>
            <?=$list_title?>
        </th>
        <?php endforeach; ?>
    </tr>


    <!-- //Entityで任意の日付データに変換して呼び出す -->
    <?php foreach ($user->times as $time) :?>
    <tr>
        <td>
            <?= $time->category?>
        </td>
        <td>
            <?php $start_times=$time->start_time;
        echo date('Y/m/d H:i', strtotime($start_times))
        ?>
        </td>
        <td>
            <!-- //デフォルト値[-]を追加す -->
            <?php $finish_times=$time->finish_time;
        echo $finish_times == null ?
        "ー" :
        date('Y/m/d H:i', strtotime($finish_times));
        ?>
        </td>
        <td>
            <?php $finish_times=$time->finish_time;
        echo $finish_times ? $d=$finish_times->diff($start_times)->format('%d %H:%i') : "進行中";
        ?>
        </td>
        <td>
            <button class="table_btn" onClick="location.href='/update.php?={$result['id']}'"
                title='作業の終了、内容の更新ができます'>更新</button>
        </td>
        <td>
            <button class="table_btn" onClick="location.href='/delete.php?={$result['id']}'"
                title='作業内容の削除ができます'>削除</button>
        </td>
    </tr>
    <?php endforeach; ?>



</table>