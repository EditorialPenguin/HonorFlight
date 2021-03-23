<?php
    $path = "./";
	$page = "Honor Flights of Rochester :: Login";
	include $path."assets/inc/header.php";
?>  


<style>
    h1, h2 {
        color: #ffffff !important;
    }

    @media screen and (max-width: 1024px){
        #titled {
            display: none !important; 
        }
    }
</style>

<div class="columns is-mobile">
  <div class="column is-full-mobile is-full-tablet is-half-desktop is-one-half-widescreen is-one-half-fullhd">
  <section class="hero is-white is-fullheight">
      <div class="hero-body">
        <div class="container">
          <div class="columns is-centered">
            <div class="column is-6-tablet is-6-desktop is-6-widescreen">
              <form action="" class="box has-background-grey-lighter">
                <div class="field">
                  <label for="" class="label">Username</label>
                  <div class="control">
                    <input type="email" placeholder="e.g. adminUser" class="input" required>
                  </div>
                </div>
                <div class="field">
                  <label for="" class="label">Password</label>
                  <div class="control">
                    <input type="password" placeholder="*******" class="input" required>
                  </div>
                </div>
                <div class="field">
                  <label for="" class="checkbox">
                    <input type="checkbox">
                      Remember me
                  </label>
                </div>
                <div class="field has-text-centered">
                  <button class="button is-dark">
                    Login
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="column">
  <section id="titled" class="hero has-background-link-dark is-fullheight">
    <div class="hero-body is-half">
      <div class="container has-text-centered">  
        <h1 class="title">
          Honor Flight of Rochester
        </h1>
        <h2 class="subtitle">
          Find your Flight!
        </h2>
      </div>
    </div>
  </section>
  </div>
  </div>
<?php
	include $path."assets/inc/footer.php";
?>  