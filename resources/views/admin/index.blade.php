@extends("layouts.app")

@section('content')
    {{-- Linke Seite in der Adminansicht --}}
    @include("admin.fahrraeder")

    {{-- Rechte Seite in der Adminansicht --}}
    @include("admin.datenbank")

    <div class="container pull-right text-right">
        <a class="btn btn-default" href="{{ url("admin/logout") }}">Logout</a>
    </div>

    @include("admin.dialoge")
@endsection