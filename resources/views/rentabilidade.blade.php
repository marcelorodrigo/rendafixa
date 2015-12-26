@extends('app-angular')
@section('content')
<div ng-controller="RentabilidadeController">
    <h2>Qual rentabilidade preciso?</h2>
    <p>A calculadora abaixo permite você descobrir a qual rentabilidade precisa aplicar um determinado valor para conseguir um valor final definido.</p>
    <div class="col-md-4">
        <div class="form-group">
            <label for="valor-inicial">Valor inicial</label>
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="text" class="form-control" id="valor-inicial" placeholder="Valor inicial" class="mask-money" ng-model="valorInicial" ng-change="calculate()"/>
            </div>
        </div>
        <div class="form-group">
            <label for="valor-final">Valor final</label>
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="text" class="form-control" id="valor-final" placeholder="Valor final" class="mask-money" ng-model="valorFinal" ng-change="calculate()"/>
            </div>
        </div>
        <div class="form-group">
            <label for="prazo">Prazo</label>
            <div class="input-group">
                <input type="number" class="form-control" id="prazo" placeholder="Prazo" min="1" ng-model="prazo" ng-change="calculate()"/>
                <div class="input-group-addon">meses</div>
            </div>
        </div>
        <div class="form-group">
            <label for="di">{{ trans('simulador.taxa.di') }} <a href="http://www.cetip.com.br" target="_blank" title="Cetip">?</a></label>
            <div class="input-group">
                <input type="input" class="form-control" id="di" placeholder="{{ trans('simulador.taxa.di') }}" ng-model="di" ng-change="calculate()"/>
                <div class="input-group-addon">% {{trans('simulador.ao.ano')}}</div>
            </div>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" class="form-control" id="ir" ng-model="ir" ng-change="calculate()" />
                Imposto de renda?
            </label>
        </div>
    </div>
    <div class="col-md-offset-1 col-md-6">
        <div id="results">
            <p>Valor bruto: R$ @{{result.valorBruto}}</p>
            <p>Alíquota de Imposto de Renda: @{{result.ir}}%</p>
            <p>Taxa Pré-fixada: @{{result.pre}}% a.a.</p>
            <p>Taxa Pós-fixada: @{{result.pos}}% do DI</p>
        </div>
    </div>

    <input type="hidden" id="default-di" value="{{$cdi}}" />
</div>
@endsection
@section('footer')
    <script type="text/javascript" src="/js/math.min.js"></script>
    <script type="text/javascript" src="/js/calculadora-rentabilidade.js?1"></script>
@endsection
