<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'EDUCOMSER')</title>
    

    <!-- Bootstrap Core CSS -->
    {!! Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}

    <!-- MetisMenu CSS -->
    {!! Html::style('vendor/metisMenu/metisMenu.min.css') !!}

    <!-- Custom CSS -->
    {!! Html::style('dist/css/sb-admin-2.css') !!}

    <!-- Custom Fonts -->
    {!! Html::style('vendor/font-awesome/css/font-awesome.min.css') !!}

    <!-- Estilos para las imagenes multiples -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css">

    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        
        @include('layouts.sidebar')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('title', 'EDUCOMSER')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {!! Html::script('vendor/jquery/jquery.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('vendor/bootstrap/js/bootstrap.min.js') !!}

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('vendor/metisMenu/metisMenu.min.js') !!}

    <!-- Custom Theme JavaScript -->
    {!! Html::script('dist/js/sb-admin-2.js') !!}

    <!-- Imagenes subir multiples -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

    @yield('javascript')
</body>

</html>
