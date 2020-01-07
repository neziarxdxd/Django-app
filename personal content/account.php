<html>
  <head>

  <style type="text/css">
  *{
   margin: 0;
   padding: 0;
   font-family: sans-serif;
  }

  #sidebar{
   position: fixed;
   width: 200px;
   height: 100%;
   background: #151719;
   left: -200px;
   transition: all 500ms linear;
  }
  #sidebar.active{
   left:0px;
  }
  #sidebar ul li{
   color: rgba(230,230,230,0.9);
   list-style: none;
   padding: 15px 10px;
   border-bottom: 1px solid rgba(100,100,100,0.3);
  }
  #sidebar .toggle-btn{
   position: absolute;
   left: 230px;
   top: 20px;
  }
  #sidebar .toggle-btn span{
   display: block;
   width: 30px;
   height: 5px;
   background: #151719;
   margin: 5px 0px;

  }
 </style>
 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"/>

  <title>ITHelpDesk</title>    
  </head>
  <body>


  
    <!-- Modal -->
    <!-- Add -->
    <div class="modal fade" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="addAccountLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addAccountLabel">Add Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action = "process.php" method="post">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="addUser" aria-describedby="addUsername" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="addPass" placeholder="Password">
              </div>
              <div class="form-group">
                <label>User Type</label>
                <select class="form-control" name="cbType">
                  <option value="" hidden>Type</option>
                  <option value="Admin">Admin</option>
                  <option value="Technical">Technical</option>
                  <option value="User">User</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnAdd">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div id="sidebar">
  <div class="toggle-btn" onclick="toggleSidebar()"><a>
   <span></span>
   <span></span>
   <span></span>
  </a>
  </div>
  <ul>
   <li>Explore</li>
   <li>Sell</li>
   <li>Buy</li>
  </ul>
 </div>
<!-- content -->


<div class="content" style="padding-left: 10%; padding-right: 10%; padding-top: 5%;">
    
<div class="row" style="">
    <div class="col-sm">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAccount">
        Add
      </button>
    </div>
    
    
    </div>
      
    <br>
    <?php
      require_once "config.php";
      $sql = "SELECT * FROM tblaccount order by username";
      if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
    ?>
          <table class='table'> 
          <thead class='thead-dark'> 
          <tr> 
          <th scope='col'>Username</th> 
          <th scope='col'>Password</th> 
          <th scope='col'>Type</th> 
          <th scope='col'>Status</th> 
          <th scope='col'></th> 
          </tr> 
          </thead> 
          <?php
            while($row = mysqli_fetch_array($result)){
            $username = $row['username'];
          ?>
            <tbody> 
            <tr> 
            <td><?php echo $username;?></td> 
            <td><?php echo $row['password'] ;?></td> 
            <td><?php echo $row['type'] ;?></td> 
            <td><?php echo $row['status'] ;?></td>
            <td> <a href="#view<?php echo $username;?>" data-toggle="modal" class="btn btn-primary">View</a>
            <a href="#edit<?php echo $username;?>" data-toggle="modal" class="btn btn-info">Edit</a>
            <a href="#delete<?php echo $username;?>" data-toggle="modal" class="btn btn-danger">Delete</a>
            </td><tr>
            <!-- View Modal -->
            <div class="modal fade" id="view<?php echo $username;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">View account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form action = "process.php" method="post">
                    <div class="form-group">
                      <label>Username: <?php echo $username;?></label><br>
                      <label>Password: <?php echo $row['password'] ;?></label><br>
                      <label>Type: <?php echo $row['type'] ;?></label><br>
                      <label>Status: <?php echo $row['status'] ;?></label><br>
                      <label>Date: <?php echo $row['date'] ;?></label><br>
                      <label>Time: <?php echo $row['time'] ;?></label><br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Edit Modal -->
            <div class="modal fade" id="edit<?php echo $username;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form action = "process.php" method="post">
                    <div class="form-group">
                    <label>Username</label> 
                    <input type="text" class="form-control"name="txtcode" value="<?php echo $row['username']; $un =$row['username']; ?>" readonly="readonly"/>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" class="form-control" name="editPass" value="<?php echo $row['password'];?>">
                    </div>
                    <div class="form-group">
                      <label>User Type</label>
                      <select class="form-control" name="editcbType">
                        <option value="<?php echo $row['type'];?>" hidden><?php echo $row['type'];?></option>
                        <option value="Admin">Admin</option>
                        <option value="Technical">Technical</option>
                        <option value="User">User</option>
                      </select>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" name="btnEdit" value="Save">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Delete Modal -->
            <div class="modal fade" id="delete<?php echo $username;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action = "process.php" method="post">
                      <div class="form-group">
                        Are you sure you want to delete account "<b><?php echo $row['username']; ?></b>"?
                      </div>
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="btnDelete" value="Delete">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
                echo "</tbody>"; 
            }
        }
        echo "</table>";
      }
     ?>
 </div>


      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/ticket.js"></script>
</body>
</html>
<?php
// getting data for update
	$sql = "SELECT * FROM tblaccount WHERE username = ?";
	if($stmt = mysqli_prepare($link, $sql)){
    
    mysqli_stmt_bind_param($stmt, "s", $param_id);
    $param_id = trim ($username);
		if(mysqli_stmt_execute($stmt)){
      $result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
			}
			else{
				echo "error";
				exit();
			}
		}
		else{
			echo "Error on select statement";
		}
	}
?>