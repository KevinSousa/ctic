@extends( (!$ajax) ? 'layouts.app' : 'layouts.ajax')
@section('content')
<div class="container">
        <div class="row justify-content-md-left" style="width: 73em; " align="center">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="backgroud:#2e6da4; color:white;">
                        <!-- Event Calendar [Full - Calendar] -->
                    </div>
                    <div class="panel-body" id="calendar">
                        {!! $calendar_details -> calendar() !!}
                        {!! $calendar_details->script() !!}
                    </div>
                </div>
            </div>
        </div>
</div>
<!--     <div class="row justify-content-md-left" style="width: 810px; height: 500px;" align="center">
        <div id="calendar" class="col col" >
             {!! $calendar_details -> calendar() !!}
            {!! $calendar_details->script() !!}
        </div>
    </div> -->
@endsection

@section('js')
     <!-- Jquery JS-->
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
            $('#vis-calendar').click();
            $(document).ready(function (){
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