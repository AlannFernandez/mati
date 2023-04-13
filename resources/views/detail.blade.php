<div>
    <a href="{{ url()->previous() }}">Regresar</a>
</div>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Especie</th>
            <th>Género</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->status }}</td>
            <td>{{ $data->species }}</td>
            <td>{{ $data->gender }}</td>
            <td><img src="{{ $data->image }}" alt="{{$data->name}}" srcset="" width="150px" ></td>
            
        </tr>
       
    </tbody>
</table>


