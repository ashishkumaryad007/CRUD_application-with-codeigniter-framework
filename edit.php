<!DOCTYPE html>
<head>
    <tittle>CRUD Application - Update User</tittle>
    <link rel="Stylesheet" type="text/css" 
    href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="#" class= "navbar-brand">CRUD Application</a>
        </div>
    </div>
    <div class="container" style="padding-top: 10px;">
        <h3>Update User</h3>
        <hr>
        <form method="post" name="UpdateUser" action="<?php echo base_url().'index.php/User/edit/'.$user['id'];?>">
        <div class ="row">
            <div class= "col-md-6">
                <div class= "form-group">
                    <lible>Name</lable>
                    <input type="text" name="name" value="<?php echo set_value('name',$user['name']);
                    // to avoid from loosing the name in the name space ?>" class ="form-control">
                    <?php echo form_error('name');?>
                </div>
                <div class= "form-group">
                    <lible>Email</lable>
                    <input type="text" name="email" value="<?php echo set_value('email',$user['email']);
                    //to avoid from lossing the email in the name space ?>" class ="form-control">
                    <?php echo form_error('email');?>
                </div>
                <div class= "form-group">
                    <lible>Mobile</lable>
                    <input type="text" name="mobile" value="<?php echo set_value('mobile',$user['mobile']);
                    //to avoid from lossing the mobile in the name space ?>" class ="form-control">
                    <?php echo form_error('mobile');?>
                </div>
                <div class= "form-group">
                    <lible>Password</lable>
                    <input type="text" name="password" value="<?php echo set_value('password',$user['password']);
                    //to avoid from lossing the password in the name space ?>" class ="form-control">
                    <?php echo form_error('password');?>
                </div>
                <div class= "form-group">
                    <button class="btn btn-primary">Update</button>
                    <a href="" class="btn-danger btn">Cancel</a>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>