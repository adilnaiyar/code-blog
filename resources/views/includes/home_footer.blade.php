 <!-- Blog Sidebar Widgets Column -->
        <section id="sidebar">
            <div class="col-md-4" style="margin-top: 10px;">
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
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    <h4>Blog Categories</h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @if(count($categories)>0)
                                        @foreach($categories as $category)
                                            <li class="list-group-item">
                                                <a href="{{route('home.categories', $category->id)}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                    @else
                                        <em><h4 class="text-center"> No Categories</h4></em>  
                                    @endif 
                                    <!-- Pagination -->
                                    {{$categories->render()}}   
                                </ul>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Programming Quotes</h4>
                    <p><em>“Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live”</em></p>
                    <h5> ― John Woods</h5>
                </div>
            </div>
        </section>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <div class="container-fluid">
                      <p class="text-center">&copy; Copyright {{\Carbon\Carbon::now()->year}} CodeHacking </p>
                </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->
    </section>
    <script src="{{asset('lib_js/js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('lib_js/js/bootstrap.js')}}"></script>
</body>
</html>
