<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />




        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>


        <div class="position-ref full-height col-lg-12">
            <div class="flex-center">
                <img style="" src="/img/logo.png" width="200" height="120" alt="logo" title="logo"><br><br>
            </div>
            <div class="col-md-12">
                <br><br><br><br><br>
                <p class="col-md-12 font-weight-bold" style="position:relative;"> Certificado {{$certificado->idCertificado}} validado eletronicamente as {{\Carbon\Carbon::now('America/Maceio')->format('H:i:s')}} do dia {{\Carbon\Carbon::now('America/Maceio')->format('d/m/Y')}}
                para a empresa x relativo aos descartes abaixo:
                </p>
            </div>

            <div class="col-md-12">
                <table class="col-md-12" >
                    <tr  style="border: 1px solid">
                        <th style="min-width: 100px;">Empresa</th>
                        <th>Data do descarte</th>
                        <th>Manifesto</th>
                        <th>Endereço</th>
                        <th>Quantidade</th>
                    </tr>
                    @foreach($coletas->items as $coleta)
                    <tr style="border-bottom: 1px solid">
                        <td>{{$coleta["transportador"]["nomeRazaoSocial"]}}</td>
                        <td>{{(new \Carbon\Carbon($coleta["dataEmissao"]))->format('d-m-Y')}}</td>
                        <td>{{$coleta["numeroTransportador"]}}</td>
                        <td>{{$coleta["obra"]["descricao"]}}</td>
                        <td>@foreach((object)$coleta["itens"]["items"] as $d)
                                <p>{{$d["descricao"]}} : {{$d["qtde"]}}m³</p>
                            @endforeach
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>




        </div>
    </body>
</html>
