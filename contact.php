<?php

// Message vars
    $msg = '';
    $msgClass = '';
        // If Form Gets Submitted

        if(filter_has_var(INPUT_POST, 'submit')){
            // Data gets Passed from here
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            if(!empty($name) && !empty($email) && !empty($message)){
                // Passed
                //check email
                if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    $msg = 'Please Enter the valid email';
                $msgClass = 'alert-danger';
                }
            }else{
                $msg = 'Please fill all the fields';
                $msgClass = 'alert-danger';
            }
        } else{
            // Passed
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <title>Contact Us Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Contact US :)</a>
    </nav>
    <?php if($msg != ''): ?>
    <div class="alert alert-dismissible <?php echo $msgClass; ?>">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php echo $msg; ?></strong>
</div>
    <?php endif; ?>   
    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>" >
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" placeholder="Enter the Message Here!"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
        </div>
        <br>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>
</html>