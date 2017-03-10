<?php
$con=mysqli_connect("localhost","root","","books");
       if(mysqli_connect_errno())
       {echo "failed to connect to database" . mysqli_connect_error();}

function getip()
{
   $ip=$_SERVER['REMOTE_ADDR'];
    
   if(!empty($_SERVER['HTTP_CLIENT_IP']))
      {
         $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
    else
        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    return $ip;
}
     echo '<form action="bookformtable.php" method="post" enctype="multipart/form-data">
                           <table align="center" width="750">
                              <tr>
                                 <td colspan="6"><h2>which book did you read and want to share</h2></td>
                              </tr>
                              <tr>
                                  <td align="right" >reader email ID:</td>
                                  <td><input type="text"  name="b_email" required></td>
                              </tr>

                              <tr>
                                  <td align="right" >book name:</td>
                                  <td><input type="text"  name="b_name" required></td>
                              </tr>

                              <tr>
                                  <td align="right">book author:</td>
                                  <td><input type="text" name="b_author"></td>
                              </tr>
                               <tr>
                                   <td align="right">book Image:</td>
                                  <td><input type="file" name="b_image" required></td>
                              </tr>
                              <tr>
                                  <td align="right">book category:</td>
                                  <td><select name="b_category">
                                      <option>india</option><option>russia</option><option>chile</option><option>usa</option><option>finland</option><option>germany</option><option>argentina</option><option>sri lanka</option><option>spain</option></select>
                                  </td>
                              </tr>
                              <tr>
                                  <td align="right">book reviews</td>
                                  <td><input type="text" name="b_review" required></td>
                              </tr>
                               <tr>
                                   <td align="right">want to share your book with other student</td>
                                <td>  <input type="radio" name="b_share" value="share" checked> share<br>
                                  <input type="radio" name="b_share" value="not share"> i donot want to share<br>
                                </td>
                               </tr>
                               <tr>
                                   <td align="right">rate this book</td>
                                   <td>
                                      <input type="range" name="b_rate" max="10" min="1">
                                   </td>
                               </tr>
                               <tr><td colspan="6" align="right"><input type="submit" name="add_book" value="add book"></td>
                               </tr>
                            </table>
                        </form>';
?>
<?php
   if(isset($_POST['add_book']))
   {
       global $con;
       $ip=getip();
       $b_name=$_POST['b_name'];
       $b_email=$_POST['b_email'];
       $b_author=$_POST['b_author'];
       $b_image=$_FILES['b_image']['name'];
       $b_image_tmp=$_FILES['b_image']['tmp_name'];
       $b_category=$_POST['b_category'];
       $b_review=$_POST['b_review'];
       $b_share=$_POST['b_share']; 
       $b_rate=$_POST['b_rate'];
       move_uploaded_file($b_image_tmp,"book image/$b_image");
       
       $qu="insert into userbook (ip,email,bookname,bookauthor,bookimage,bookviews,category,ratingvalue,share) values('$ip','$b_email','$b_name','$b_author','$b_image','$b_review','$b_category','$b_rate','$b_share')";
       
       $qu_f=mysqli_query($con,$qu);
       
       $a="select * from userbook where email='$b_email'";
       $q_a=mysqli_query($con,$a);
       $q_a_rows=mysqli_num_rows($q_a);
       if($q_a_rows==1)
       {
           echo "<script>alert('Account has been created successfully, Thanks!')</script>";
           echo "<script>window.open('index.php','_self')</script>";
       }
           
   }
?>