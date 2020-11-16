<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css') }}/errorPage.css" rel="stylesheet" />
    </head>
        <body>
            <div>
                <h1 style="">
                  {{$code}}
                </h1>
                <h2>
                    OOOOOOOPS!!!
                </h2>
                <h3>
                    <br>Parece que deu algo errado...</br>
                    Clique no botão abaixo para voltar para a página inicial.
                </h3>
                    <div class="wrap">
                    <form action="{{route('index.index')}}">
                        <button class="button">Voltar</button>
                    </form>
                    </div>
            </div>
        </body>
        
</html>
