<div>
  <h1>대출도서목록</h1>
  <?php 
    $date = new DateTimeImmutable(date('Y-m-d'));
    echo $date -> modify('1year');
  ?>
  
  <ul>
    <?php foreach($sql as $s):?>
    <li><?= $s -> image?></li>
    <li><?= $s -> title?></li>
    <li><?= $s -> author?></li>
    <li><?= $s -> date?></li>
    <li><?= $s -> returnDate?></li>
    <li><?= $s -> returnDate?></li>
    <?php endforeach;?>
  </ul>
</div>