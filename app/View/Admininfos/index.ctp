
<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Info', array('action' => 'add')); ?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- ここで $posts 配列をループして、投稿情報を表示 -->

    <?php foreach ($infos as $info): ?>
    <tr>
        <td><?php echo $info['Info']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $info['Info']['title'],
                    array('action' => 'view', $info['Info']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $info['Info']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    'Edit', array('action' => 'edit', $info['Info']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $info['Info']['created']; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
