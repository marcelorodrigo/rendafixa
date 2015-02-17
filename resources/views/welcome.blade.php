@extends('app')
@section('content')
    <h2>Simulador de Investimentos</h2>
    <div class="col-md-4">
        <form>
            <input type="hidden" name="poupanca" id="poupanca" value="{{ $poupanca }}" />
            <div class="form-group">
                <label for="amount">Valor da Aplicação</label>
                <div class="input-group">
                    <div class="input-group-addon">R$</div>
                    <input type="number" class="form-control" id="amount" placeholder="Valor da Aplicação" value="1000"
                           min="1"/>
                    <div class="input-group-addon">.00</div>
                </div>
            </div>
            <div class="form-group">
                <label for="period">Período</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="period" placeholder="Período" value="12" min="1"
                           max="1200"/>
                    <div class="input-group-addon">meses</div>
                </div>
            </div>
            <div class="form-group">
                <label for="di">Taxa DI <a href="http://www.cetip.com.br" target="_blank">?</a></label>
                <div class="input-group">
                    <input type="number" class="form-control" id="di" placeholder="Taxa DI" value="{{$cdi}}" min="0"
                           max="100"/>
                    <div class="input-group-addon">% ao ano</div>
                </div>
            </div>
            <!--
            <div class="form-group">
                <label for="di">Taxa Administrativa</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="di" placeholder="Taxa Administrativa" value="0"
                           min="0" max="100"/>
                    <div class="input-group-addon">% ao ano</div>
                </div>
            </div>
            -->
            <div class="form-group">
                <label for="cdb">CDB</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="cdb" placeholder="Rendimento CDB" value="83" min="0"
                           max="100"/>
                    <div class="input-group-addon">% DI</div>
                </div>
            </div>
            <div class="form-group">
                <label for="lci">LCI/LCA</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="lci" placeholder="Rendimento LCI/LCA" value="91"
                           min="0" max="100"/>
                    <div class="input-group-addon">% DI</div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-offset-1 col-md-6">
        <div id="results">
            <h3>Rentabilidade</h3>
            <p>Veja como fica a rentabilidade do seu invesimento conforme o tipo de aplicação:</p>
            <hr />
            <div id="result-poupanca">
                <h4>Poupança</h4>
                Valor Líquido: R$ <span class="liquido">0</span><br />
                <div class="progress">
                    <div id="bar-poupanca" class="progress-bar progress-bar-danger" role="progressbar"
                         style="width: 0%; min-width: 2em;">
                        0%
                    </div>
                </div>
            </div>
            <div id="result-cdb">
                <h4>CDB</h4>
                Valor Total: R$ <span class="total">0</span><br />
                Imposto de Renda: R$ <span class="ir">0</span><br />
                Valor Líquido: R$ <span class="liquido">0</span><br />
                <div class="progress">
                    <div id="bar-cdb" class="progress-bar progress-bar-info" role="progressbar"
                         style="width: 0%; min-width: 2em;">
                        0%
                    </div>
                </div>
            </div>
            <div id="result-lci">
                <h4>LCI</h4>
                Valor Líquido: R$ <span class="liquido">0</span><br />
                <div class="progress">
                    <div id="bar-lci" class="progress-bar progress-bar-success" role="progressbar"
                         style="width: 0%; min-width: 2em;">
                        0%
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript" src="/js/calculadora.js"></script>
@endsection
