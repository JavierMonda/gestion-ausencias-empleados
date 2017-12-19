<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Oasis App') }}</title>

		<!-- Bootstrap -->
        {!! Html::style('vendor/fullcalendar/fullcalendar.css') !!}

        
        
    </head>
    <body>
            <div class="container">
                <div id="calendar"></div>
            </div> 
   
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        {!! Html::script('vendor/fullcalendar/lib/jquery.min.js') !!}
        {!! Html::script('vendor/fullcalendar/lib/jquery-ui.min.js') !!}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 
        
        {!! Html::script('vendor/fullcalendar/lib/moment.min.js') !!}
        
        
        {!! Html::script('vendor/fullcalendar/fullcalendar.min.js') !!}


        <script>
        $(document).ready(function() {
            var BASEURL = "{{ url('/') }}";
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectHelper: true,
                select: function(start){
                    start = moment(start.format());
                    $('#date_start').val(start.format('YYYY-MM-DD'));
                    $('#responsive-modal').modal('show');
                },
                events: BASEURL + '/events'
            });
 
        });
    </script>
    </body>



        
</html>

