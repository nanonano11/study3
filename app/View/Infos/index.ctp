<h1>Info</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($infos as $info): ?>
    <tr>
        <td><?php echo $info['Info']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($info['Info']['title'],
array('controller' => 'infos', 'action' => 'view', $info['Info']['id'])); ?>
        </td>
        <td><?php echo $info['Info']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($info); ?>
</table>
