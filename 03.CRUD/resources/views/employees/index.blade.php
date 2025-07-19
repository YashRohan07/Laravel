@extends('layouts.app')

@section('content')
<h1>Employees</h1>

<a href="{{ url('/employees/create') }}" class="button">➕ Add New</a>

<form method="GET" action="{{ url('/employees') }}">
    <input type="text" name="search" placeholder="Search name/email" value="{{ request()->search }}">
    <input type="number" name="min_salary" placeholder="Min Salary" value="{{ request()->min_salary }}">
    <input type="number" name="max_salary" placeholder="Max Salary" value="{{ request()->max_salary }}">
    <button type="submit" class="button">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($employees as $emp)
        <tr>
            <td>{{ $emp->name }}</td>
            <td>{{ $emp->email }}</td>
            <td>{{ $emp->salary }}</td>
            <td>{{ $emp->department->name ?? 'N/A' }}</td>
            <td>
                @if(!$emp->trashed())
                    <a href="{{ url('/employees/'.$emp->id) }}" class="button">View</a>
                    <a href="{{ url('/employees/'.$emp->id.'/edit') }}" class="button">Edit</a>

                    <form action="{{ url('/employees/'.$emp->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Delete?')" type="submit" class="button danger">Delete</button>
                    </form>
                @else
                    <form action="{{ url('/employees/'.$emp->id.'/restore') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="button restore">Restore</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $employees->links() }}
@endsection
