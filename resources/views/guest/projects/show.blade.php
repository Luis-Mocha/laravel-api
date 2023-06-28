@extends('layouts.app')
@section('content')


<div class="guestShowContent">
    <img src="{{ asset('storage/' . $project->cover_img) }}" class="img-fluid" alt="...">

    <div class="container">

        <div class="my-5">
            
            <h1>
                {{$project['title']}}
            </h1>
            <span>Descrizione progetto: </span>
            <p>
                {{$project['description']}}
            </p>

            
            @if ($project->type)
                <div>
                    <span>Categoria progetto:</span>
                        {{$project->type->name}}
                </div>
            @endif

            @if (count ($project->technologies) != 0 )
                <div>
                    <span>Tecnologie usate:</span>
                    {{-- @dd($project->technologies) --}}
                    
                    <ul>
                        @foreach ($project->technologies as $techElem)
                            <li>
                                {{$techElem->name}}
                            </li> 
                        @endforeach
                    </ul>
                
                </div>
            @endif

            <a href="{{$project['link_project']}}" target="_blank" rel="noopener noreferrer" class="text-primary">Link al progetto</a>
        </div>

    </div>
</div>
@endsection