@extends('layouts.front')

@section('title', 'プロフィール情報')

@section('content')
    編集者のプロフィール情報
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->name, 150) }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->gender, 150) }}
                                </div>
                                <div class="title">
                                    {{ Str::limit($post->hobby, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ Str::limit($post->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection