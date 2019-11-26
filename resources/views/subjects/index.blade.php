@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('subjects.create') }}" class="btn btn-success">Add Subject</a>
</div>

<div class="card card-default">
    <div class="card-header">Subjects</div>
</div>
@endsection