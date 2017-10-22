@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
<div id="myCarousel" class="carousel slide card" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="http://res.cloudinary.com/santa-ifigenia-conectada/image/upload/c_scale,h_400,q_90,w_1200/v1508634969/4aee2f3329fda644c85a464100b804cf_sumjg2.jpg" alt="Image">
            <div class="carousel-caption">
                <h3 class="text-bordered">A CASA</h3>
                <p class="text-bordered">QUE VOCÊ SEMPRE SONHOU...</p>
            </div>
        </div>

        <div class="item">
            <img src="http://res.cloudinary.com/santa-ifigenia-conectada/image/upload/c_scale,h_400,q_90,w_1200/v1508635003/IMOVEIS_luul6m.jpg" alt="Image">
            <div class="carousel-caption">
                <h3 class="text-bordered">SEM BUROCRACIA</h3>
                <p class="text-bordered">ESCOLHA, PAGUE E PEGUE AS CHAVES!</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center m-b-25">
    <div class="row">
        <div class="col-sm-8">
            <h3 class="home-section-h">Anúncios em Destaque</h3>
            <featured-ads></featured-ads>
        </div>
        <div class="col-sm-4">
            <h3 class="home-section-h">Sobre Nós</h3>
            <div class="well card">
                <p class="text-left">
                    Pitchfork banh mi pok pok bicycle rights church-key fam kitsch edison.
                    Bulb taiyaki helvetica plaid gochujang you probably haven't heard of them next level jean shorts.
                    Drinking vinegar hella biodiesel narwhal humblebrag raw denim live-edge listicle occupy kogi.
                    Tattooed everyday carry jean shorts paleo hot chicken beard offal trust fund, poutine organic.
                    Literally meditation crucifix tilde kitsch.
                </p>
                <p class="text-left">
                    +1 helvetica mustache mlkshk.
                    Narwhal thundercats chambray activated charcoal.
                    Truffaut ennui taiyaki poke actually.
                    Ennui four loko skateboard tumblr keffiyeh post-ironic pour-over snackwave pinterest.
                    Cornhole tilde cliche, hexagon edison bulb affogato williamsburg kinfolk scenester.
                    Pitchfork fashion axe migas typewriter health goth pork belly squid.
                    Semiotics microdosing taxidermy butcher godard hell of wayfarers vegan.
                </p>
                <blockquote>
                    <p>
                        Os melhores preços das melhores imobiliárias.
                    </p>
                    <footer>CEO</footer>
                </blockquote>
                <p class="text-left">
                    La croix cardigan subway tile prism woke 3 wolf moon cold-pressed.
                    Chia food truck taiyaki tofu keffiyeh pabst.
                    Fanny pack flexitarian activated charcoal everyday carry, single-origin coffee bespoke.
                    Cloud bread kombucha street art listicle venmo VHS vegan glossier wayfarers.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection