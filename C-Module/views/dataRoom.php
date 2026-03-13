<?php $sql = DB::fetchAll("select * from book"); ?>

<div id="dataRoom">
  <h1>도서목록</h1>
  <table>
    <tr>
      <th>도서사진</th>
      <th>도서명</th>
      <th>저자명</th>
      <th>발행년</th>
      <th>가격</th>
      <th>대출기간</th>
      <th>대출가능상태</th>
      <th></th>
    </tr>
    <?php foreach($sql as $s):?>
      <tr>
        <td><img src="./book/<?=$s -> image?>" alt="book" title="book"></td>
        <td><?= $s -> title?></td>
        <td><?= $s -> author?></td>
        <td><?= $s -> date?></td>
        <td><?= $s -> price?></td>
        <td><?= $s -> rentAt ? date('Y-m-d') .'~'. (new DateTimeImmutable($s -> rentAt)) -> modify('+10 days') -> format('Y-m-d') : '' ?></td>
        <td><?= $s -> rentState ? '대여중' : '대여가능'?></td>
        <td>
          <form action="/rentBack" method="post">
            <input type="hidden" name="idx" value="<?= $s->idx?>">
            <button <?= $s -> rentState ? 'disabled' : ''?>>대출</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
</div>
