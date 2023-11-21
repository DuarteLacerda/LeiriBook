@extends('layout.master')
@section('title', 'LeiriBook-Política de Privacidade')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/vanessa.politica_privacidade.css') }}">
@endsection
@section('content')
    <div class="text-center m-5" id="primeiro">
        <h2>Política de Privacidade</h2>
    </div>

    <div class="container">

        <div class="card" id="segundo">
            <div class="card-header">Data de Atualização: 15/11/2023</div>
            <div class="card-body">
                <h4 class="card-title">Informações Gerais</h4>
                <p class="card-text">Mediante a disponibilização do website alojado em <a
                        href="#">www.leiribook.pt</a> e os seus serviços e
                    comunicações, a LeiriBook poderá solicitar ao Utilizador que disponibilize dados pessoais, isto é,
                    informações fornecidas pelo Utilizador que permitam à LeiriBook identificá-lo ou contactá-lo.
                    <br>Através da presente Política de Privacidade, a LeiriBook presta ao Utilizador, nos termos do seu
                    direito à informação estatuído no Regulamento Geral sobre a Proteção de Dados (Regulamento (UE)
                    2016/679, do Parlamento Europeu e do Conselho, de 27 de abril de 2016) e na Lei de Proteção de Dados
                    Pessoais (Lei n.º 58/2019, 8 de agosto), informações detalhadas acerca da natureza dos dados recolhidos
                    e acerca da finalidade e do tratamento que será realizado relativamente aos seus Dados Pessoais.
                </p>
            </div>
        </div>

        <div class="card bg-light" id="scrollCard">
            <h4>Tratamento de Dados Pessoais<button class="arrow float-right"><img
                        src="{{ asset('images/vanessa/arrow.png') }}" height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">A LeiriBook compromete-se a proteger a sua privacidade, de modo a recolher e processar
                    apenas dados essenciais, com total transparência e base no seu consentimento.<br> Garantimos a segurança
                    dos seus dados, permitindo-lhe acesso e correção quando necessário.<br>Não partilhamos informações sem
                    consentimento, asseguramos a conformidade com a legislação de privacidade e iremos entrar em contacto
                    quando existirem eventuais violações de dados pessoais.<br>O armazenamento de dados é limitado ao
                    necessário, e atualizamos periodicamente esta política para refletir práticas de privacidade
                    atualizadas.</p>
            </div>
        </div>

        <div class="card bg-light" id="scrollCard1">
            <h4>Comunicação de Dados<button class="arrow float-right"><img src="{{ asset('images/vanessa/arrow.png') }}"
                        height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">Garantimos transparência e segurança na comunicação de dados, pretendemos partilhar as
                    informações apenas com consentimento ou quando necessário.<br>Temos medidas de segurança robustas para
                    proteger a integridade dos dados.<br>Comprometemo-nos a cumprir a legislação de privacidade, notificando
                    de forma clara qualquer partilha adicional de dados.<br>Atualizamos regularmente esta abordagem para
                    refletir as melhores práticas e assegurar a proteção de um modo contínuo dos seus dados pessoais.</p>
            </div>
        </div>


        <div class="card bg-light" id="scrollCard2">
            <h4>Princípios Gerais Aplicáveis ao Tratamento de Dados Pessoais<button class="arrow float-right"><img
                        src="{{ asset('images/vanessa/arrow.png') }}" height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">O tratamento de dados pessoais baseia-se em princípios fundamentais, incluindo
                    licitude, lealdade e transparência.<br>A coleta é limitada a finalidades específicas, com dados mínimos
                    e precisos.<br>A retenção é restrita ao necessário, garantindo a integridade e confidencialidade por
                    meio de medidas de segurança.<br>A responsabilidade do tratamento inclui a prestação de contas e a
                    conformidade com a legislação de privacidade, assegurando a proteção dos direitos dos titulares de
                    dados.</p>
            </div>
        </div>


        <div class="card bg-light" id="scrollCard3">
            <h4>Legitimidade para o Tratamento de Dados Pessoais<button class="arrow float-right"><img
                        src="{{ asset('images/vanessa/arrow.png') }}" height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">O tratamento de dados pessoais baseia-se em princípios de legitimidade, exigindo uma
                    base legal clara.<br>A obtenção do consentimento do titular é uma fonte comum de legitimidade, sendo
                    este informado e obtido para finalidades específicas.<br>Além do consentimento, a execução de contratos,
                    o cumprimento de obrigações legais, a proteção de interesses vitais, o exercício de funções de interesse
                    público ou o exercício de autoridade oficial são outras bases legítimas para o tratamento de dados
                    pessoais.<br>A clareza na identificação da base legal é essencial para assegurar a conformidade com as
                    normas de privacidade e garantir a proteção dos direitos dos titulares de dados.</p>
            </div>
        </div>

        <div class="card bg-light" id="scrollCard3">
            <h4>Prazo de Conservação dos Dados Pessoais<button class="arrow float-right"><img
                        src="{{ asset('images/vanessa/arrow.png') }}" height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">Os dados pessoais são conservados apenas pelo período estritamente necessário para
                    alcançar os objetivos para os quais foram recolhidos.<br>Este prazo varia consoante a finalidade do
                    tratamento, respeitando as exigências legais, regulamentares ou contratuais.<br>Uma vez atingido o
                    propósito inicial, os dados são eliminados ou anonimizados, garantindo a conformidade com os princípios
                    de minimização de dados e limitação de armazenamento.<br>A definição clara e a revisão regular destes
                    prazos asseguram a gestão responsável e ética dos dados pessoais, promovendo a privacidade e a segurança
                    da informação.</p>
            </div>
        </div>

        <div class="card bg-light" id="scrollCard3">
            <h4>Finalidades do Tratamento de Dados Pessoais<button class="arrow float-right"><img
                        src="{{ asset('images/vanessa/arrow.png') }}" height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">O tratamento de dados pessoais é realizado com diversos objetivos específicos e
                    legítimos, sendo crucial a transparência na comunicação dessas finalidades aos titulares dos
                    dados.<br>As finalidades podem incluir a execução de contratos, cumprimento de obrigações legais,
                    proteção de interesses vitais, exercício de funções de interesse público, e outras finalidades
                    claramente definidas.<br>É essencial que a recolha e utilização dos dados estejam alinhadas com as
                    finalidades declaradas, garantindo assim a conformidade com os princípios de licitude, lealdade e
                    transparência no tratamento de dados pessoais.</p>
            </div>
        </div>

        <div class="card bg-light" id="scrollCard3">
            <h4>Medidas Técnicas, Organizativas e de Segurança Implementadas<button class="arrow float-right"><img
                        src="{{ asset('images/vanessa/arrow.png') }}" height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">Para garantir a proteção efetiva dos dados pessoais, são implementadas medidas técnicas
                    e esas serão mais organizadas.<br>No âmbito das medidas técnicas, incluem-se a utilização de sistemas de
                    encriptação, firewalls e outras tecnologias de segurança da informação.<br>A nível organizativo, são
                    estabelecidos protocolos internos para o tratamento seguro de dados, com atribuição clara de
                    responsabilidades.<br>Na parte de controlar os acessos, as auditorias regulares e a formação contínua do
                    pessoal são elementos-chave para assegurar a conformidade com os princípios de integridade e
                    confidencialidade dos dados.<br>Estas medidas são dinamicamente ajustadas em resposta às evoluções
                    tecnológicas e ameaças potenciais, visando garantir a segurança contínua dos dados pessoais.</p>
            </div>
        </div>

        <div class="card bg-light" id="scrollCard3">
            <h4>Transferência de Dados para Fora da União Europeia<button class="arrow float-right"><img
                        src="{{ asset('images/vanessa/arrow.png') }}" height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">Quando ocorre a transferência de dados pessoais para fora da União Europeia (UE), são
                    adotadas medidas específicas para garantir a proteção adequada desses dados.<br>A conformidade com os
                    requisitos legais, como a implementação de Cláusulas Contratuais Tipo da Comissão Europeia ou outras
                    entidades reconhecidas, é essencial. A LeiriBook certifica-se de que a legislação do país de destino
                    oferece um nível de proteção igual ao estabelecido na UE.<br>A transparência e a comunicação clara sobre
                    essas transferências são mantidas para informar os titulares dos dados sobre o processo e garantir a
                    conformidade contínua com as normas de privacidade e segurança.</p>
            </div>
        </div>

        <div class="card bg-light" id="scrollCard3">
            <h4>Utilização de Cookies<button class="arrow float-right"><img src="{{ asset('images/vanessa/arrow.png') }}"
                        height="40" width="40" /></button></h4>
            <div class="content">
                <p class="card-text">Ao utilizarmos cookies, melhoramos a sua experiência online.<br>Os cookies são pequenos
                    ficheiros de texto armazenados no seu dispositivo que nos ajudam a entender como interage com o nosso
                    site.<br>Utilizamos cookies para personalizar conteúdo, analisar padrões de tráfego, e fornecer anúncios
                    direcionados.<br>Qualquer utilizador pode controlar as suas preferências de cookies nas configurações do
                    navegador.<br>Ao continuar a utilizar o site, acaba por concordar com a nossa política de
                    cookies.<br>Esta abordagem visa otimizar a sua interação online, respeitando as suas preferências e
                    garantindo transparência no uso de tecnologias semelhantes.</p>
            </div>
        </div>
    </div>

@section('scripts')
    <script src="{{ asset('js/vanessa.politica_privacidade.js') }}"></script>
@endsection
@endsection
