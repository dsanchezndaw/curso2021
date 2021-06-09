<h2>Edita el teu perfil</h2>
<x-auth-validation-errors class="mb-4" :errors="$errors" />
<form action="{{ url('update/'.$user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    Nom: <input type="text" name="name" value="{{$user->name}}"><br><br>
    Cognom: <input type="text" name="lastname" value="{{$user->lastname}}"><br><br>
    Email: <input type="email" name="email" value="{{$user->email}}"><br><br>
    Contrasenya: <input type="password" name="password"><br><br>
    Confirma contrasenya: <input type="password" name="password_confirm"><br><br>
    Image perfil: <input type="file" name="file"><br><br>
    <button type="submit">Edita</button>
</form>