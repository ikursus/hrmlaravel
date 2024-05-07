<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>

{{ $pageTitle }}

<ul>
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register.page') }}">Register</a></li>
    <li><a href="/forgot-password">Forgot Password</a></li>
</ul>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($senaraiUsers as $item): ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['status']; ?></td>
        </tr>
        <?php endforeach; ?>

        @foreach ($senaraiUsers as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['status'] }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<footer>
    <?php echo $copyright; ?>
</footer>
</body>
</html>
