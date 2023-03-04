<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">
    
         <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
    
        <!-- Google Web Fonts -->
         <link rel="preconnect" href="/https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
     
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        
    
<div class="container-fluid">
    <div class="row flex-nowrap d-flex">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class=" sticky-top  d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{route('admin.profile')}}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i>  <span class="ms-1 d-none d-sm-inline">Members</span> </a>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            
                            
                            <li class="w-100">
                                <a href="{{route('admin.add_user')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Add sales member</span>  </a>
                                
                            </li>
                            <li class="w-100">
                              <a href="{{route('admin.add_presales')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Add Presales member</span>  </a>
                            </li>
                            <li>
                                <a href="{{route('admin.show_users')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Show All Users</span>  </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.show_tickets')}}" class="nav-link px-0 align-middle">
                        <i class="bi bi-ticket"></i> <span class="ms-1 d-none d-sm-inline">Tickets</span></a>
                    </li>
                   
                    
                    <li>
                        <a href="{{route('admin.create_questionnaire')}}" class="nav-link px-0 align-middle">
                            <i class="bi bi-question-circle"></i> <span class="ms-1 d-none d-sm-inline">Create Questionnaire</span> </a>
                    </li>
                   
                    <li>
                        
                        <form  action="{{ route('logout') }}" method="POST" >
                            @csrf
                            <button class="nav-link px-0 align-middle" type="submit">Logout</button>
                        </form>
                    </li>
                            
                        </div>
                    </li>
                </ul>
               
                <hr>
                
                    
                </div>
                <div class="col py-3">  
                    @if ( session()->has('msg'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('msg')}}
                      </div>  
                    @endif
                          
                    @yield('content')
                </div>
            </div>
            
        </div>
       
    </div>
</div>
</body>