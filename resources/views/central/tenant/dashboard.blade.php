<!DOCTYPE html>
<html>
<head>
    <title>Tenant Dashboard</title>
</head>
<body>
    <h1>Welcome to Tenant Dashboard</h1>

    <h2>Your tenant ID is: {{ tenant('id') }}</h2>
    <h2>Your Database name is: {{ tenant('db_name') }}</h2>

    <h3>Users:</h3>
    <ul>
    @foreach($users as $user)
        <li>
            Name: {{ $user->name }} <br>
            Email: {{ $user->email }} <br>
            Role: {{ $user->role }}
        </li>
    @endforeach
    </ul>
</body>
</html>

