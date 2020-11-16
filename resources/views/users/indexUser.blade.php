@extends('layouts.appNoSideBar', ['pageSlug' => 'Usuarios'])

@section('content')
<div class="title-news" style="font-family: 90px;">
    <p>Notícias</p>
</div>
<div class="carousel" data-flickity='{ "autoPlay": true  }'>
    <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div>
    <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div> <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div> <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div> <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div> <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div> <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div> <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div> <div class="carousel-cell">
        <div class="carousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=280>
            <div class="carousel-body">
                <h4><b>25 de Setembro</b></h4>
                <hr class="carousel-news">
                <h2>Unitins é a campeã</h2>
                <h5>Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.Unitins é campeã do primeiro campeonato mundial de universidades tocantinenses do sul do brasil.</h5>
                <h2 class="saiba-mais">Saiba mais</h2>
            </div>
        </div>
    </div>
</div>
<script>
var elem = document.querySelector('.main-carousel');
var flkty = new Flickity(elem, {
    // options
    cellAlign: 'left',
    contain: true
});
// element argument can be a selector string
//   for an individual element
var flkty = new Flickity('.main-carousel', {
    // options
});
// Modal Image Gallery
function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("modal01").style.display = "block";
    var captionText = document.getElementById("caption");
    captionText.innerHTML = element.alt;
}
// Change style of navbar on scroll
window.onscroll = function() {
    myFunction()
};

function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}
// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
@endsection