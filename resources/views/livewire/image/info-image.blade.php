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
            <div class="col-md-4" style="padding-right: 0;">
                <button class="like border form-control" wire:click="updateLike({{$image->id}})">
                    @if ($image->likes->where('image_id', $image->id)->where('user_id', auth()->user()->id)->count())
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#0000ff">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                                d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z" />
                        </svg>
                    @endif
                    Like ({{$image->likes->count()}})
                </button>
            </div>
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
