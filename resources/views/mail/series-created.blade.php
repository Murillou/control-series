@component('mail::message')

# {{ $serieName }} criada

A série {{ $serieName }} com {{ $seasons }} temporadas e {{ $episodes }} episódios por temporada foi criada.

Acesse aqui:

@component('mail::button', ['url' => route('seasons.index', $serieId)])
    Ver série
@endcomponent
@endcomponent