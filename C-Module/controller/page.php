<?php 
get('/',function () {
  view('home');
});

get('/sub', function () {
  view('sub');
});

post('/joinBack',function() {
  extract($post);

  

  DB::exec("insert into users (id, password, name) value ('$id', '$password', '$name')");


});