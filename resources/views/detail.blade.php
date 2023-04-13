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
        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td>{{ $data->name }}</td>
            <td>{{ $data->status }}</td>
            <td>{{ $data->species }}</td>
            <td>{{ $data->gender }}</td>
            
        </tr>
       
    </tbody>
</table>


