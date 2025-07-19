@extends('layouts.app')

@section('content')
<h1>Employee Details</h1>

<p><strong>Employee ID:</strong> {{ $employee->id }}</p>
<p><strong>Name:</strong> {{ $employee->name }}</p>
<p><strong>Email:</strong> {{ $employee->email }}</p>
<p><strong>Salary:</strong> {{ $employee->salary }}</p>
<p><strong>Department:</strong> {{ $employee->department->name ?? 'N/A' }}</p>

@if($employee->employeeDetail)
    <p><strong>Address:</strong> {{ $employee->employeeDetail->address }}</p>
    <p><strong>Phone:</strong> {{ $employee->employeeDetail->phone }}</p>
    <p><strong>Date of Birth:</strong> {{ $employee->employeeDetail->date_of_birth }}</p>
@else
    <p><em>No additional details available.</em></p>
@endif

<a href="{{ url('/employees/'.$employee->id.'/edit') }}" class="button">Edit</a>
<a href="{{ url('/employees') }}" class="button">Back to List</a>
@endsection
