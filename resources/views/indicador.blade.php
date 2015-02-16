@extends('app')
@section('content')
    <h1>{{ $indicador->getName() }}</h1>
    <p class="lead">{{ $indicador->getValue() }} {{ $indicador->getUnit() }}</p>
    <div>{{ trans('navigation.updated')}} {{ $indicador->getDate()->format('d/m/Y') }}</div>
@endsection
