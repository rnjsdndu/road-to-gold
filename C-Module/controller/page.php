<?php 
get('/',function () {
  view('home');
});

get('/sub', function () {
  view('sub');
});

post('/joinBack',function() {
  extract($_POST);
  $sql = DB::fetch("select * from users where id = '$id'");
  if(!$id || !$password || !$name) return move('/', '빈칸을 채워주세요');
  if($sql) return move('/', '이미 가입된 회원입니다.');

  DB::exec("insert into users (id, password, name) value ('$id', '$password', '$name')");
  move('/', '회원가입 성공!');
});

post('/loginBack', function(){
  extract($_POST);
  $sql = DB::fetch("select * from users where id = '$id' and password = '$password'");

  
  if(!$id || !$password) return move('/','빈칸을 채워주세요');

  if(!$sql) return move('/', '아이디 또는 비밀번호가 일치하지 않습니다.');

  if($sql){
    $_SESSION['ss'] = $id;
    move('/', '로그인 성공');
  }
});

get('/logout', function() {
  session_destroy();
  move('/', '로그아웃 되었습니다.');
});

get('/myPage', function() {
  view('myPage');
});

get('/addBook', function() {
  view('addBook');
});

get('/viewRent', function() {
  view('viewRent');
});

post('/addBookBack', function() {
  extract($_POST);
  $img = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];

  if(!$title || !$author || !$publisher || !$date || !$date) return move('/addBook', '빈 칸을 입력해주세요');
  if(!$img) return move('/addBook', '이미지를 등록해주세요');

  DB::exec("insert into book (title, author, publisher, date, price) values ('$title', '$author', '$publisher', '$date', '$price')");
  move_uploaded_file($tmp, "./book/$img");
  move('/addBook', '등록 성공');

});

get('/dataRoom', function() {
  view('dataRoom');
});

post('/rentBack', function() {
  extract($_POST);
  $user = ss();
  $date = date('Y-m-d');
  DB::exec("update book set rentState = 'O', rentAt = '$date', rentUserId = '$user' where idx = '$idx'");
  move('/dataRoom', '대출되었습니다');
});