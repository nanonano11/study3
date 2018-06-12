
<h1>お知らせ</h1>
<p><?php echo $this->Html->link('admin', array('controller' =>'admininfos', 'action' => 'index')); ?></p>
<table>

<!-- ここで $posts 配列をループして、投稿情報を表示 -->

    <?php foreach ($infos as $info): ?>
    <tr>
      <td>
          <?php echo $info['Info']['created']; ?>
      </td>
      <!-- 日付 -->

      <td>
          <?php
              echo $this->Html->link(
                  $info['Info']['title'],
                  array('action' => 'view', $info['Info']['id'])
              );
          ?>
      </td>
        <!-- タイトル -->


    </tr>
    <?php endforeach; ?>

</table>
<div class="paging">
<?php
echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled'));
?>
</div>
