<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>홈 화면</title>
    </head>
    <body>
        @if (Auth::check())
            <p>안녕하세요, {{ \Auth::user()->name }}님</p>
            <a href="/logout">로그아웃</a>
        @else 
            <p>안녕하세요, 게스트님</p>
            <a href="/login">로그인</a>
            <a href="/register">회원가입</a>
        @endif
    </body>
</html>