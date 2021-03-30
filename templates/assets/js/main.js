const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const incorrectlogin = urlParams.get('incorrect');
const names = urlParams.get('name');
const role = urlParams.get('role');
const ngrok = urlParams.get('ngrok');

console.log(JSON.stringify(names))

function incorrect()
{
  if(incorrectlogin == "True")
  {
    document.getElementById("incorrect").style.display = "";
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    console.log(newurl);
    window.history.pushState({path:newurl}, "", newurl);
  }


  
  else{
    //document.getElementById("names").innerHTML= "Hi, " + names;
    // document.getElementById("role").innerHTML= "Role: " + role;
  }
}

document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        var $target = document.getElementById(target);

        $target?.classList.toggle('is-active');

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');


      });
    });
  }

});

var vetdata; 
async function getVeterans() { 
  await fetch('http://localhost:5000/getVeterans', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(res => res.json()).then(data => vetdata = data);
}

var teamdata;
async function getTeams() {
  await fetch('http://localhost:5000/getTeams', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => teamdata = data);
}

var logInfo;
async function getInfo() {
  await fetch('http://localhost:5000/getVeterans', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => console.log(data));
}

var singleVet;
async function getSingleVet(veteran_id) {
  await fetch('http://localhost:5000/getVeterans?veteran_id=' + veteran_id, { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => singleVet = data);
}

var accounts;
async function getAccounts(veteran_id) {
  await fetch('http://localhost:5000/getAccounts', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => accounts = data);
}


async function veteranInfo(number) {
  var i;
  await getVeterans();
  await getTeams();
  var fname = [];
  var lname = [];
  var id = [];
  var mid = [];
  var tcolor = [];
  for (i = 0; i < vetdata.length; i++) {
    const values = Object.entries(vetdata[i]);
    for (z = 0; z < values.length; z++){
      if(values[z][0] == "first_name"){
        fname.push(values[z][1]);
      }
      if(values[z][0] == "veteran_id"){
        id.push(values[z][1]);
      }
      if(values[z][0] == "mission_id"){
        mid.push(values[z][1]);
      }
      if(values[z][0] == "last_name"){
        lname.push(values[z][1]);
      }
      if(values[z][0] == "team_id"){
        for (y = 0; y < teamdata.length; y++) {
          const tvalues = Object.entries(teamdata[y]);
          for (x = 0; x < tvalues.length; x++){
            if(tvalues[x][1] == values[z][1]){
              tcolor.push(tvalues[(x-4)][1]);
            }
          }
        }
      }
    }
  }
  if(number == 0){
    popVetList(fname, lname, tcolor, id);
  } else if(number == 1){
    popVetUpdateList(id, fname, lname, mid);
  }
}

async function userInfo(number) {
  var i;
  await getAccounts();
  var id = [];
  var users = [];
  var passwords = [];
  var roles = [];
  for (i = 0; i < accounts.length; i++) {
    const values = Object.entries(accounts[i]);
    for (z = 0; z < values.length; z++){
      if(values[z][0] == "id"){
        id.push(values[z][1]);
      }
      if(values[z][0] == "username"){
        users.push(values[z][1]);
      }
      if(values[z][0] == "role"){
        roles.push(values[z][1]);
      }
      if(values[z][0] == "password"){
        passwords.push(values[z][1]);
      }
    }
  }
  popUserList(id, users, roles);
}

function popVetList(fname, lname, tcolor, id){
  for (i = 0; i < fname.length; i++){
    document.getElementById("tableID").innerHTML += "<tr><td>" + fname[i] + "</td><td>" + lname[i] + "</td><td>" + tcolor[i] + "</td><td><a href='vet-med.php' onmouseover='saveName(" + id[i] + ");'>" + "Medicial Information" + "</a></td><td><a href='#'>" + "Incident Report" + "</a></td></tr>";

  }
}

function popVetUpdateList(id, fname, lname, mid){
  for (i = 0; i < fname.length; i++){
    document.getElementById("vetUpdate").innerHTML += "<tr><td>" + id[i] + "</td><td>" + fname[i] + "</td><td>" + lname[i] + "</td><td>" + mid[i] + "</td><td><a href='vet-update.php' onmouseover='saveName(" + id[i] + ");'>Update Veteran</a></td></tr>";
  }
}

function popUserList(id, username, roles){
  for (i = 0; i < id.length; i++){
    document.getElementById("users").innerHTML += "<tr><td>" + id[i] + "</td><td>" + username[i] + "</td><td>" + roles[i] + "</td></tr>";
  }
}

async function medicalInfo(ID){
  const fields = [
    ["add_comments","Comments"],
    ["diet_restrictions","Diet Restrictions"],
    ["dob", "DOB"],
    ["emergency_address","Emergency Address"],
    ["emergency_cell_phone", "Emergency Cell Phone"],
    ["emergency_day_phone", "Emergency Day Phone"],
    ["emergency_name","Emergency Name"],
    ["emergency_relationship","Emergency Relationship"],
    ["first_name","First Name"],
    ["gender","Gender"],
    ["guardian_id","Guardian ID"],
    ["guardian_phone","Guardian Phone"],
    ["guardian_relation", "Guardian Relation"],
    ["last_name","Last Name"],
    ["med_cancer", "Has/Had Cancer"],
    ["med_cane","Has Cane"],
    ["med_chair_loc", "Requires Chair Lift"],
    ["med_code","Medical Code"],
    ["med_colostomy", "Has Colostomy"],
    ["med_cpap", "Has CPAP"],
    ["med_dementia", "Has Dementia"],
    ["med_diabetes", "Has Diabetes"],
    ["med_dnr", "Do Not Resuscitate"],
    ["med_emphysema", "Has Emphysema"],
    ["med_falls", "Prone to Falls"],
    ["med_flow_rate", "Oxygen Flow Rate"],
    ["med_hbp", "Has HBP"],
    ["med_heart_disease", "Has Heart Disease"],
    ["med_joint_replacement", "Had Joint Replacement"],
    ["med_kidney", "Kidney Issues"],
    ["med_list", "Medicine List"],
    ["med_nebulizer", "Has Nebulizer"],
    ["med_others", "Other Medicial Issues"],
    ["med_oxygen", "Has Oxygen"],
    ["med_pacemaker", "Has Pacemaker"],
    ["med_scooter", "Has Scooter"],
    ["med_seizures", "Prone to Seizures"],
    ["med_stairs", "Can use Stairs"],
    ["med_stand_30min", "Can Stand for 30 Min"],
    ["med_stroke", "Had Stroke"],
    ["med_transport_airport", "Airport Transport Assistance"],
    ["med_transport_trip", "Trip Transport Assistance"],
    ["med_urinary", "Urinary Issues"],
    ["med_urostomy", "Has Urostomy"],
    ["med_use_mobility", "Need Mobility Help"],
    ["med_walker", "Needs Walker"],
    ["med_wheelchair", "Needs Wheelchair"],
    ["middle_initial","Middle Initial"],
    ["weight","Weight"]]
  console.log(fields[0][0]);
  await getSingleVet(ID);
  var medical = [];
  var personal = [];
  var guardian = [];
  for(x = 0; x < singleVet.length; x++){
    const values = Object.entries(singleVet[0]);
    for(y = 0; y < values.length; y++){
      for(z = 0; z < fields.length; z++){
        if(values[y][0] == fields[z][0]){
          if(values[y][0].includes('guardian') || values[y][0].includes("emergency")){
            guardian.push([fields[z][1],values[y][1]]);
          } 
          else if(["weight", "add_comments", "diet_restrictions"].indexOf(values[y][0]) >= 0 || 
                  (values[y][0].includes('med_') && !values[y][0].includes("med_code"))){
            medical.push([fields[z][1],values[y][1]]);
          }
          else{
            personal.push([fields[z][1],values[y][1]]);
          }
        }
      }
    }
  }
  console.log(medical);
  console.log(personal);
  console.log(guardian);
  for(x = 0; x < personal.length; x++){
    document.getElementById("personal").innerHTML += "<tr><td>" + personal[x][0] + "</td><td>" + String(personal[x][1]) + "</td></tr>";
  }
  for(x = 0; x < guardian.length; x++){
    document.getElementById("guardian").innerHTML += "<tr><td>" + guardian[x][0] + "</td><td>" + String(guardian[x][1]) + "</td></tr>";
  }
  for(x = 0; x < medical.length; x++){
    document.getElementById("medical").innerHTML += "<tr><td>" + medical[x][0] + "</td><td>" + String(medical[x][1]) + "</td></tr>";
  }
}
