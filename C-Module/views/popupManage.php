

<div id="popupManage">

<?php $getId = $_GET['idx'] ?? 0; $updateSql = DB::fetchAll("select * from popup"); $sql = DB::fetch("select * from popup where idx = '$getId'"); if($getId):?>
  <h2>수정</h2>
  <form action="/popupUpdate" method="post" enctype = "multipart/form-data">
    <input type="text" name="title" value="<?= $sql -> title?>">
    <input type="text" name="description" value="<?= $sql -> description?>">
    <input type="date" name="popupStart" value="<?= $sql -> popupStart?>">
    <input type="date" name="popupEnd" value="<?= $sql -> popupEnd?>">
    <img src="./popup/<?=$sql -> image?>" alt="popupImage" title="popupImage">
    <input type="hidden" name="oldImage">
    <p><?=$sql -> image?></p>
    <input type="file" name="image">
    <button>수정</button>
  </form>
  <hr>
<?php endif;?>

<?php foreach($updateSql as $us):?>
  <form>
      <p><?= $us -> title?></p>
      <img src="./popup/<?= $us ->image?>" alt="popupImage" title="popupImage">
      <input type="hidden" name="idx" value="<?=$us -> idx?>">
      <button formaction="/popupPostIdx" formmethod="get">수정</button>
      <button formaction="/popupDelete" formmethod="post">삭제</button>
    </form>
    <hr>
    <?php endforeach;?>
</div>

<h2>등록</h2>
<form action="/insertPopup" method="post" enctype="multipart/form-data">
  <input type="text" name="title">
  <input type="text" name="description">
  <input type="date" name="popupStart">
  <input type="date" name="popupEnd">
  <input type="file" name="image">
  <button>등록</button>
</form>