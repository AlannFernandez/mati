<form action="{{ route('characters.filter') }}" method="get">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name">
    <br>
    <label for="status">Estado:</label>
    <select name="status" id="status">
        <option value="">-- Seleccione --</option>
        <option value="alive">Vivo</option>
        <option value="dead">Muerto</option>
        <option value="unknown">Desconocido</option>
    </select>
    <br>
    <label for="gender">Género:</label>
    <select name="gender" id="gender">
        <option value="">-- Seleccione --</option>
        <option value="male">Masculino</option>
        <option value="female">Femenino</option>
        <option value="genderless">Sin género</option>
        <option value="unknown">Desconocido</option>
    </select>
    <br>
    <button type="submit">Buscar</button>
</form>
