@extends('layouts.app')

@section('content')
<h1>Edit Employee</h1>

<form method="POST" action="{{ url('/employees/'.$employee->id) }}">
    @csrf @method('PUT')

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;">
        <tbody>
            <tr>
                <th style="text-align:left; width: 150px;">Name:</th>
                <td>
                    <input type="text" name="name" value="{{ old('name', $employee->name) }}" style="width: 100%;">
                    @error('name') <p style="color:red; margin:0;">{{ $message }}</p> @enderror
                </td>
            </tr>
            <tr>
                <th style="text-align:left;">Email:</th>
                <td>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}" style="width: 100%;">
                    @error('email') <p style="color:red; margin:0;">{{ $message }}</p> @enderror
                </td>
            </tr>
            <tr>
                <th style="text-align:left;">Salary:</th>
                <td>
                    <input type="number" name="salary" value="{{ old('salary', $employee->salary) }}" style="width: 100%;">
                    @error('salary') <p style="color:red; margin:0;">{{ $message }}</p> @enderror
                </td>
            </tr>
            <tr>
                <th style="text-align:left;">Department:</th>
                <td>
                    <select name="department_id" style="width: 100%;">
                        <option value="">-- Select --</option>
                        @foreach($departments as $dep)
                            <option value="{{ $dep->id }}" {{ old('department_id', $employee->department_id) == $dep->id ? 'selected' : '' }}>
                                {{ $dep->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id') <p style="color:red; margin:0;">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr>
                <th style="text-align:left;">Address:</th>
                <td>
                    <input type="text" name="address" value="{{ old('address', $employee->employeeDetail->address ?? '') }}" style="width: 100%;">
                    @error('address') <p style="color:red; margin:0;">{{ $message }}</p> @enderror
                </td>
            </tr>
            <tr>
                <th style="text-align:left;">Phone:</th>
                <td>
                    <input type="text" name="phone" value="{{ old('phone', $employee->employeeDetail->phone ?? '') }}" style="width: 100%;">
                    @error('phone') <p style="color:red; margin:0;">{{ $message }}</p> @enderror
                </td>
            </tr>
            <tr>
                <th style="text-align:left;">Date of Birth:</th>
                <td>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->employeeDetail->date_of_birth ?? '') }}" style="width: 100%;">
                    @error('date_of_birth') <p style="color:red; margin:0;">{{ $message }}</p> @enderror
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center; padding-top: 10px;">
                    <button type="submit" class="button">Update</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection
