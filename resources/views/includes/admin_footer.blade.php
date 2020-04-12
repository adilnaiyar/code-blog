
<!-- jQuery -->
<script src="{{asset('lib_js/js/jquery.js')}}"></script>
<script src="{{asset('lib_js/js/bootstrap.js')}}"></script>
<script src="{{asset('lib_js/js/metisMenu.js')}}"></script>
<script src="{{asset('lib_js/js/sb-admin-2.js')}}"></script>
<script src="{{asset('lib_js/js/scripts.js')}}"></script>
<!-- <script src="https://cdn.tiny.cloud/1/kg9hheuhq5peoahhv8n03rtbe10kclg65731xy3rd0im7t87/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

@yield('scripts')

@yield('upload_js')

<script type="text/javascript">
    
    $(".alert.flash").fadeTo(1000, 500).slideUp("slow", function(){
        $(".alert.flash").slideUp("slow");
    });

</script>

@yield('tiny')

@yield('footer')

</body>

</html>
