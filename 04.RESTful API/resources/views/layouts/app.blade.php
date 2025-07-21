<!-- This is the MASTER layout. It wraps all your pages in a consistent design -->

<!DOCTYPE html>
<html>
<head>
    <title>Employee Tracker</title>
    <!-- You can add CSS here -->
  <style>
    body {
        font-family: Arial, sans-serif;
    }
    .button {
        display: inline-block;
        background: #3490dc; /* Default blue */
        color: #fff;
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        margin-right: 5px;
    }

    .button:hover {
        opacity: 0.9;
    }

    .button.danger {
        background: #e3342f; /* Red for Delete */
    }

    .button.restore {
        background: #38c172; /* Green for Restore */
    }

    .inline {
        display: inline;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 8px 12px;
        text-align: left;
    }

    form.inline {
        display: inline;
    }
</style>

</head>
<body>
    <div class="container">

        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>  <!--This will show a green success message whenever session('success') is set -->
        @endif

        @yield('content')  <!-- This is where the content of each page will be inserted -->

    </div>
</body>
</html>
