<h2>Audios</h2>
<ul>
    @foreach ($audios as $audio)
        <li>{{ $audio->name }} ({{ $audio->created_at  }})</li>
    @endforeach
</ul>