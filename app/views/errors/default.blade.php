@extends('template')

@section('content')

<div class="error">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-right">
				<h1>Error ({{ Session::get('code') }})</h1>
			</div>
		</div>
	</div>
</div>

@stop
