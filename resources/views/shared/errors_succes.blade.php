@if (session('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <ul>
        <li>Succès : {{ session('success') }}</li>
    </ul>
</div>
@endif 

@if (session('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <ul>
        <li>Attention : {{ session('error') }}</li>
    </ul>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <ul>
        @foreach ($errors->all() as $error)
        <li>Erreur : {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif