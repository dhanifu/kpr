<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" cellspacing="0" cellpading="10" style="width: 100%;">
        <tr>
            <th>Pangkat</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>NRP</th>
        </tr>
        @foreach($user as $account)
        <tr>
            <td>{{ $account->pangkat->pangkat }}</td>
            <td>{{ $account->name }}</td>
            <td>{{ $account->email }}</td>
            <td>{{ $account->nrp }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>