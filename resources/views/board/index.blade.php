@extends('layout.index')

@section('title', '게시판')

@section('css_header')
		<link rel="stylesheet" type="text/css" href="/css/board.css">
@endsection

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
											<td>{{ $row->title }}</td>
											<td></td>
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