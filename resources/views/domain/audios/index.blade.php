@extends('common/template/base')

@section('body')
    <h2>{{ __('messages.audios.title') }}</h2>
    <ul>
        @foreach ($audios as $audio)
            <li>{{ $audio->name }} ({{ $audio->created_at  }})</li>
        @endforeach
    </ul>
@endsection
