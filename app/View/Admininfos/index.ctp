
<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Info', array('action' => 'add')); ?></p>
<p><?php echo $this->Html->link('search', array('action' => 'search')); ?></p>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id');?></th>
        <th><?php echo $this->Paginator->sort('title');?></th>
        <th>Actions</th>
        <th><?php echo $this->Paginator->sort('created','作成日');?></th>
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
<div class="paging">
<?php
echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled'));
?>
</div>
