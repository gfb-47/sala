@extends('layouts.appNoSideBar', ['pageSlug' => 'Usuarios'])

@section('content')
<div class="title-news" style="font-family: 90px;">
    <p>Notícias</p>
</div>
<div class="carousel" data-flickity='{ "autoPlay": true  }'>
    <div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div>
    <div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div>
    <div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div>
    <div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div>
    <div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div><div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div><div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div><div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div><div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div><div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
            </div>
        </div>
    </div><div class="carousel-cell">
        <div class="carrousel-card">
            <img src="{{ asset('img') }}/remedio.png" alt="" height=auto width=250>
            <div class="container">
                <h4><b>25 de Setembro</b></h4>
                <p>Unitins é campeã</p>
                <p>Unitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeãUnitins é campeã</p>
                <p>Saiba mais</p>
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