<!DOCTYPE html>
<html>
<head>
    <title>Tenant Dashboard</title>
</head>
<body>
    <h1>Hello {{tenant('name')}}</h1>

    <h1>Your tenant ID id : {{tenant('id')}}</h1><br>
    <h2>Your Database name is : {{tenant('db_name')}}</h2>

    <h1>your account is inactive. Please contact your provider to activate your account.</h1>
    
</body>
</html>
