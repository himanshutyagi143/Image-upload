<?php
if(isset($_POST['upload']))
{
    // print_r($_FILES);
    $size = $_FILES['img']['size']/1048576;
    $type = $_FILES['img']['type'];
    $arr = array("image/png","image/jpeg");
    if($type == "image/png" OR $type == "image/jpeg")
    {
        if($size <= 2 )
        {
$temp = $_FILES['img']['tmp_name'];
$name = $_FILES['img']['name'];
move_uploaded_file($temp,"images/$name");
$msg = "File Uploaded";
        }
        else
        {
            $msg = "Image Size must be less than 2 mb";
        }
    }
    elseif($type != "image/jpeg")
    {
        $msg = "Image should be in jpg or png";
    }
    elseif($type != "image/png")
    {
        $msg = "Image should be in jpg or png";
    }
    else
    {
        $msg = "Image should be in jpg or png";
        $msg = "Image Size must be less than 2 mb";
    }
}

?>


<form method="post" enctype="multipart/form-data">
<input type="file" name="img">
<input type="submit" name="upload" value="UPLOAD">
</form>
<div style="color: red;"><?php echo @$msg; ?></div>