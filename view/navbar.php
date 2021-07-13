
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Updated Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?v=home">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="?v=logout">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="?v=search" method="POST" >
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <button type="submit" name="submit-search"> Search</button>
          </form>
        </div>
      </div>
    </nav>                                                                                      