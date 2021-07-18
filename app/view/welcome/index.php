<form method="POST" id="simple_form" >
    <input type="text" name="user_fname" id="user_fname" placeholder="First Name" value="<?php echo $data['user_fname']; ?>" /><br />
    <input type="text" name="user_lname" id="user_lname" placeholder="Last Name" value="<?php echo $data['user_lname']; ?>" /><br />
    <input type="text" name="user_phone" id="user_phone" placeholder="Last Name" value="<?php echo $data['user_phone']; ?>" /><br />
    <input type="text" name="user_email" id="user_email" placeholder="Email" value="<?php echo $data['user_email']; ?>" /><br />
    <input type="password" name="user_pass" id="user_pass" placeholder="Email" value="<?php echo $data['user_pass']; ?>" /><br />
    <input type="submit" value="Send" name='submit' />
</form>
