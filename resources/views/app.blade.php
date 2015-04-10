<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculadora Renda Fixa</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/rendafixa.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-60343512-1', 'auto');
      ga('send', 'pageview');
    </script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body role="document">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">{{ trans('navigation.toggle.navigation') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{ trans('navigation.rendaFixa') }}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li><a href="{{ url('indicador/selic') }}">{{ trans('navigation.selic') }}</a></li>
                    <li><a href="{{ url('indicador/cdi') }}">{{ trans('navigation.cdi') }}</a></li>
                    <li><a href="{{ url('indicador/ipca') }}">{{ trans('navigation.ipca') }}</a></li>
                    <li><a href="{{ url('indicador/igpm') }}">{{ trans('navigation.igpm') }}</a></li>
                    <li><a href="{{ url('indicador/tr') }}">{{ trans('navigation.tr') }}</a></li>
                    <li><a href="{{ url('indicador/poupanca') }}">{{ trans('navigation.poupanca') }}</a></li>
                    <li><a href="{{ url('sobre')}}">{{ trans('navigation.about') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" role="main">
        <div class="content">
            @yield('content')
        </div>
    </div>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    @yield('footer')
</body>
</html>
