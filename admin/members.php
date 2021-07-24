<?php
      session_start();
      $pageTitle = 'members';
     if(isset($_SESSION['Username'])){
            
             include 'init.php';

             $do = isset($_GET['do']) ? $_GET['do'] : 'manage' ;
            if ($do=='manage') {
            

            }
            elseif ($do=='Edit') {   
            $userid=  isset($_GET['userid'] )&& is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
            $stm =$con->prepare("SELECT * from  users where  UserID=? LIMIT 1");

             $stm->execute(array($userid));
            $row = $stm->fetch();
            $count = $stm->rowCount(); 

            if ($stm->rowCount()>0) {?>              
         
                
                        <h1 class="text-center">Edit member</h1>

                        <div class="container">
                        <form class="form-horizontal" action ="?do=update" method = "POST" >
                           <input type="hidden" name ="userid" value = "<?php echo $userid ?>" />
                           <!-- start username field -->
                              <div class="form-group form-group-lg">
                                    <label  class="col-sm-2 col-form-label">username</label>
                                    <div class="col-sm-10 col-md-4">
                                      
                                    <input type="text" class="form-control" name="username" value="<?php echo $row['Username'] ?>" autocomplete='off' required="required"/>
                                  
                                 </div>
                                 </div>
                           <!-- end username field -->  
                           <!-- start username field -->
                           <div class="form-group form-group-lg">
                                    <label  class="col-sm-2 col-form-label">password</label>
                                    <div class="col-sm-10 col-md-4">
                                       <input type="password" class="form-control" name="password" >
                                    </div>
                                 </div>
                           <!-- end username field -->  
                           <!-- start username field -->
                           <div class="form-group form-group-lg">
                                    <label  class="col-sm-2 col-form-label">email</label>
                                    <div class="col-sm-10 col-md-4">
                                       <input type="email" class="form-control" name="email" value="<?php echo $row['Email'] ?>" required="required">
                                    </div>
                                 </div>
                           <!-- end username field --> 
                           <!-- start username field -->
                           <div class="form-group form-group-lg">
                                    <label  class="col-sm-2 col-form-label">Full name</label>
                                    <div class="col-sm-10 col-md-4">
                                       <input type="text" class="form-control" name="full" value="<?php echo $row['Fullname'] ?>">
                                    </div>
                                 </div>
                           <!-- end username field -->  
                           <!-- start username field -->
                           <div class="form-group form-group-lg">
                                 
                                    <div class="col-sm-offset-2 col-sm-10">
                                       <input type="submit" class="btn btn-primary btn-lg" value="save">
                                    </div>
                                 </div>
                           <!-- end username field -->   
                                 </form>
                        </div>

           <?php }
              else {
                 echo 'this is no id';
              }

            }elseif ($do=="update") {
              echo "<h1 class='text-center'>update member</h1>";
              echo "<div class = 'container'>" ;
            }
            if ($_SERVER['REQUEST_METHOD']=='POST') {
               // GET VARIABLE FROM  form
               $id    = $_POST['userid'];
               $user  = $_POST['username'];
               $email  = $_POST['email'];
              
               $name  = $_POST['full'];
            //
            
            $formERRors  = array();
            if (strlen($user)<4) {
               $formERRors[] ='<div class ="alert alert-danger"> username minimum <strong>4 caracteres</strong></div>';
            }
            if (empty($user)) {
               $formERRors[] ='<div class ="alert alert-danger">username not <strong>empty</strong></div>';
            }
            if (empty($email)) {
               $formERRors[] ='<div class ="alert alert-danger"> please email <strong>not empty</strong></div>';
            }
            if (empty($name)) {
               $formERRors[] ='<div class ="alert alert-danger"> full name <strong>not empty</strong></div>';
            }
            foreach($formERRors as $errors){
               echo $errors  ;
            }
                // check if there is no error  procedd the update operation
             
            //  update database
            if (sizeof($formERRors)==0) {
               $stmt = $con->prepare("UPDATE users SET Username = ? , Email = ? , Fullname = ? WHERE UserID = ?");
               $stmt->execute(array($user , $email , $name , $id));
  
                // success message 
               echo "<div class = 'alert alert-success'>".  $stmt->rowCount() . ' record updated </div>';
            }
            
            }
            else
            { echo 'sorry';
            
            }
             echo "</div>" ;
      
             include $tpl . "footer.php";
     }
     else{
 
      // echo 'you are not autorized to view this page';
       header('Location:index.php');
       exit();
     } 