<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Posts</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Comments Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td><a href="/posts/{{ $post['id'] }}">{{ $post['title'] }}</a></td>
                    <td>{{ $post['comments_count'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
