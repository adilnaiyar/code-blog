<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well ">
                    <h4>Blog Categories</h4>
                    <div class="row ">
                        <div class="col-lg-8">
                            <ul class="list-group">
                                @if(count($categories)>0)
                                    @foreach($categories as $category)
                                        <li class="list-group-item">
                                            <a href="{{route('home.categories', $category->id)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                @else
                                   <em><h4 class="text-center"> No Categories</h4></em>  
                                @endif    
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4 >Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center">Copyright &copy; CodeHacking {{\Carbon\Carbon::now()->year}}</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
   <script src="{{asset('lib_js/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
   <script src="{{asset('lib_js/js/bootstrap.js')}}"></script>

    <script type="text/javascript">

        //Session Message
        // $(".alert.flash").fadeTo(1000, 500).slideUp("slow", function(){
        //     $(".alert.flash").slideUp("slow");
        // });

        //Toggle Button
        $(".toogle-reply").click(function(){
            $(".comment-replies").slideToggle('slow'); 
        });
        
    </script>

</body>

</html>
