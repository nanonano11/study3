
<?php
 echo $this->Form->create('Info', array('type'=>'post','url'=>'search'));
 echo $this->Form->input('title', array('label' => 'タイトル名を入れてください'));
 echo $this->Form->end('検索');
?>
<?php if($this->request->is('post') && $this->request->data['Info']['title']!=""){?>
 <table>
   <tr>
     <th><?php echo "ID";?></th>
     <th><?php echo "タイトル";?></th>
     <th><?php echo "作成日";?></th>
 </tr>
 <?php foreach ($datas as $data): ?>
 <tr>
    <td><?php echo h($data['Info']['id']); ?></td>
    <td><?php echo $this->Html->link($data['Info']['title'],array('action'=>'edit',h($data['Info']['id'])));?></td>
    <td><?php echo h($data['Info']['created']); ?></td>
 </tr>
<?php endforeach; ?>
 </table>
<?php }else{ ;?>
<p>検索結果がこちらに表示されます。</p>
<?php } ?>
