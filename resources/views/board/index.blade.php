@extends('layout.index')

@section('title', '게시판')

@section('css_header')
		<link rel="stylesheet" type="text/css" href="/css/board.css">
@endsection

@section('page_title', '공지사항')

@section('content')
		<div>
				<table>
					<thead>
							<th>No.</th>
							<th>Title</th>
							<th>Date</th>
					</thead>
					<tbody>
							@foreach ($data as $row)
									<tr>
											<td>{{ $row->id }}</td>
											<td><a href="/board/{{ $name }}/{{ $row->id }}">{{ $row->title }}</a></td>
											<td>{{ $row->created_at }}</td>
									</tr>
							@endforeach
					</tbody>
			</table>
		</div>

		<div class="paginationBox">
				{{ $data->links() }}
		</div>
@endsection


@section('js')
		<script type="text/javascript" src="/js"></script>
@endsection