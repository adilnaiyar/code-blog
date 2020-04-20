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
                @if(count($categories)>0)
                <div class="well ">
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header">
                                    <h4>Blog Categories</h4>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach($categories as $category)
                                        <li class="list-group-item">
                                            <a href="{{route('home.categories', $category->id)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach   
                                </ul>
                            </div>
                         </div>
                    </div>
                </div>
                @endif 
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Programming Quotes:</h4>
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
                      <p class="text-center">&copy; Copyright {{\Carbon\Carbon::now()->year}} #CodeHacking </p>
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
