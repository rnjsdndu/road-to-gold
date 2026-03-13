<div>
  <h1>대출도서목록</h1>
  <?php 
    $date = new DateTimeImmutable();
    $user = ss();
    $sql = DB::fetchAll("
    select b.idx ,b.title, b.author, b.date, u.returnBookAt, b.image, b.rentAt
    from book b 
    join users u 
    on u.id = b.rentUserId 
    where rentUserId = '$user'");

    $date = new DateTimeImmutable();
    
    ?>


<table>
  <tr>
    <th>도서사진</th>
    <th>도서명</th>
    <th>저자명</th>
    <th>대출일자</th>
    <th>반납일</th>
    <th>남은기간</th>
    <th></th>
  </tr>
  <?php foreach($sql as $s):?>
    <tr>
      <td><img src="./book/<?= $s -> image?>" alt="bookImage" title="bookImage"></td>
      <td><?= $s -> title?></td>
      <td><?= $s -> author?></td>
      <td><?= $s -> date?></td>
      <td><?= $s -> returnBookAt?></td>
      <td>
        <?php 
          $rentDate = new DateTimeImmutable($s -> rentAt);
          $rentAt = $rentDate -> modify('+10 days');



          $diff = date_diff($date, $rentAt);
          echo $diff -> invert ? -$diff -> days : $diff->days ;
        ?>
      </td>
      <td>
        <form action="/returnBack" method="post">
          <input type="hidden" name="idx" value="<?= $s -> idx?>">
          <button>반납</button>
        </form>
      </td>
    </tr>
    <?php endforeach;?>
      
  </table>

  <h1>열람실예약</h1>
</div>