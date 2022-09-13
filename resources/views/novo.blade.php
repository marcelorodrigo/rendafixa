@extends('app')
@section('content')
<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Novo site!</h4>
    <p class="mb-0">A calculadora de renda fixa agora está hospedada no Github <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
        </svg></p>
    <div>Em 25 de agosto a Heroku <a href="https://blog.heroku.com/next-chapter" rel="noopener">anunciou</a> que não
        oferecerá mais suporte a projetos open source <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heartbreak" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.867 14.41c13.308-9.322 4.79-16.563.064-13.824L7 3l1.5 4-2 3L8 15a38.094 38.094 0 0 0 .867-.59Zm-.303-1.01c6.164-4.4 6.91-7.982 6.22-9.921C14.031 1.37 11.447.42 9.587 1.368L8.136 3.18l1.3 3.468a1 1 0 0 1-.104.906l-1.739 2.608.971 3.237Zm-1.25 1.137a36.027 36.027 0 0 1-1.522-1.116C-5.077 4.97 1.842-1.472 6.454.293c.314.12.618.279.904.477L5.5 3 7 7l-1.5 3 1.815 4.537Zm-2.3-3.06C.895 7.797.597 4.875 1.308 3.248c.756-1.73 2.768-2.577 4.456-2.127L4.732 2.36a1 1 0 0 0-.168.991L5.91 6.943l-1.305 2.61a1 1 0 0 0-.034.818l.442 1.106Z"/>
        </svg></div>
    <div><br />Sabemos que é incomodo ter um novo endereço, então anote aí <a href="https://rendafixa.github.io/?utm_source=heroku&utm_medium=new&utm_campaign=newproject" title="Calculadora Renda Fixa" class="alert-link">https://rendafixa.github.io</a><br />
        Nosso projeto <a href="https://rendafixa.github.io/?utm_source=heroku&utm_medium=new&utm_campaign=newproject"
                         title="Calculadora Renda Fixa" class="alert-link">Calculadora Renda Fixa</a>
        está sendo hospedado pelo GitHub que oferece o que precisamos
        para manter o nosso projeto no ar :)</div>
    <p><br />O site atual será desativado automaticamente pela Heroku em 28 de novembro de 2022</p>
    <hr>
    <button type="button" class="btn btn-outline-success" onclick="window.location.href='https://rendafixa.github.io/?utm_source=heroku&utm_medium=new-button&utm_campaign=newproject'">
        https://rendafixa.github.io/
    </button>
</div>
@endsection
