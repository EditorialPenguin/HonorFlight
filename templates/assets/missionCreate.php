<?php
$path = "../";
$page = "Honor Flights of Rochester :: Veteran Information";
include $path . "assets/inc/header.php";

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
            Create a Mission
        </h1>
        </div>
    </div>
</section>



<?php
    include $path."assets/inc/footer.php";

?>