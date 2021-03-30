<?php
    /* at the top of 'check.php' */
    //else ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        //header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        /* choose the appropriate page to redirect users */
        //die( header( 'location: ../index.php' ) );

    //}
?>

<?php
    $path = "../";
	$page = "Honor Flights of Rochester :: Mission";
	include $path."assets/inc/header.php";
?>
<section class="hero has-background-link-dark is-bold">
    <div class="hero-body">
    <div class="container">
        <span id="name"></span><br>
        <span id="role"></span>
      <h1 class="title">Mission Information</h1>
    </div>
    </div>
  </section>
<!-- testing  -->
<section class="hero is-medium">
    <div class="hero-body">
        <div class="container">
            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                    <p class="title">Current Mission</p>
                    <p class="subtitle">Rochester, NY to DC, Maryland</p>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
                    </div>
                    </article>
                </div>
                <div class="tile is-parent is-8">
                    <article class="tile is-child box">
                    <p class="title">Upcoming Missionn</p>
                    <p class="subtitle">DC, Maryland to Rochester, NY</p>
                    <div class="content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
                    </div>
                    </article>
                </div>
            </div>>
        </div>
    </div>
</section>
<?php
    include $path."assets/inc/footer.php";

?>