@extends('layouts.app')
@section('content')

<div class="jumbotron p-3 mb-4 rounded-3">
    <div class="container py-5">

        <span class="fw-bold fs-4">Modifica del progetto:</span>
        <h1 class="display-5 fw-bold">
            {{$project['title']}}
        </h1>
    </div>
</div>

<div class="content">
    <div class="container mb-4">

        <form action=" {{ route('admin.projects.update', $project ) }} " method="POST" enctype="multipart/form-data" class="row" autocomplete="off">

            @csrf

            {{-- Il form accetta solo get o post, quindi uso @method di laravel --}}
            @method('PUT')

            <div class="form-group mt-3">
                <label for="input-title" class="form-label">Title:</label>
                <input type="text" id="input-title" class="form-control" name="title" placeholder="Inserisci il titolo" required value="{{ old('title') ?? $project->title }}"> 
            </div>
            {{-- errore validazione --}}
            @error('title')
                <div class="alert alert-warning py-1 m-0 fst-italic">{{ $message }}</div>
            @enderror

            <div class="form-group mt-3 ">
                <label for="input-description" class="form-label">Description:</label>
                <textarea id="input-description" class="form-control" name="description" cols="30" rows="5">{{ old('description') ?? $project->description }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="input-link_project" class="form-label">Link Progetto:</label>
                <input type="text" id="input-link_project" class="form-control" name="link_project" placeholder="Inserisci la serie di appartenenza" value="{{ old('link_project') ?? $project->link_project }}"> 
            </div>
            {{-- errore validazione --}}
            @error('link_project')
                <div class="alert alert-warning py-1 m-0 fst-italic">{{ $message }}</div>
            @enderror 
            
            <div class="form-group mt-3">
                <label for="input-cover_img" class="form-label">File immagine:</label>
                <input type="file" name="cover_img" id="input-cover_img" class="form-control" value="{{ old('cover_img') ?? $project->cover_img }}">
            </div>
            {{-- errore validazione --}}
            @error('cover_img')
                <div class="alert alert-warning py-1 m-0 fst-italic">{{ $message }}</div>
            @enderror

            {{-- Input type usando un ciclo--}}
            <div class="form-group mt-3">
                <label for="input-type_id" class="form-label">Project type:</label>
                <select name="type_id" id="input-type_id" class="form-control">

                    <option value="">-- Scegli una tipologia --</option>
                    @foreach ($types as $elem)

                        <option value="{{$elem->id}}" {{ old('type_id', $project->type_id) == $elem->id ? 'selected' : '' }}>
                            {{$elem->name}}
                        </option>

                    @endforeach

                </select>
            </div>
            {{-- errore validazione --}}
            @error('type_id')
                <div class="alert alert-warning py-1 m-0 fst-italic">{{ $message }}</div>
            @enderror


            {{-- Checkbox technologies --}}
            <div class="form-group mt-3">
                <div>
                    Tecnologie utilizzate:
                </div>
                <div class="d-flex flex-wrap">
                    
                    @foreach ($technologies as $elem)
                        <div class="me-4">
                            <label for="input-technology-{{$elem->id}}" class="form-label">
                                {{$elem->name}}:
                            </label>

                            @if ($errors->any())

                                <input type="checkbox" id="input-technology-{{$elem->id}}" value="{{$elem->id}}" name="technologies[]" {{ in_array( $elem->id, old('technologies', [] ) ) ? 'checked' : '' }}>
                                
                            @else
                                {{-- nessun errore --}}
                                <input type="checkbox" id="input-technology-{{$elem->id}}" value="{{$elem->id}}" name="technologies[]" {{ $project->technologies->contains($elem) ? 'checked' : '' }}>
                                
                            @endif
                            
                        </div>
                    @endforeach
                </div>
            </div>


            {{-- Bottone Edit --}}
            <div>
                <button type="submit" class="btn btn-primary my-4 col-2 d-block mx-auto">
                    Edit Project
                </button>
            </div>

        </form>

    </div>
</div>
@endsection