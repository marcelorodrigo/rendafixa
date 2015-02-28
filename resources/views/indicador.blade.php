@extends('app')
@section('content')
    <h1>{{ $indicador->getName() }}</h1>
    <p class="lead">
        {{ $indicador->getValue() }} {{ $indicador->getUnit() }}
    </p>
    <span class="badge">{{ trans('indicador.base.date')}} {{ $indicador->getDate()->format('d/m/Y') }}</span>
    <div class="badge">{{ trans('indicador.updated')}} {{ $indicador->getUpdated()->format('d/m/Y H:i\h') }}</div>
@endsection
