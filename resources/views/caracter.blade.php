<div>
    <a href="{{ url()->previous() }}">Regresar</a>
</div>



<table>
    <div class="filters">
        @include('filterCharacter')
    </div>
    @if(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
    @endif
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Especie</th>
            <th>Género</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($characteres as $character)
        <tr>
            <td>{{ $character->name }}</td>
            <td>{{ $character->status }}</td>
            <td>{{ $character->species }}</td>
            <td>{{ $character->gender }}</td>
            <td><a href="{{ route('character.show', ['id' => $character->id]) }}">Ver Personaje</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{route('download.excel',['data'=>serialize($characteres)])}}">Descargar </a>
