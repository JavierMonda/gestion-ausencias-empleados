<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Oasis App') }}</title>

		<!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
        {!! Html::style('vendor/fullcalendar/fullcalendar.min.css') !!}


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
    	<header>
    		@extends('partials.navbar')
    	</header>

    	<section>
            @yield('content')
        </section>

    	<footer class="footer">
    		@extends('partials.footer')
    	</footer>





        {!! Html::script('vendor/fullcalendar/lib/jquery.min.js') !!}
        {!! Html::script('vendor/fullcalendar/lib/jquery-ui.min.js') !!}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

        {!! Html::script('vendor/fullcalendar/lib/moment.min.js') !!}


        {!! Html::script('vendor/fullcalendar/fullcalendar.min.js') !!}
        {!! Html::script('vendor/fullcalendar/locale/es.js') !!}
        <script src="{{ asset('js/orden_tablas.js')}}"></script>




        <script>
             $(document).ready(function() {
                 var BASEURL = "{{ url('/') }}";
                 var ID = "{{ $trabajador->id }}"
                 $('#calendar').fullCalendar({
                     header: {
                         left: 'prev,next today',
                         center: 'title',
                         right: 'month,basicWeek,basicDay,listWeek'
                     },
                     navLinks: true, // can click day/week names to navigate views
                     editable: true,
                     selectable: true,
                     selectHelper: true,
                     events: BASEURL + '/events/' + ID,

                 });

             });
         </script>



    </body>
</html>
