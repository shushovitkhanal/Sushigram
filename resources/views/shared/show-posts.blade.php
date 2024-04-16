@foreach ($posts as $post)
    <div class = 'post'>
        <div class="post_content" >
            Poster
        </div>
        
        <div class = "post_title">
            {{$post -> title}}
        </div>
        
        <img src="{{$post -> image}}" class = "post_image">

        <div class="post_content">
            {{$post -> caption}}
        </div>

        <div class="post_content">
            Posted On
        </div>

        <div class="comment">
            Comment
        </div>
    </div>
                
@endforeach