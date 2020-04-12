

@include('includes.home_header')

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">

            @if(count($posts)>0);

                @foreach($posts as $post)
                    <!--  <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1> -->

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#">{{$post->title}}</a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php">{{$post->user->name}}</a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                    <hr>
                    <img class="img-responsive" src="{{$post->photo->file ?? asset('/images/blog001.jpg')}}" alt="photo">
                    <hr>
                    <p>{{$post->body}}</p>
                    <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                @endforeach    

            @endif

            <hr>

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

    <!-- #Page Content -->

@include('includes.home_footer')

           