@extends('master')
@section('conteudo')
    <!-- Começo de pagina Home -->
    <section class="container">

        <div class="header">
            <h1 class="logo">Disparos</h1>
            <a class="botao_disparo" onclick="on()">Criar novo Disparo</a>
        </div>

        <div class="emails">
            @if ( !empty($emails))
                @foreach($emails as $email)
                    <div class="item_email">

                        <div class="titulo">{{$email->titulo}}</div>

                        <div class="line"></div>

                        <div class="conteudo_card">
                            <div class="card_remetente">
                                <div>Remetente</div>
                                <div style="color: #81858E; font-weight: 400;">{{$email->email_remetente}}</div>
                            </div>
                            <div class="card_status">
                                <div>Status</div>
                                @if($email->status == 1)
                                    <div class="inline_icon">
                                        <div style="color: #2BBA53;">Enviado</div>
                                        <img class="align_icon" width="18px" src="{{asset('../images/done.png')}}" alt="done" srcset="">
                                    </div>
                                @elseif($email->status == 2)
                                    <div class="inline_icon">
                                        <div style="color: #FABB1B;">Aguardando envio</div>
                                        <img class="align_icon" width="18px" src="{{asset('../images/clock.png')}}" alt="done" srcset="">
                                    </div>
                                @else
                                    <div class="inline_icon">
                                        <div style="color: #F61A4F;">Erro ao enviar</div>
                                        <img class="align_icon" width="18px" src="{{asset('../images/block.png')}}" alt="done" srcset="">
                                    </div>
                                @endif

                            </div>
                            <div class="card_data">
                                <div>Modificado em</div>
                                <div style="color: #81858E; font-weight: 400;"> {{ date("d/m/Y H:i", strtotime($email->updated_at))}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h1>Não há emails</h1>
            @endif

        </div>

    </section>
    <!-- Fim de pagina home -->


    <!-- Sessao de Overlay -->
    <div id="overlay">
        <form id="envioForm" action="{{ route('email.enviar') }}" method="post" onsubmit="on_ok()">
            @csrf
            <div class="body_criacao">
                <div class="container_criacao">
                    <div class="header_criacao">
                        <h2 class="titulo_criacao">Crie seu novo disparo</h2>
                        <button type="submit" class="botao_sair" onclick="off()">X</button>
                    </div>

                    <div class="line"></div>

                    <div class="conteudo_criacao">
                        <div class="email_criacao_titulo">
                            <label>Titulo</label>
                            <input type="text" name="titulo" class="input_criacao" placeholder="Preencha o título do email" required>
                        </div>
                        <div class="email_criacao_remetente">
                            <label for="">Remetente</label>
                            <input type="email" name="email_remetente" class="input_criacao" placeholder="remetente@mail.com" required>
                        </div>
                        <div class="email_criacao_destinatario">
                            <label for="">E-mails dos destinatários</label>
                            <textarea name="email_destinatario" cols="30" rows="5" class="input_criacao_destinatario" placeholder="example@org.br, example2@teste.com" required></textarea>
                        </div>
                        <div class="email_criacao_conteudo">
                            <label for="">Conteúdo do e-mail</label>
                            <textarea name="assunto" id="mytextarea" cols="30" rows="5" class="input_criacao_destinatario" placeholder="Conteúdo aqui"></textarea>
                        </div>
                    </div>

                    <div class="botao_criar">
                        <a class="botao_disparo_cancelar" onclick="off()">Cancelar</a>
                        <input class="botao_disparo_criar" type="submit" value="Criar agora" onclick="validateForm()">
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!-- Fim de Sessao de Overlay -->

    <!-- Inicio Retorno de agendamento -->
    <div id="overlay_ok">
        <div class="body_ok">
            <div class="header_criacao_ok">
                <button type="submit" class="botao_sair" onclick="off_ok()">X</button>
            </div>
            <img class="icon_sent" width="40px" height="40px" src=" {{ asset('../images/sent.png') }}" alt="enviado" srcset="">
            <div class="retorno_ok">
                <h2>Parabéns, seu envio foi agendado</h2>
            </div>
            <h4 class="_label" style="color: #81858E; font-weight: 400;">Acompanhe as atualizações do seu envio na listagem de disparos</h4>
            <a class="botao_criacao_entendido" onclick="off_ok()">Entendido</a>
        </div>
    </div>
    <!-- Fim Retorno de agendamento-->
@endsection
