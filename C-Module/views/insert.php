
<?php 
$str = file_get_contents('../도서정보.json');
$json = json_decode($str);
foreach($json as $j):
  extract((array) $j);

  $title = addslashes($j -> 서명);
  $author = addslashes($j -> 저자);
  $date = addslashes($j -> 발행년);
  $price = addslashes($j -> 가격);
  $image = addslashes($j -> 이미지);

  DB::exec("insert into book (title, author, date, price, image) values ('$서명', '$저자', '$발행년', '$가격', '$이미지')");
endforeach;
