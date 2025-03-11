@extends('general.top')

@section('title', 'LISTES PORTS')

@section('content')


<div class="container-fluid px-4">
    <div class="top-menu">
        <button class="btn btn-success">
            <a class="text-decoration-none text-white" href="{{ route('ports.create') }}">Créer PORT</a>
        </button>
    </div>
    <h2 class="mb-4 text-center">🛥️ Liste des Données PORTS</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container-fluid">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nom du port</th>
                    <th>Destinations</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ports as $port)
                <tr>
                    <td>{{ $port->name }}</td>
                    <td>{{ $port->destinations->pluck('name')->join(', ') }}</td>
                    <td>
                        <a href="{{ route('ports.edit', $port) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('ports.destroy', $port) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Supprimer ce port ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection