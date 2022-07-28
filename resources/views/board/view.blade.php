@extends('layout.index')

@section('title', '게시판')

@section('css_header')
		<link rel="stylesheet" type="text/css" href="/css/board.css">
@endsection

@section('page_title', '공지사항')

@section('content')
    <section>
        <header class="main">
            <h1>{{ $data->title }}</h1>
            <p class="txt_small">{{ $data->created_at }}</p>
        </header>

        {{ $data->content }}
    </section>
@endsection


@section('js')
		<script type="text/javascript" src="/js"></script>
@endsection