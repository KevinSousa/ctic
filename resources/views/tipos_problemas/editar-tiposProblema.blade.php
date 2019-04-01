
<!DOCTYPE html>
<html>
<head>
	<title> CTIC </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.css">
</head>
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Acme');
	*{
		font-family: 'Acme', sans-serif;
	}
	body {
		margin-top: 25px;
		margin-bottom: 30px;
	}
</style>
<body>
	<div class="ui container">
		<h1> Alterar Dados </h1>
		<h3> Alteração de dados de tipos de problemas </h3>
		<div>
			<form method="post" action="{{route('funcao.update', $funcao->funcao_id)}}" class="ui form">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@component('tipos_problemas/card-tiposProblemas', ['tipoProblema' => $tipoProblema])
				@endcomponent
				<input class="ui primary button" type="submit" name="" value="Atualizar">
				<input class="ui button" type="reset" name="" value="Limpar">
			</form>
		</div>
	</div>
</body>
</html>