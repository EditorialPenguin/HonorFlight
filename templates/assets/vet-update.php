<?php
$path = "../";
$page = "Honor Flights of Rochester :: Veteran Information";
include $path . "assets/inc/header.php";
?>
<style>
.control {
  size:30px;
}


</style>

<!-- header -->
<section class="hero has-background-link-dark is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Update Information
      </h1>
    </div>
  </div>
</section>
<div class="tabs is-centered is-large">
  <ul>
    <li class="is-active"><a>Personal</a></li>
    <li><a>Guardian</a></li>
    <li><a>Medical</a></li>
    <li><a>Others</a></li>
  </ul>
</div>


<!-- Personal field inputs -->
<div class="container">
  <div class="is-grouped" id="personal">
    <div class="columns">
      <div class="column is-half">
        <div class="field">
          <label class="label">Veteran ID</label>
          <div class="control">
            <input class="text" type="text" disabled></input>
          </div>

        </div>
        <div class="field">
          <label class="label">First Name</label>
          <div class="control">
            <input class="input" type="text" placeholder="John">
          </div>
        </div>

        <div class="field">
          <label class="label">Middle Initial</label>
          <div class="control">
            <input class="input" type="text" placeholder="S">
          </div>
        </div>

        <div class="field">
          <label class="label">Last Name</label>
          <div class="control">
            <input class="input" type="text" placeholder="Doe">
          </div>
        </div>

        <div class="field">
          <label class="label">Nickname</label>
          <div class="control">
            <input class="input" type="text" placeholder="JDoe">
          </div>
        </div>

        <div class="field">
          <label class="label">Gender</label>
          <div class="control">
            <div class="select">
              <select>
                <option value="none" selected disabled hidden>Select</option>
                <option value='M'>Male</option>
                <option value='F'>Female</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Address</label>
          <div class="control">
            <input class="input" type="text" placeholder="123 Alien">
          </div>
        </div>

        <div class="field">
          <label class="label">City</label>
          <div class="control">
            <input class="input" type="text" placeholder="AlienCity">
          </div>
        </div>

        <div class="field">
          <label class="label">State</label>
          <div class="control">
            <input class="input" type="text" placeholder="AlienWorld">
          </div>
        </div>

        <div class="field">
          <label class="label">Zip Code</label>
          <div class="control">
            <input class="input" type="text" placeholder="00000">
          </div>
        </div>

        <div class="field">
          <label class="label">Email</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input is-danger" type="email" placeholder="alien@alienworld.com" required>
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fas fa-exclamation-triangle"></i>
            </span>
          </div>
          <!-- p class="help is-danger">This email is invalid</p> -->
        </div>

        <div class="field">
          <label class="label">Day Phone</label>
          <div class="control">
            <input class="input" type="text" placeholder="(000)-000-0000">
          </div>
        </div>

        <div class="field">
          <label class="label">Cell Phone</label>
          <div class="control">
            <input class="input" type="text" placeholder="(000)-000-0000" required>
          </div>
        </div>

        <div class="field">
          <label class="label">Date of Birth</label>
          <div class="control">
            <input class="date" type="date" placeholder="00/00/0000" required>
          </div>
        </div>
      </div>
      <div class="column is-half">
        <div class="field">
          <label class="label">Weight</label>
          <div class="control">
            <input class="number" id="number" name="number" min="90" max="200" required>
          </div>
        </div>

        <div class="field">
          <label class="label">Service Branch</label>
          <div class="control">
            <input class="input" type="text" placeholder="">
          </div>
        </div>

        <div class="field">
          <label class="label">Service Rank</label>
          <div class="control">
            <input class="input" type="text" placeholder="">
          </div>
        </div>

        <div class="field">
          <label class="label">Service Years</label>
          <div class="control">
            <input class="input" type="text" placeholder="1984">
          </div>
        </div>

        <div class="field">
          <label class="label">
            Service WW2
            <input type="checkbox">
          </label>
        </div>

        <div class="field">
          <label class="label">
            Service Korea
            <input type="checkbox">
          </label>
        </div>

        <div class="field">
          <label class="label">
            Service Cold War
            <input type="checkbox">
          </label>
        </div>

        <div class="field">
          <label class="label">
            Service Vietnam
            <input type="checkbox">
          </label>
        </div>

        <div class="field">
          <label class="label">Service Activity</label>
          <div class="control">
            <textarea class="input" type="textarea" placeholder=""></textarea>
          </div>
        </div>

        <div class=columns>
          <div class="column one-third">
            <div class="field">
              <label class="label">Mission ID</label>
              <div class="control">
                <input class="input" type="text">
              </div>
            </div>
          </div>

          <div class="column one-third">
            <div class="field">
              <label class="label">Bus ID</label>
              <div class="control">
                <input class="input" type="text" maxlength=4>
              </div>
            </div>
          </div>

          <div class="column one-third">
            <div class="field">
              <label class="label">Team ID</label>
              <div class="control">
                <input class="input" type="text">
              </div>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">How Heard</label>
          <div class="control">
            <input class="input" type="text" placeholder="">
          </div>
        </div>
      </div>
    </div>
  </div>




    <!---------------------------------- Guardian field inputs ----------------------------------->
  <div class="is-grouped is-hidden" id="guardian">
    <div class="field">
      <label class="label">Guardian ID</label>
      <div class="control">
        <input class="number" type="number" placeholder="Enter your Guardian ID" required>
      </div>
    </div>

    <div class="field">
      <label class="label">Guardian Relation</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter your Guardian Relation">
      </div>
    </div>

    <div class="field">
      <label class="label">Add Specific Guardian</label>
      <div class="control">
        <input class="input" type="text" placeholder="">
      </div>
    </div>

    <div class="field">
      <label class="label">Guardian Phone</label>
      <div class="control">
        <input class="input" type="text" placeholder="(000)000-0000" required>
      </div>
    </div>

    <div class="field">
      <label class="label">Emergency Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter your Emergency Name">
      </div>
    </div>

    <div class="field">
      <label class="label">Emergency Relationship</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter your Emergency Relationship">
      </div>
    </div>

    <div class="field">
      <label class="label">Emergency Address</label>
      <div class="control">
        <input class="input" type="text" placeholder="Enter your Emergency Address">
      </div>
    </div>

    <div class="field">
      <label class="label">Emergency Day Phone</label>
      <div class="control">
        <input class="input" type="text" placeholder="(000)000-0000">
      </div>
    </div>

    <div class="field">
      <label class="label">Emergency Cell Phone</label>
      <div class="control">
        <input class="input" type="text" placeholder="(000)000-0000">
      </div>
    </div>
  </div>



  <!------------------------------------- Medical field inputs ----------------------------------->
  <div class="is-grouped" id="medicalUpdate">
    <div class="field">
      <label class="label">Med Code</label>
      <div class="control">
        <input class="input" type="text" placeholder="">
      </div>
    </div>

    <div class="field">
      <label class="label">Diet Restrictions</label>
      <div class="control">
        <textarea class="input" type="textarea" placeholder=""></textarea>
      </div>
    </div>

    <div class="field">
      <label class="label">Med List</label>
      <div class="control">
        <textarea class="input" type="textarea" placeholder="Describe your med lists"></textarea>
      </div>
    </div>

    <div class="field">
      <label class="label">Med Others</label>
      <div class="control">
        <textarea class="input" type="textarea" placeholder=""></textarea>
      </div>
    </div>

    <div class="columns">
      <div class="column is-one-third">
          <div class="field">
            <label class="label">
              Med Cane
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Walker
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Wheelchair
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Chair Loc
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Scooter
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Stairs
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Stand 30 Mins
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med HBP
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Transport Airport
              <input type="checkbox">
            </label>
          </div>
        </div>

        <div class="column is-third">
          <div class="field">
            <label class="label">
              Med Transport Trip
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Colostomy
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Cancer
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med DNR
              <input type="checkbox">
            </label>
          </div>


          <div class="field">
            <label class="label">
              Med Chair Loc
              <input type="checkbox">
            </label>
          </div>


          <div class="field">
            <label class="label">
              Med Emphysema
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Falls
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Heart Disease
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Pacemaker
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Joint Replacement
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Kidney
              <input type="checkbox">
            </label>
          </div>
        </div>
        <div class="column">
          <div class="field">
            <label class="label">
              Med Diabetes
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Seizures
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Urostomy
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Demetia
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Nebulizer
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Oxygen
              <input type="checkbox">
            </label>
          </div>
          <div class="field">
            <label class="label">
              Med Stroke
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med Urinary
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">
              Med CPAP
              <input type="checkbox">
            </label>
          </div>

          <div class="field">
            <label class="label">Med Flow Rate</label>
            <div class="control">
              <textarea class="input" type="textarea" placeholder=""></textarea>
            </div>
          </div>  

          <div class="field">
              <label class="label">
                Med Use Mobility
                <input type="checkbox">
              </label>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="is-grouped is-hidden" id="other">
    <div class="field">
      <label class="label">Add Other Vets</label>
      <div class="control">
        <input class="input" type="text" placeholder="">
      </div>
    </div>

    <div class="field">
      <label class="label">Add Vet Names</label>
      <div class="control">
        <textarea class="input" type="textarea" placeholder=""></textarea>
      </div>
    </div>

    <div class="field">
      <label class="label">Shirt Size</label>
      <div class="control">
        <div class="select">
          <select>
            <option value="none" selected disabled hidden>Select</option>
            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
          </select>
        </div>
      </div>
    </div>

    <div class="field">
      <label class="label">Alternative Name</label>
      <div class="control">
        <input class="input" type="text" placeholder="Alt name">
      </div>
    </div>

    <div class="field">
      <label class="label">Alternative Phone</label>
      <div class="control">
        <input class="input" type="text" placeholder="(000)000-0000">
      </div>
    </div>

    <div class="field">
      <label class="label">Alternative Email</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input is-danger" type="email" placeholder="alien@alienworld.com">
        <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
      </div>
    </div>

    <div class="field">
      <label class="label">Alternative Relationship</label>
      <div class="control">
        <input class="input" type="text" placeholder="(000)000-0000">
      </div>
    </div>

    <div class="field">
      <label class="label">Add Comments</label>
      <div class="control">
        <textarea class="input" type="textarea" placeholder=""></textarea>
      </div>
    </div>

    <div class="field">
      <label class="label">App Date</label>
      <div class="control">
        <input class="input" type="date" placeholder="">
      </div>
    </div>

    <div class="field">
      <label class="label">Admin Comments</label>
      <div class="control">
        <textarea class="input" type="textarea" placeholder=""></textarea>
      </div>
    </div>
    <div class="field">
      <label class="label">Last Updated</label>
      <div class="control">
        <input class="input" type="datetime-local" placeholder="">
      </div>
    </div>
  </div>
</div>
</div>

<?php include $path . "assets/inc/footer.php";?>
