<x-layout title="Posts">
@foreach ($Posts as $post )
<h2>{{ $post['post_author'] }}
</h2><br>
{{ $post['post_content'] }}<br>
@forelse ($post->comments as $comment )
<li>{{$comment['comment_content']}}</li>
@empty
<p>no comments for this post </p>
@endforelse
                
@endforeach
<br>
</x-layout >