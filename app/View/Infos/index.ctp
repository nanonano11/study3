
<h1>お知らせ</h1>
<p><?php echo $this->Html->link('admin', array('action' => 'admin')); ?></p>
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
