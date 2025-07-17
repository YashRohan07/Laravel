<!-- This is a CHILD view. It shows specific content for the /employees page -->

@extends('layouts.app')  <!-- This says: "Use the layouts/app.blade.php file as the master layout" -->

@section('content')
<!-- This says: "Everything inside here will be inserted into @yield('content') in the layout." -->

    <h1>Employee Tracker — Basic Page</h1>
    <p>Welcome to the Employee Tracker!</p>

@endsection
