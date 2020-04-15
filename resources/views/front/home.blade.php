@include('includes.home_header')

    <!-- Title -->
    <section id="title-one">
        <div class="Container">
            <div class="row">
                <div class="col-lg-6 ">
                  <h1 class="big-heading">#CodeHacking</h1>
                  <h3>{ Blog With Us ; }</h3>
                  <h4 class="name-heading">by Adil on 07 April 2020</h4>
                </div>
                <div class="col-lg-6 ">
                  <img class="title-image" src="{{asset('images/img0013.jpg')}}" alt="photo">
                </div>
            </div>
        </div>
    </section>

    <!-- Page Content -->
    <section id="content">
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <section id="blog">
                <div class="col-md-8">
                    @if(count($posts)>0)
                        @foreach($posts as $post)
                        <div class="card" style="width: 40rem;">
                            <div class="card-body">
                                <h2 class="card-title">{{$post->title}}</h2>
                                <p class="lead"> by {{$post->user->name}} </p>
                                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
                                <hr> 
                                <img class="card-img-top img-responsive " src="{{$post->photo->file ?? $post->photo_placeholder()}}" alt="photo">
                                <hr>
                                <p class="card-text">{!! Illuminate\Support\Str::limit($post->body, 20) !!}</p>
                                <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                        @endforeach    
                    @else
                        <em><h4 class="text-center"> No Blog</h4></em>   
                    @endif
                    <hr>
                    <!-- Pagination -->
                    {{$posts->render()}}
                </div>
            </section>
@include('includes.home_footer')

           