@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1>Admin: Events Management</h1>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Add Event</a>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ Str::limit($event->description, 50) }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->time ? $event->time->format('H:i') : 'N/A' }}</td>
                    <td>{{ $event->location ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="{{ route('admin.events.destroy', $event) }}" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No events found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection