<body>
  <nav id='main-nav' class="navbar navbar-default">
    <div class="container-fluid">
    <p class="resistance" href="/">La R&eacute;sistance</p>
      <ul class="nav navbar-nav buttons">
        <li><a href="/"><button class="btn btn-primary">Home
        </button></a></li>
        <?php
        if(isset($_SESSION['username'])){
          print '<li><a href="#post"><button class="btn btn-primary">Make a post</button></a></li>';
          print '<li class="right"><a href="logout.php"><button class="btn btn-danger">Logout</button></a></li>';
        print '<li class="username">Welcome '.$_SESSION['username'].'</li>';
        }else{
          print '<li><a href="register.php"><button class="btn btn-primary">JOIN</button></a></li>';
          print '<li><a href="login.php"><button class="btn btn-primary">Login</button></a></li>';
        }
        ?>

      </ul>
    </div>
  </nav>