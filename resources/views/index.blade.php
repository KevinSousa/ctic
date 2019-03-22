<!DOCTYPE html>
<html>
<head>
	<title> CTIC </title>
</head>
<body>
	<h1> FUNCIONÁRIOS CADASTRADOS </h1>

	<table>
		<tr>
			<th> ID </th>
			<th> NOME </th>
			<th> CPF </th>
			<th> SIAP </th>
			<th> FUNÇÃO </th>
		</tr>


		@foreach ($users as $user)
			<tr>
				<td> {{$user -> user_id}} </td>
				<td> {{$user -> user_name}} </td>
				<td> {{$user -> user_cpf}} </td>
				<td> {{$user -> user_numero_siap}} </td>
				<td> {{$user -> funcao_name}}</td>
			</tr>
		@endforeach
	</table>

</body>
</html>