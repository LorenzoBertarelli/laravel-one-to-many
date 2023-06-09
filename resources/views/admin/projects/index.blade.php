@extends('layouts.admin')

@section('content')
    @include('partials.session_message')

    <h1>La Lista dei Progetti</h1>
    <div class="text-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">Crea nuovo progetto</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->type?->name }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                class="fa-solid fa-edit"></i></a>
                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
