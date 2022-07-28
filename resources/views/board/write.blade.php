@extends('layout.index')

@section('title', '게시판')

@section('css_header')
		<link rel="stylesheet" type="text/css" href="/css/board.css">
@endsection

@section('page_title', '공지사항')

@section('content')
    <section>
        <form name="registform" action="/register" method="post" id="registform">
            {{ csrf_field() }}
            <table>
                <tbody>
                    <tr>
                        <th>제목</th>
                        <td>
                            <input type="text" name="title" id="title" value="{{ $data->title }}" />
                        </td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td>
                            <textarea name="content" id="content">{{ $data->content }}</textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" name="action" value="send">저장</button>
        </form>
    </section>
@endsection


@section('js')
		<script type="text/javascript" src="/js"></script>
@endsection