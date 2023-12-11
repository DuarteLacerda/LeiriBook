@extends('layout.master')
@section('title', 'LeiriBook-Biblioteca')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/ribeiro.css') }}">
@endsection

@section('content')
    <div id="large-th">
        <div class="container">
            <h1>Biblioteca</h1>
            <br>
            <div id="list-th">
                @forelse ($livros as $livro)
                    <div class="book">
                        <div class="cover">
                            <img
                                src="https://upload.wikimedia.org/wikipedia/pt/8/86/Mein_Kampf.png">
                        </div>
                        <div class="description">
                            <p class="title">{{ $livro->titulo }}<br>
                                <span class="author">{{ $livro->autor }}</span>
                            </p>
                        </div>
                    </div>
                    @empty
                    <p>Não há livros</p>
                @endforelse

                    <div class="book">
                        <div class="cover">
                            <img src="https://alysbcohen.files.wordpress.com/2015/01/little-princess-book-cover.jpg">
                        </div>
                        <div class="description">
                            <p class="title">A Little Princess<br>
                                <span class="author">Frances Hodgson Burnett</span>
                            </p>
                        </div>
                    </div>
                    <div class="book">
                        <div class="cover">
                            <img src="http://www.publishersweekly.com/images/data/ARTICLE_PHOTO/photo/000/028/28129-1.JPG">
                        </div>
                        <div class="description">
                            <p class="title">Roughing It<br>
                                <span class="author">Mark Twain</span>
                            </p>
                        </div>
                    </div>
                    <div class="book">
                        <div class="cover">
                            <img src="http://talkingwriting.com//sites/default/files/Bird-by-Bird-image1.jpg">
                        </div>
                        <div class="description">
                            <p class="title">Bird By Bird<br>
                                <span class="author">Anne Lamott</span>
                            </p>
                        </div>
                    </div>
                    <div class="book">
                        <div class="cover">
                            <img src="http://d.gr-assets.com/books/1414348859l/23209971.jpg">
                        </div>
                        <div class="description">
                            <p class="title">Girl at War<br>
                                <span class="author">Sara Novic</span>
                            </p>
                        </div>
                    </div>
                    <div class="book">
                        <div class="cover">
                            <img src="http://prodimage.images-bn.com/pimages/9780062315007_p0_v2_s192x300.jpg">
                        </div>
                        <div class="description">
                            <p class="title">The Alchemist<br>
                                <span class="author">Paulo Coelho</span>
                            </p>
                        </div>
                    </div>
                    <div class="book">
                        <div class="cover">
                            <img src="http://eastchapelhillobserver.com/wp-content/uploads/2015/02/amazondotcom.jpg">
                        </div>
                        <div class="description">
                            <p class="title">Anne of Green Gables<br>
                                <span class="author">Lucy Maud Montgomery</span>
                            </p>
                        </div>
                    </div>
                    <div class="book">
                        <div class="cover">
                            <img src="http://www.penguinbooksindia.com/sites/default/files/book_image/9780143416319.jpg">
                        </div>
                        <div class="description">
                            <p class="title">Animal Farm<br>
                                <span class="author">George Orwell</span>
                            </p>
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
