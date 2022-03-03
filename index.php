<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" 
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrap.com/boostrap/4.2.1/css/bootstrap.min.css">

    <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <title>Hello, world!</title>

    <style type="text/css">
      h5 {
  font-size: 35px;
  position: relative;
  color: #275B88;
  text-shadow: 1px 1px 2px black, 0 0 25px white, 0 0 25px white;
  bottom: 10px;
  text-align: center;
  
}

    </style>

  </head>

  <body>

<div class="contrainer-fluid">
  <div class="row justify-content-center">
    <div class="col-md-10 bg-light mt-2 rounded">
      <h1 class="text-primary p-2"></h1>
      <hr>
      <div class="form-inline">
        <label for="search" class="font-weight-bold lead text-dark">
        Search Record</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="search" id="search_text" class="form-control form-control-lg rounded-0 border-stripped" placeholder="Search..">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
  Add New User
</button>
      </div>
      <hr>
<?php
include 'config.php';

$stmt=$conn->prepare("SELECT * FROM myusers");
$stmt->execute();
$result = $stmt->get_result();

?>
  <table class="table table-hover" id="table-data">
    
  <thead>
    <tr>
        <th class="table-dark">First Name</th>
        <th class="table-dark">Last Name</th>
        <th class="table-dark">City</th>
        <th class="table-dark">Email</th>
    </tr>
 </thead>
   <tbody>
     
     <?php while($row = $result->fetch_assoc()){ ?>
      <tr>
        <td ><?= $row['first_name'];?></td>
        <td ><?= $row['last_name'];?></td>
        <td ><?= $row['city_name'];?></td>
        <td ><?= $row['email'];?></td>
      </tr>
      <?php } ?>
       </tbody>
      </table>
   </div>
  </div>
</div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#search_text").keyup(function(){
          var search = $(this).val();
          $.ajax({
            url:'action.php',
            method:'post',
            data:{query:search},
            success:function(response){
              $("#table-data").html(response);
            }
          });
        });
      });
    </script>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

 <form action="process.php" method="POST">
      <div class="modal-body">


      <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="first_name" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" required="required">
       
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="last_name" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lastname" required="required">
       
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">City Name</label>
        <input type="City" name="city_name" class="form-control" id="exampleInputPassword1" placeholder="City Name" required="required">
      </div>

       <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" required="required">
      </div>

<!--<div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div> -->

     <!--  <button type="submit" class="btn btn-primary">Submit</button> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="savedata" class="btn btn-primary">Save changes</button>
      </div>
   </form>   
    </div>
  </div>
</div>

  </body>
</html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<!--     <script src= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

<!-- 
old version -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
 <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script> -->


<!--     Bootstrap CSS -->
 <!--   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->



 <!-- navbar -->

 <!--     <nav class="nabar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      
      <button class="navbar-toggler" type="button" data-toggle ="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>        
      </button>

      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">

            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
              
            </li>
           <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
              
            </li>
          
        </ul>
        
      </div>
    </nav> -->

<!-- 
  <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input type="text" name="search" id="search_text" class="form-control form-control-lg rounded-0 border-primary" placeholder="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search!</button>
  </form>
</nav> -->