<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>로그인</title>
    </head>
    <body>
        @isset($errors)
            <p style="color:red;">{{ $errors->first('message') }}</p>
        @endisset
        <form name="loginform" action="/login" method="post" id="loginform">
            {{ csrf_field() }}
            <dl>
                <dt>E-mail : </dt>
                <dd>
                    <input type="text" name="email" size="30" value="{{ old('email') }}">
                    <span>{{ $errors->first('email') }}</span>
                </dd>
            </dl>
            <dl>
                <dt>비밀번호 : </dt>
                <dd>
                    <input type="password" name="password" size="30">
                    <span>{{ $errors->first('password') }}</span>
                </dd>
            </dl>
            <button type="submit" name="action" value="send">로그인</button>
        </form>
    </body>
</html>