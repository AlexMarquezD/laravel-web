<div class="card mt-5">
    <div class="card-header">
        <div class="avatar">
            <img class="container-avatar" src="{{ $image->user->image }}" alt="">
        </div>
        <div class="name">
            {{ $image->user->name . ' ' . $image->user->surname }}
            <a href="{{ route('profile.index', ['user' => $image->user->id]) }}">
                <span>{{ ' | @' . $image->user->nick }}</span>
            </a>
        </div>
        <div class="date row justify-content-end">
            {{ \Carbon\Carbon::parse($image->created_at)->isoFormat('MMMM Do YYYY, h:mm:ss a') }}
        </div>
    </div>

    <div class="card-body">
        <div>
            <img class="image" src="{{ $image->image_path }}" alt="">
        </div>
        <div class="description">
            <p>{{ $image->description }}</p>
        </div>
        <div class="like-comment row">
            @livewire('content.like', ['image' => $image->id])
            <div class="comment col-md-8" style="padding-left: 0;">
                <button class="border form-control">
                    <p>comment ({{ count($image->comments) }})</p>
                </button>
            </div>
        </div>
        <div>
            @livewire('comment.info-comment', ['image_id' => $image_id])
        </div>
    </div>
    <style>
        .image {
            width: 100%;
            max-height: 400px;
            overflow: hidden;
        }

        .card-body {
            padding: 0;
        }

        .container-avatar {
            width: 35px;
            height: 35px;
            border-radius: 900px;
            overflow: hidden;
            margin-left: 20px;
            float: left;
        }

        .avatar {
            float: left;
        }

        .name {
            margin: 5px 0 0 20px;
            font-weight: bold;
            float: left;
        }

        .name a {
            text-decoration: none
        }

        .date {
            margin: 5px 0 0 0px;
        }

        .description {
            margin-left: 50px;
            margin-top: 15px;
        }

        .like {
            padding-bottom: 20.5px;
        }

        span {
            color: gray;
        }

        .like-comment {
            margin-bottom: 15px
        }
    </style>
</div>
