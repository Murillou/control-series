<x-layout title="Séries">
  <a href="{{ route('series.create') }}" class="btn btn-dark mb-1"> Adicionar </a>

  @isset($successMessage)
  <div class="alert alert-success">
    {{ $successMessage }}
  </div>
  @endisset

  <ul class="list-group">
    @foreach ($series as $serie) 
      <li class="list-group-item d-flex justify-content-between align-items-center">
      <a href="{{ route('seasons.index', $serie->id) }}"> {{ $serie->name }} </a>
        <span class="d-flex gap-3">
            <button class="btn btn-warning btn-sm">
              <a href="{{ route('series.edit', $serie->id ) }}">Editar</a>
            </button>
          <form action="{{ route('series.destroy', $serie->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">
              X
            </button>
          </form>
        </span>
      </li>
    @endforeach
  </ul>

</x-layout>