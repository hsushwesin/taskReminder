<!--Main Navigation-->
<header>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <nav class="navbar top navbar-expand-lg navbar-dark indigo scrolling-navbar">
    <a class="navbar-brand" href="#"><strong>Task Reminder and Recorder</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('update')}}">Today To do List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('complete')}}">Completed Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('pending')}}">Pending Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('onhold')}}">On Hold Task</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="{{route('notstarted')}}">Not Started</a>
        </li>                            
        <li class="nav-item">
          <a class="nav-link" href="{{route('task')}}">Overall Task List</a>
        </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Import
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="{{route('assignPerson')}}">Assign Person</a>
          <a class="dropdown-item" href="{{route('assignPersonlist')}}">Assign Person List</a>
          <a class="dropdown-item" href="{{route('assignTo')}}">Assign To</a>
          <a class="dropdown-item" href="{{route('assignTolist')}}">Assign To List</a>
          <a class="dropdown-item" href="{{route('project')}}">Project</a>
          <a class="dropdown-item" href="{{route('projectList')}}">Project List</a>
        </div>
      </li>        
      </ul>
      <ul class="navbar-nav nav-flex-icons">
       <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">+<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><i class="fab fa-instagram"></i></a>
        </li>
      </ul>
    </div>
  </nav>

</header>
<!--Main Navigation-->
@yield('content')
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>