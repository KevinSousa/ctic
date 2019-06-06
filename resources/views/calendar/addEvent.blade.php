    @extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<title>Agendar Laboratório</title>
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col">
            <div style="margin-top: 6em;">
                <h2 id="titulo" align="left">Agendar Laboratório</h2>
                <br>
                 <form action="{{route('calendar.saveEvent')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success')}}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-danger">{{ Session::get('warnning')}}</div>
                        @endif
                        <label> Nome do Evento* </label>
                        <input type="text" class="form-control"  value="{{old('event_name')}}" name="event_name" required="">
                    </div>
                    <div class="form-group">
                        <label>Descrição do agendamento</label>
                        <textarea name="description" class="form-control" value="">{{ old('description') }}</textarea>
                        <!-- <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}"> -->
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                            <label> Data de Início* </label>
                            <input type="datetime-local"  value="{{old('start_date')}}" class="form-control" name="start_date" required="">
                    </div>
                    <div class="form-group col-md-6">
                            <label> Data de Término* </label>
                            <input type="datetime-local"  value="{{old('end_date')}}" class="form-control" name="end_date" required="">
                    </div>
                </div>
                    <button class="btn btn-success" type="submit"> Cadastrar </button>
                    <a href="{{route('calendar')}}"><button class="btn btn-primary">Voltar</button></a>
                </form>
            </div>




            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  
        </div>
        <div class="col h-100 p-3" style="margin: 0 auto; margin-top: -6em">
            <img src="{{asset('img-04.png')}}" alt="" class="icons-adc">
        </div>
    </div>  
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
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
     <script> 
            $(document).ready(function (){
                $('#vis-calendar').click();
                $('#reserv-calendar').parent('li').addClass("active");
            });                
        </script>
@endsection

<style type="text/css">
     div#index{
        margin: 0px 25px 0px 25px;
    }

    h2#titulo {
        color: #666;
    }
    .form-group{
        text-align: left;
    }
</style>