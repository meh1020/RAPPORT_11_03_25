@extends('general.top')

@section('title', 'LISTES TYPES D\'EVENEMENT')

@section('content')

<div class="container-fluid px-4">

    <div class="top-menu">
        <button class="btn btn-success">
            <a class="text-decoration-none text-white" href="{{ route('type_evenements.create') }}">Créer type</a>
        </button>
        <button class="btn btn-secondary">
            <a class="text-decoration-none text-white" href="{{ route('type_evenements.index') }}">Liste des types</a>
        </button>
    </div>

    <!-- Formulaire de recherche (optionnel si vous souhaitez ajouter une recherche) -->
    <div class="mb-4">
        <form method="GET" action="{{ route('type_evenements.index') }}">
            <div class="input-group" style="max-width: 400px; margin-left: auto;">
                <input type="text" name="query" value="{{ request('query') }}" placeholder="Rechercher un type" class="form-control">
                <button type="submit" class="btn btn-outline-secondary">Rechercher</button>
            </div>
        </form>
    </div>
        
    <h2 class="mb-4 text-center">📜 Liste des types d'évènements</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 30px;">ID</th>
                    <th style="width: 70px;">Nom</th>
                    <th style="width: 1%; white-space: nowrap;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                <tr>
                    <td style="width: 30px;"><small>{{ $type->id }}</small></td>
                    <td style="width: 70px;"><small>{{ $type->nom }}</small></td>
                    <td class="text-center" style="width: 1%; white-space: nowrap;">
                        <a href="{{ route('type_evenements.edit', $type) }}" class="btn btn-secondary btn-sm" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('type_evenements.destroy', $type) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
    <div class="d-flex justify-content-center mt-3">
        {{ $types->links() }}
    </div>
</div>
@endsection
