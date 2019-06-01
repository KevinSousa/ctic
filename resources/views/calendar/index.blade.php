@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<div id="index">
    <div id="titulo" align="left">

    </div>
    <div class="row justify-content-md-left">
        <div id="calendar" class="col col">
            {!! $calendar_details -> calendar() !!}
            {!! $calendar_details->script() !!}
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

          <script> 
            $(document).ready(function (){
                $('#vis-calendar').click();
                $('#visu-calendar').parent('li').addClass("active");
            });                
        </script>
@endsection

<style type="text/css">
    div#index {
        margin: 0px 25px 0px 25px;
    }

    div#calendar {
        margin: 0px 80px 10px 80px;
        padding: 15px;
        border-radius: 5px;
    }
</style>