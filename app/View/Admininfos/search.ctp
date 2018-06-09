
admininfoscontroller
<?php
public function search(){
 //リクエストがPOSTで送られたデータが空白で無ければ
   if($this->request->is('post') && $this->request->data['Search']['title'] != ""){
      //Formの値を取得
      $title = $this->request->data['Post']['title'];
    //検索文字を空白（全角又は半角）で区切って配列$keywordsに代入
    $keywords = preg_split("/ |\\s/",$title);
    //配列$keywordsの数だけ繰り返して検索条件を$conditionsに代入
    foreach($keywords as $keyword){
      $conditions[] = "title like '%$keyword%'";
    }
    //POSTされたデータを曖昧検索
    $data=$this->->find('all',array(
     'conditions' => $conditions
    ));
     $this->set('datas',$data);
   }else{
     //POST以外の場合
     //一覧表示
     $data=$this->Post->find('all');
     $this->set('datas',$data);
   }
 }
-------------------------------------------------------



<?php
 echo $this->Form->create('Post', array('action'=>'search'));
 echo $this->Form->input('title', array('label' => 'タイトル名を入れてください'));
 echo $this->Form->end('検索');
?>
<?php if($this->request->is('post') && $this->request->data['Search']['title']!=""){?>
 <table>
   <tr>
     <th><?php echo "ID";?></th>
     <th><?php echo "タイトル";?></th>
     <th><?php echo "作成日";?></th>
 </tr>
 <?php foreach ($datas as $data): ?>
 <tr>
    <td><?php echo h($data['Post']['id']); ?></td>
    <td><?php echo $this->Html->link($data['Post']['title'],array('action'=>'edit',h($data['Post']['id'])));?></td>
    <td><?php echo h($data['Post']['created']); ?></td>
 </tr>
<?php endforeach; ?>
 </table>
<?php }else{ ;?>
<p>検索結果がこちらに表示されます。</p>
<?php } ?>
