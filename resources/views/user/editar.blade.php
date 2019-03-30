@extends('layouts.app')
@section('content')
<div id="edit">
		<div>
			<form method="post" action="{{route('user.atualizar', $usuario->user_id) }}" class="ui form">
				{{ csrf_field() }}
				@include('user._form')
				<button class="btn btn-success" type="submit"> Atualizar </button>
			</form>
		</div>
</div>
@endsection

