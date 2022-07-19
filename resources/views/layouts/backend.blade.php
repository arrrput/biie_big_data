<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') | Big Data</title>

  @stack('prepend-style')
  @include('includes.backend.style')
  @stack('addon-style')
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Scripts -->

  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"/>
  <script src="{{ URL::asset('js/app.js') }}" defer></script>


</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('includes.backend.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('includes.backend.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('includes.backend.footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/adminlte.min.js') }}"></script>
<!-- LTE -->
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{ URL::asset('dist/js/demo.js') }}"></script> --}}

<script>
    var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    var currentTheme = localStorage.getItem('theme');
    var mainHeader = document.querySelector('.main-header');
    var sideBar = document.querySelector('.main-sidebar');
  
    if (currentTheme) {
      if (currentTheme === 'dark') {
        if (!document.body.classList.contains('dark-mode')) {
          document.body.classList.add("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-light')) {
          mainHeader.classList.add('navbar-dark');
          mainHeader.classList.remove('navbar-light');
        }
        if(sideBar.classList.contains('sidebar-light-success')){
          sideBar.classList.add('sidebar-dark-success');
          sideBar.classList.remove('sidebar-light-success');
        }
        toggleSwitch.checked = true;
      }
    }
  
    function switchTheme(e) {
      if (e.target.checked) {
        if (!document.body.classList.contains('dark-mode')) {
          document.body.classList.add("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-light')) {
          mainHeader.classList.add('navbar-dark');
          mainHeader.classList.remove('navbar-light');
        }
        if(sideBar.classList.contains('sidebar-light-success')){
          sideBar.classList.add('sidebar-dark-success');
          sideBar.classList.remove('sidebar-light-success');
        }
        localStorage.setItem('theme', 'dark');
      } else {
        if (document.body.classList.contains('dark-mode')) {
          document.body.classList.remove("dark-mode");
        }
        if (mainHeader.classList.contains('navbar-dark')) {
          mainHeader.classList.add('navbar-light');
          mainHeader.classList.remove('navbar-dark');
        }
        if(sideBar.classList.contains('sidebar-dark-success')){
          sideBar.classList.add('sidebar-light-success');
          sideBar.classList.remove('sidebar-dark-success');
        }
        localStorage.setItem('theme', 'light');
      }
    }
  
    toggleSwitch.addEventListener('change', switchTheme, false);
  
    $('#id_department').change(function(){
      var idDept = $(this).val();    
      if(idDept){
          $.ajax({
             type:"GET",
             url:"/getrelevant?id_department="+idDept,
             dataType: 'JSON',
             success:function(res){               
              if(res){
                  $("#id_part").empty();
                  $("#id_part").append('<option>---Select Here---</option>');
                  $.each(res,function(nama,kode){
                      $("#id_part").append('<option value="'+kode+'">'+nama+'</option>');
                  });
              }else{
                 $("#id_part").empty();
              }
             }
          });
      }else{
          $("#id_part").empty();
      }      
     });
  
    //  display image
    $(document).ready(function (e) {
   
    $('#table-month').DataTable();
  
    $('#table-list').DataTable();
     
   $('#image').change(function(){
            
    let reader = new FileReader();
  
    reader.onload = (e) => { 
  
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
  
    reader.readAsDataURL(this.files[0]); 
   
   });
   
  });
     
  </script>
  @stack('prepend-script')
</body>
</html>
