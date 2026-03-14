<?php $sql = DB::fetchAll("select * from book"); $date = new DateTimeImmutable() ?>

<div id="viewRent">
  <h1>도서대출현황</h1>
  <table>
    <tr>
      <th>도서명</th>
      <th>저자명</th>
      <th>출판사</th>
      <th>대출일자</th>
      <th>반납일</th>
      <th>남은기간</th>
      <th>대출자 아이디</th>
      <th></th>
    </tr>
    <?php foreach($sql as $s):?>
      <tr>
        <td><?=$s-> title?></td>
        <td><?= $s->author?></td>
        <td><?=$s -> publisher?></td>
        <td><?= $s -> rentAt ?></td>
        <td><?= $s -> rentAt ? (new DateTime($s -> rentAt))-> modify("+10 days") -> format('Y-m-d') : ''?></td>
        <td>
        <?php 
          $rentDate = new DateTimeImmutable($s -> rentAt);
          $rentAt = $rentDate -> modify('+10 days');
          $diff = date_diff($date, $rentAt);
          echo $s -> rentAt ? $diff -> invert ? -$diff -> days : $diff->days : '' ;
        ?>
      </td>
        <td><?= $s -> rentUserId?></td>
        <td>
          <form action="/adminReturn" method="post">
            <input type="hidden" name="idx" value="<?= $s-> idx?>">
            <input type="hidden" name="rentUserId" value="<?= $s-> rentUserId?>">
            <button <?=$s->rentAt ? '' : 'disabled'?>>반납</button>
          </form>

        </td>
      </tr>
    <?php endforeach; ?>
  </table>

  <table>
    <tr>
      <th>좌석번호</th>
      <th>예약일</th>
      <th>시작시간</th>
      <th>종료시간</th>
      <th>예약자 아이디</th>
      <th></th>
    </tr>
    <?php foreach($read as $r):?>
      <tr>
        <td><?= $r -> idx?></td>
        <td><?= $r -> date?></td>
        <td><?= $r -> startTime?></td>
        <td><?= $r -> endTime?></td>
        <td><?= $r -> id?></td>
        <td>
          <form action="/cancleReserve" method="post">
            <input type="hidden" name="idx" value="<?= $r -> idx?>">
            <input type="hidden" name="id" value="<?= $r -> id?>">
            <button>취소</button>
          </form>
        </td>
      </tr>
    <?php endforeach;?>
  </table>
</div>