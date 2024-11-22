@if ($errors->any())
    @foreach ($errors->all() as $error)
        <x-__alert color='danger'>{{ $error }}</x-__alert>
    @endforeach
@endif
