<x-layout title="Nova Série">
  <form action="{{ route('series.store') }}" method="post">
        @csrf
        
        <div class="row mb-3">
          <div class="col-8">
            <label for="name" class="form-label">Nome:</label>

            <input type="text" autofocus id="name" name="name" class="form-control" value="{{ old('name') }}"/>
          </div>

          <div class="col-2">
            <label for="seasons" class="form-label">N° Temporadas:</label>

            <input type="text" id="seasons" name="seasons" class="form-control" value="{{ old('seasons') }}"/>
          </div>

          <div class="col-2">
            <label for="episode" class="form-label">Eps / Temporada:</label>

            <input type="text" id="episode" name="episode" class="form-control" value="{{ old('episode') }}"/>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
  </form>
</x-layout>