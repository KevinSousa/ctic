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

	</table>

@foreach ($funcs as $func)
	<tr>
		<td> {{$func -> func_id}} </td>
		<td> {{$func -> func_name}} </td>
		<td> {{$func -> func_cpf}} </td>
		<td> {{$func -> func_numero_siap}} </td>
		<td> {{$func -> func_funcao }} </td>
	</tr>
@endforeach

</body>
</html>