@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<title>Agendar Laboratório</title>
<div class="container-fluid">
    <div class="row h-100 p-3" style="margin-top: -11%" >
        <div class="col">
            <div style="margin-top: 6em;">
                <h2 id="titulo" align="left">Editar Reserva de Laboratório</h2>
                <br>
                <!-- Mensagens de Erro -->
                @if($errors->all())
                     <ol class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        @foreach($errors->all() as $error)
                    
                            <li>{{$error}}</li>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        @endforeach
                    </ol>
                @endif
                 
                 <form action="{{route('calendar.update',$event->id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success')}}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-danger">{{ Session::get('warnning')}}</div>
                        @endif

                        <label> Nome do Agendamento* </label>
                        <input type="text" class="form-control"  value="{{old('event_name',$event->event_name ?? '')}}" name="event_name" id="event_name" required="">
                        @if ($errors->has('event_name')) 
                            <script >
                                $('#event_name').addClass('alert-danger');                                            
                            </script>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Descrição do Agendamento</label>
                        <textarea name="description" id="description" class="form-control" value="">{{ old('description',$event->description ?? '') }}</textarea>
                        @if ($errors->has('description')) 
                            <script >
                                $('#description').addClass('alert-danger');                                            
                            </script>
                        @endif
                        <!-- <input type="hidden"  name="cham_data_chamado"  value="{{date('Y-m-d H:i:s')}}"> -->
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Sala*</label>
                            <select name="event_sala" id="event_sala" class="form-control">
                                <option hidden></option> 
                                @foreach ($salas as $sala)
                                    @if (old('event_sala',$event->event_sala ?? '') == $sala->sala_id)
                                        <option value="{{$sala -> sala_id}}" selected> {{substr($sala -> sala_andar, -1)}} - {{$sala -> sala_identificacao}}</option>
                                    @else
                                        <option value="{{$sala -> sala_id}}"> {{substr($sala -> sala_andar, -1)}} - {{$sala -> sala_identificacao}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('event_sala')) 
                                <script >
                                    $('#event_sala').addClass('alert-danger');                                            
                                </script>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label>Cor da Reserva*</label>
                            <input type="color"name="event_cor" id="color" class="form-control" value="{{$event->event_cor}}" style="height: 2em;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                <label> Data de Início* </label>
                                <input type="datetime-local"  value="{{old('start_date',str_replace(' ','T',$event->start_date) ?? '')}}" class="form-control" name="start_date" id="start_date" required="">
                                @if ($errors->has('start_date')) 
                                    <script >
                                        $('#start_date').addClass('alert-danger');                                            
                                    </script>
                                @endif                                
                        </div>
                        <div class="form-group col-md-6">
                                <label> Data de Término* </label>
                                <input type="datetime-local"  value="{{old('end_date',str_replace(' ','T',$event->end_date) ?? '')}}" class="form-control" name="end_date" id="end_date" required="">
                                @if ($errors->has('end_date')) 
                                    <script >
                                        $('#end_date').addClass('alert-danger');                                            
                                    </script>
                                @endif
                        </div>
                    </div>
                    <!-- <input type="hidden" name="_method" value="put"> -->
                    <button class="btn btn-success" type="submit"> Atualizar </button>
                </form>
            </div>  
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
        <script type="text/javascript"> 
                $('#vis-calendar').click();
            $(document).ready(function (){
                // $('#reserv-calendar').parent('li').addClass("active");
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
</style>