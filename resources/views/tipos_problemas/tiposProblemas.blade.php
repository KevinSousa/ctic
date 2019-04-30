<style type="text/css">
	div#index{
		margin: 0px 25px 0px 25px;
	}

	#titulo {
		color: #666;
	}
</style>
@section('content')
    <title>Tipos de Problemas</title>
    <div id="index">
        <div align="left">  
            <h1 id="titulo"> Tipos de Problemas </h1>
            <br>
        </div>
        <br>
        <table class="table table-striped">
            <thead class="thead-light">
                <tr align="center">
                    <th> Nome: </th>
                    <th> Ação: </th>
                </tr>
            </thead>
      <tbody>
            @foreach ($tiposProblemas as $tipoProblemas)
                <tr align="center">
                    <td> {{$tipoProblemas->probl_tipo}}</td>
          <td>
              <a href="{{route('tiposProblemas.destroy',$tipoProblemas->probl_id)}}">  
                  <button id="delete" class="btn btn-danger">
                      Deletar
                  </button>
              </a>
              <a href="{{route('tiposProblemas.edit',$tipoProblemas->probl_id)}}">
                  <button id="edit" class="btn btn-warning">
                      Editar
                  </button>
              </a>
          </td>
                </tr>
            @endforeach
        </table>
        <br>
    </div>
@endsection
@section('js')
     <!-- Jquery JS-->
        <script src="/vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="/vendor/slick/slick.min.js">
        </script>
        <script src="/vendor/wow/wow.min.js"></script>
        <script src="/vendor/animsition/animsition.min.js"></script>
        <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="/vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="/vendor/circle-progress/circle-progress.min.js"></script>
        <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="/vendor/select2/select2.min.js">
        </script>
        <!-- Main JS-->
        <script src="/js/main.js"></script>

@endsection    

@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')