<!DOCTYPE html>
<html>
<head>
    <title>Post Details</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Post Details</h1>
    <p><strong>ID:</strong> <span id="post-id">{{ $post['id'] }}</span></p>
    <p><strong>Title:</strong> <span id="post-title">{{ $post['title'] }}</span></p>
    <p><strong>Body:</strong> <span id="post-body">{{ $post['body'] }}</span></p>
    <h2>Comments</h2>
    <ul>
        @foreach($comments as $comment)
            <li>{{ $comment['body'] }}</li>
        @endforeach
    </ul>
    
    <button onclick="sendPostToTelegram()">Send to Telegram</button>

    <script>
        function sendPostToTelegram() {
            var postId = document.getElementById('post-id').innerText;
            var postTitle = document.getElementById('post-title').innerText;
            var postBody = document.getElementById('post-body').innerText;

            console.log('Post ID:', postId);  

            fetch('/send-post-to-telegram', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    id: postId,
                    title: postTitle,
                    body: postBody
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response data:', data); 
                alert(data.status);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
    
           
</body>
</html>
