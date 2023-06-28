@extends('layouts.app')

@section('page-title')
    Luis Mocha | Projects
@endsection


@section('content')


<div class="guestIndexContent">

    <div class="page-hero">

        <h1 class="type" style="--n:15;">My projects</h1>

        <div class="projects-presentation">
            <p>
                Benvenuti nella sezione dedicata ai miei progetti.
                <br>
                Ogni progetto è il frutto di passione, creatività e impegno.
                <hr>
                In questa sezione troverete una selezione dei miei progetti più significativi. Ogni progetto è stato sviluppato con cura, tenendo conto delle esigenze e dei desideri dei clienti, e mi ha permesso di ampliare le mie competenze e di affinare la mia abilità nel creare esperienze digitali coinvolgenti e funzionali.
                <hr>
                Vi invito a esplorare questa sezione dedicata ai miei progetti, nella quale troverete descrizioni dettagliate, immagini e, quando possibile, i link per visualizzare i siti web in azione. Spero che vi ispirino e vi offrano un'idea chiara delle mie competenze e della mia passione per lo sviluppo web.
            </p>
        </div>

        {{-- bottone link --}}
        <a href="#card-section">
            <button>
                <i class="fa-solid fa-angles-down"></i>
            </button>
        </a>

    </div>

    <div class="container vh-100 d-flex align-items-center py-3 justify-content-between" id="card-section">

        {{-- <div>
            <i class="fa-solid fa-hand-point-left" onclick="slidePrev()"></i>
        </div>

        <div id="card-section"  class="card-container row flex-column flex-sm-row  flex-nowrap overflow-x-auto">
            @forelse ($projects as $elem)

                <div class="project-card border rounded">

                    <a href="{{ route('projects.show' , $elem->slug ) }}" class="h-100 d-flex flex-column justify-content-between">

                        <img src="{{ asset('storage/' . $elem->cover_img) }}" class="img-fluid" alt="...">

                        <div class="fs-3">{{$elem['title']}}</div>

                        @if ($elem->type)
                            <div>
                                <span>Categoria progetto:</span>
                                    {{$elem->type->name}}
                            </div>
                        @endif

                    </a>

                </div>
            
            @empty
                <h2 class="text-center">Al momento non ci sono progetti</h2>
            @endforelse
        </div>

        <div>
            <i class="fa-solid fa-hand-point-right" onclick="slideNext()"></i>
        </div> --}}

        <div id="carouselProjects" class="carousel slide" data-bs-ride="carousel" data-bs-interval="9000">
            <div class="carousel-inner">

              @foreach ($projects as $elem)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <a href="{{ route('projects.show' , $elem->slug ) }}" class="h-100 d-flex flex-column justify-content-between">

                        <img src="{{ asset('storage/' . $elem->cover_img) }}" class="img-test" alt="...">

                        <div class="fs-3">{{$elem['title']}}</div>

                        @if ($elem->type)
                            <div>
                                <span>Categoria progetto:</span>
                                    {{$elem->type->name}}
                            </div>
                        @endif

                    </a>
                </div>
              @endforeach
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProjects" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselProjects" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

    </div>
</div>
@endsection

@section('script-custom')
    <script>

        // funzione per lo scroll orizzonatale
        // const container = document.getElementById("card-section");

        // container.addEventListener("wheel", function (event) {
        //     if (window.innerWidth > 576) {
        //         event.preventDefault();
        //         if (event.deltaY > 0) {
        //                 container.scrollLeft += 100
        //         } else {
        //             container.scrollLeft -= 100
        //         }
        //         // container.scrollLeft += event.deltaY;
        //     }
        
        // });

        function slideNext() {
            console.log('next');
            container.scrollLeft += 1000;
        };
        function slidePrev() {
            container.scrollLeft -= 1000;
        };

    </script>
@endsection