<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/style.css" />
    <link rel="stylesheet" href="./asset/fontawesome/css/all.min.css" />
  </head>
  <body>
    <div id="app">
      <input type="checkbox" id="guideModalInput" checked>
        <div class="guideModal">
            <div class="guideModalContent">
                <h2>2025년 지방기능경기대회 참가원서 접수 공고사항을 아래 같이 알려드립니다.</h2>
                <ul>
                    <li>□ 접수기간 : 2025. 1. 13.(월) ～ 1. 24.(금) 18:00 마감 [12일간]</li>
                    <li>□ 대상직종 : 웹디자인및개발 등 48개 직종</li>
                    <li>□ 접수방법 : 마이스터넷 홈페이지 인터넷 접수</li>
                </ul>
                <img src="./asset/image/images (6).png" alt="logo" title="logo">
                <label for="guideModalInput" class="modalClose">닫기</label>
            </div>
        </div>

      <header>
        <div class="container">
          <a href="/">
            <img
              src="./asset/image/logo.png"
              alt="logo"
              title="logo"
            />
          </a>

          <nav>
            <ul>
              <?php if(ss() == 'admin'):?>
                <li><a href="/addBook">신규도서등록</a></li>
                <li><a href="/viewRent">대출/열람실 업무조회</a></li>
              <?php else:;?>
              <li class="rel">
                <label for="navOne">도서관소개</label>

                <input type="text" id="navOne" />
                <span class="abs">-</span>
                <span class="abs">+</span>
                <ul class="sub">
                  <li><a href="/sub">도서관소개</a></li>
                </ul>
              </li>

              <li class="rel">
                <label for="navTwo">도서자료실</label>

                <input type="text" id="navTwo" />
                <span class="abs">-</span>
                <span class="abs">+</span>
                <ul class="sub">
                  <li><a href="/dataRoom">자료실</a></li>
                  <li><a href="#">열람실예약</a></li>
                </ul>
              </li>
              <li class="rel">
                <label for="navThree">회원서비스</label>

                <input type="text" id="navThree" />
                <span class="abs">-</span>
                <span class="abs">+</span>
                <ul class="sub">
                  <li><a href="#">회원가입</a></li>
                  <li><a href="/myPage">마이페이지</a></li>
                </ul>
              </li>
              <li>
                <a href="#">도서검색</a>
              </li>
              <li>
                <a href="#">도서관리자</a>
              </li>
              <?php endif;?>
            </ul>
          </nav>
          <?php 
            $user = ss();
            $sql = DB::fetch("select * from users where id = '$user'");

          ?>
          <div class="util">
            <?php if(ss()):?>
            <p><?=$sql -> name?> (<?=$sql -> id?>)</p> |
            <a href='/logout'>로그아웃</a>
            <?php elseif(!ss()):;?>
            <label for="loginPopupInput">로그인</label> |
            <span class="joinBtn">회원가입</span>
            <?php endif;?>
          </div>

          <input type="checkbox" id="loginPopupInput" />

          <div class="loginPopup">
            <form class="loginPopupContent" action="/loginBack" method="post">
              <h2>로그인 팝업</h2>
              <input type="text" name="id" />
              <input type="text" name="password" />
              <button>Login</button>
              <label for="loginPopupInput">Close</label>
            </form>
          </div>

          <div class="joinPopup">
            <form class="loginPopupContent"action="/joinBack" method="post">
              <h2>회원가입 팝업</h2>
              <input type="text" name="id" placeholder="아이디" />
              <input type="text" name="password" placeholder="비밀번호"/>
              <input type="text" name="name" placeholder="이름" />
              <button>회원가입</button>
              <label class="joinModalCloseBtn">Close</label>
            </form>
          </div>
        </div>
      </header>

  <script>
    const $joinBtn = document.querySelector('.joinBtn');
    const $joinModalCloseBtn = document.querySelector('.joinModalCloseBtn')
    document.querySelector('.joinPopup').style.display = 'none'

    $joinBtn.addEventListener('click',() =>{
      document.querySelector('.joinPopup').style.display = 'block'
    })

    $joinModalCloseBtn.addEventListener('click',() =>{
      document.querySelector('.joinPopup').style.display = 'none'
    })
  </script>