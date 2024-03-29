<footer class="text-center text-lg-start mt-xl-5 pt-4">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="text-uppercase text-dark mb-4">Outras Páginas</h5>

                <ul class="list-unstyled mb-4">
                    <li>
                        <a href="{{ route('sobre') }}" class="text-dark text-decoration-none">Sobre</a>
                    </li>
                    <li>
                        <a href="{{ route('biblioteca') }}" class="text-dark text-decoration-none">Biblioteca Virtual</a>
                    </li>
                    <li>
                        <a href="{{ route('pedido_livro') }}" class="text-dark text-decoration-none">Fazer Pedido</a>
                    </li>
                    <li>
                        <a href="{{ route('eventos') }}" class="text-dark text-decoration-none">Eventos</a>
                    </li>
                    <li>
                        <a href="{{ route('contactos') }}" class="text-dark text-decoration-none">Contactos</a>
                    </li>
                    <li>
                        <a href="{{ route('noticias') }}" class="text-dark text-decoration-none">Notícias</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="text-uppercase text-dark mb-4">Termos e Condições</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('politica_privacidade') }}" class="text-dark text-decoration-none">Politica de
                            Privacidade</a>
                    </li>
                    <li>
                        <a href="{{ route('faqs') }}" class="text-dark text-decoration-none">Preguntas Frequentes</a>
                    </li>
                    <li>
                        <a href="{{ route('termos_e_condicoes') }}" class="text-dark text-decoration-none">Termos e
                            condiçoes</a>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <img src="{{ asset('images/logo/SVG/logo.svg') }}" alt="logotipo" width="100px" style="opacity: 0.75;">
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="text-uppercase text-dark mb-4">Subscreve a nossa newsletter</h5>
                <form action="#">
                    <div class="form-outline form-dark mb-3">
                        <input type="email" id="form5Example2" class="form-control" placeholder="Email" required />
                    </div>
                    <button type="submit" class="btn btn-outline-dark btn-block">Subscrever</button>
                </form>

            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 border-top border-dark text-dark">
        © 2023 Copyright
        <a class="text-dark text-decoration-none" href="#">LeiriBook</a>
    </div>
    <!-- Copyright -->
</footer>
