<?php 
extract($_POST);
if(isset($save))
{
    if($e=="" || $p=="")
    {
        $err="<font color='red'>Fill all the fields first</font>";    
    }
    else
    {
        $pass = md5($p);    
        $sql = mysqli_query($conn,"select * from user where email='$e' and pass='$pass'");
        $r = mysqli_num_rows($sql);

        if($r == true)
        {
            $_SESSION['user'] = $e;
            header('location:user');
        }
        else
        {
            $err = "<font color='red'>Invalid login details. Please try to fill correctly</font>";
        }
    }
}
?>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form method="post">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><h2>Student Login Form</h2></div>
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><?php echo @$err; ?></div>
            </div>

            <div class="row" style="margin-top:10px">
                <div class="col-sm-4">Enter Your Email</div>
                <div class="col-sm-5">
                    <input type="email" name="e" class="form-control" required />
                </div>
            </div>
            
            <div class="row" style="margin-top:10px">
                <div class="col-sm-4">Enter Your Password</div>
                <div class="col-sm-5">
                    <input type="password" name="p" class="form-control" required />
                </div>
            </div>
            
            <div class="row" style="margin-top:10px">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <input type="submit" value="Login" name="save" class="btn btn-info" />
                    <a href="forgot_password.php" class="btn btn-warning" style="margin-left: 10px;">Forgot Password?</a>
                </div>
            </div>
        </form>    
    </div>
</div>
