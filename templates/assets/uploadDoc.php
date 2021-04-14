
<?php
$errormsg1 = "";
$errormsg2 = "";
$errormsg3 = "";
$errormsg4 = "";
$errormsg5 = "";
$errormsg6 = "";
$errormsg7 = "";
$errormsg8 = "";
// a file was uploaded
if (isset($_FILES["filename"])) {
    // path to prepend to the file
    $filepath = "pdf/MLbusbook.pdf";

    // file name for uploaded file
    $filename = basename($_FILES["filename"]["name"]);
    $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($filetype == "pdf") {
        unlink($filepath);
        move_uploaded_file($_FILES["filename"]["tmp_name"], $filepath);
    } else {
        $errormsg1 .= "incorrect file type or No File Uploaded";
    }
    if (isset($_FILES["filename2"])) {
        // path to prepend to the file
        $filepath = "pdf/MSLbusbook.pdf";

        // file name for uploaded file
        $filename = basename($_FILES["filename2"]["name"]);
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
        if ($filetype == "pdf") {
            unlink($filepath);
            move_uploaded_file($_FILES["filename2"]["tmp_name"], $filepath);
        } else {
            $errormsg2 .= "incorrect file type or No File Uploaded";
        }
        if (isset($_FILES["filename3"])) {
            // path to prepend to the file
            $filepath = "pdf/BLbusbook.pdf";
    
            // file name for uploaded file
            $filename = basename($_FILES["filename3"]["name"]);
            $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
            if ($filetype == "pdf") {
                unlink($filepath);
                move_uploaded_file($_FILES["filename3"]["tmp_name"], $filepath);
            } else {
                $errormsg3 .= "incorrect file type or No File Uploaded";
            }
            if (isset($_FILES["filename4"])) {
                // path to prepend to the file
                $filepath = "pdf/BSLbusbook.pdf";
        
                // file name for uploaded file
                $filename = basename($_FILES["filename4"]["name"]);
                $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            
                if ($filetype == "pdf") {
                    unlink($filepath);
                    move_uploaded_file($_FILES["filename4"]["tmp_name"], $filepath);
                } else {
                    $errormsg4 .= "incorrect file type or No File Uploaded";
                }
                if (isset($_FILES["filename5"])) {
                    // path to prepend to the file
                    $filepath = "pdf/MAbusbook.pdf";
            
                    // file name for uploaded file
                    $filename = basename($_FILES["filename5"]["name"]);
                    $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                
                    if ($filetype == "pdf") {
                        unlink($filepath);
                        move_uploaded_file($_FILES["filename5"]["tmp_name"], $filepath);
                    } else {
                        $errormsg5 .= "incorrect file type or No File Uploaded";
                    }
                    if (isset($_FILES["filename6"])) {
                        // path to prepend to the file
                        $filepath = "pdf/SAbusbook.pdf";
                
                        // file name for uploaded file
                        $filename = basename($_FILES["filename6"]["name"]);
                        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    
                        if ($filetype == "pdf") {
                            unlink($filepath);
                            move_uploaded_file($_FILES["filename6"]["tmp_name"], $filepath);
                        } else {
                            $errormsg6 .= "incorrect file type or No File Uploaded";
                        }
                        if (isset($_FILES["filename7"])) {
                            // path to prepend to the file
                            $filepath = "pdf/Abusbook.pdf";
                    
                            // file name for uploaded file
                            $filename = basename($_FILES["filename7"]["name"]);
                            $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                        
                            if ($filetype == "pdf") {
                                unlink($filepath);
                                move_uploaded_file($_FILES["filename7"]["tmp_name"], $filepath);
                            } else {
                                $errormsg7 .= "incorrect file type or No File Uploaded";
                            }
                            if (isset($_FILES["filename8"])) {
                                // path to prepend to the file
                                $filepath = "pdf/Pbusbook.pdf";
                        
                                // file name for uploaded file
                                $filename = basename($_FILES["filename8"]["name"]);
                                $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                            
                                if ($filetype == "pdf") {
                                    unlink($filepath);
                                    move_uploaded_file($_FILES["filename8"]["tmp_name"], $filepath);
                                } else {
                                    $errormsg8 .= "incorrect file type or No File Uploaded";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>

<?php
$path = "../";
$page = "Honor Flights of Rochester :: Update Bus Book";
include $path . "assets/inc/header.php";
session_start();
if ($_SESSION['role'] != 'Mission Operations' && $_SESSION['role'] != 'IT Administrator') {
  // Change to access denied page
  //echo $_SESSION['role'];
  header("Location: denied.php");
}


?>    
<section id='tester' class="hero has-background-link-dark is-bold">
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            Update Bus Books
        </h1>
        </div>
    </div>
</section>
<br>
<div class="container">
<form action="#" method=POST enctype=multipart/form-data>
    <p>Mission Leader</p>
    <input type="file" id="ML" name="filename">
<?php if (!empty($errormsg2)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg1 ?></span>
<?php endif; ?>
    <p>Mission Safety Leader</p>
    <input type="file" id="MSL" name="filename2">
<?php if (!empty($errormsg3)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg2 ?></span>
<?php endif; ?>
    <p>Bus Leader</p>
    <input type="file" id="BL" name="filename3">
<?php if (!empty($errormsg4)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg3 ?></span>
<?php endif; ?>
    <p>Bus Safety Leader</p>
    <input type="file" id="BSL" name="filename4">
<?php if (!empty($errormsg5)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg4 ?></span>
<?php endif; ?>
    <p>Mission Assistant</p>
    <input type="file" id="MA" name="filename5">
<?php if (!empty($errormsg6)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg5 ?></span>
<?php endif; ?>
    <p>Safety Assistant</p>
    <input type="file" id="SA" name="filename6">
<?php if (!empty($errormsg7)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg6 ?></span>
<?php endif; ?>
    <p>Advance Team</p>
    <input type="file" id="A" name="filename7">
<?php if (!empty($errormsg8)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg7 ?></span>
<?php endif; ?>
    <p>Photographer</p>
    <input type="file" id="P" name="filename8">
<?php if (!empty($errormsg1)): ?>
    <span style="font-weight: bold; color: red;"><?= $errormsg8 ?></span>
<?php endif; ?>
    <br><br>
    <input type="submit">
</form>
</div>
<br>
<?php
    include $path."assets/inc/footer.php";

?>