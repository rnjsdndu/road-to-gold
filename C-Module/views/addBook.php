<div id="addBook">
  <form action="/addBookBack" method="post" enctype="multipart/form-data" >
    <input type="text" placeholder="도서명" name="title">
    <input type="text" placeholder="저자명" name="author">
    <input type="text" placeholder="출판사" name="publisher">
    <input type="date" placeholder="발행년" name="date">
    <input type="number" placeholder="가격" name="price">
    <input type="file" name="image" accept=".png,.jpg,.jpeg,image/png,image/jpeg">
    <button>등록하기</button>
  </form>
</div>