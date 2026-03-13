<div>
  <h1>대출도서목록</h1>
  <?php 
    $date = new DateTimeImmutable();
    $user = ss();
    $sql = DB::fetch("select * from book where rentUserId = '$user'");
  ?>


  <ul>
    <?php foreach($sql as $s):?>
      <img src="./book/<?= $s -> image?>" alt="bookImage" title="bookImage">
    <li><?= $s -> title?></li>
    <li><?= $s -> author?></li>
    <li><?= $s -> date?></li>
    <li><?= $s -> returnDate?></li>
    <?php endforeach;?>
  </ul>
</div>