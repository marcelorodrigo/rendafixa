<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculadora Renda Fixa</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/rendafixa.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-60343512-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-60343512-1');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    <li><a href="{{ url('novo') }}" class="text-primary"><strong>Novo Site (preview)</strong></a></li>
                    <li><a href="{{ url('rentabilidade') }}">Encontrar rentabilidade</a></li>
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
