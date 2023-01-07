<div class="comments">
    <div style=" overflow-y: scroll; {{count($comments) > 3 ? 'height: 350px;' : ''}}">
    @foreach ($comments as $row => $comment)
        <div style="margin-bottom: 30px;">
            <div class="avatar">
                <img class="container-avatar" src="{{ $comment->user->image }}" alt="">
            </div>
            <div class="name">
                {{ $comment->user->name . ' ' . $comment->user->surname }}
                <a href="{{ route('profile.index', ['user' => $comment->user->id]) }}">
                    <span>{{ ' | @' . $comment->user->nick }}</span>
                </a>
            </div>
            <div class=" row justify-content-end">
                {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
            </div>

            <div style="margin: 20px 75px; 0 0">
                <p>{{ $comment->content }}</p>
            </div>

        </div>
    @endforeach
</div>
    <textarea class="form-control" wire:model="content" placeholder="comment" id="" cols="3"></textarea>
    <button class="btn btn-success form-control" wire:click="saveComment">public comment</button>
</div>
