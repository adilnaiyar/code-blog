

@include('includes.home_header')

    <!-- Title -->
    <section id="title-two">
        <div class="Container">
            <div class="row">
                <div class="col-lg-12 ">
                  <h1 class="big-heading text-center">#{{$category->name}}</h1>
                  <h3 class="text-center">{ Blogs ; }</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            @if(count($posts)>0)
                @foreach($posts as $post)
                    <div class="card" style="width: 40rem;">
                        <div class="card-body">
                            <h2 class="card-title">{{$post->title}}</h2>
                            <h4> by {{$post->user->name}} </h4>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                            <hr>
                            <img class="img-responsive" src="{{$post->photo->file ?? $post->photo_placeholder()}}" alt="photo">
                            <hr>
                            <p class="card-text">{!! Str::words($post->body,30, '...')!!}</p>
                            <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                @endforeach    
            @else
                <em><h4 class="text-center"> No Blog For This category</h4></em>   
            @endif
            <hr>
            <!-- Pagination -->
            {{$posts->render()}}
            </div>
@include('includes.home_footer')

           