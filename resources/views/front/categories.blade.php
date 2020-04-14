

@include('includes.home_header')

    <h1 class="text-center">{{$category->name}}</h1>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

            @if(count($posts)>0)

                @foreach($posts as $post)

                    <!-- First Blog Post -->
                    <h2>{{$post->title}}</h2>
                    <p class="lead"> by {{$post->user->name}} </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                    <hr>
                    <img class="img-responsive" src="{{$post->photo->file ?? $post->photo_placeholder()}}" alt="photo">
                    <hr>
                    <p>{!! Illuminate\Support\Str::limit($post->body, 20) !!}</p>
                    <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                @endforeach    

            @else
                <em><h4 class="text-center"> No Blog For This category</h4></em>   
            @endif

            <hr>

            <!-- Pagination -->
            {{$posts->render()}}

            </div>

@include('includes.home_footer')

           