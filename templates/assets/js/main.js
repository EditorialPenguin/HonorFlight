/* 
Honor Flight of Rochester Project
Contributors: Jared Slavin, Quoc Huynh, Enrique Grino, Kyle Clark, Ian Carter, Ryan Gray

This JavaScript file mainly sanitizes the information and places it in a readable format for
the users. The code also allows for the burger menu to come and go on click commands.
*/
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const incorrectlogin = urlParams.get('incorrect');
const names = urlParams.get('name');
const role = urlParams.get('role');
const ngrok = urlParams.get('ngrok');


//If the login is 
if (document.getElementById("login_form") != null) {

  login_form.action = window.location + ":5000/login"
}
function incorrect()
{
  if(incorrectlogin == "True")
  {
    document.getElementById("incorrect").style.display = "";
    var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname;
    window.history.pushState({path:newurl}, "", newurl);
  }
}

//This loads the page and waits fro a response
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
        console.log(target);
        var $target = document.getElementById(target);

        $target?.classList.toggle('is-active');

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');


      });
    });
  }

});

//used to reach the data endpoint for veteran information
var vetdata; 
async function getVeterans() { 
  await fetch('http://192.168.1.103:5000/getVeterans', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(res => res.json()).then(data => vetdata = data);
}

//used to reach the data endpoint for team information
var teamdata;
async function getTeams() {
  await fetch('http://192.168.1.103:5000/getTeams', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => teamdata = data);
}

//used to reach the data endpoint for mission information
var missions;
async function getMissions() {
  await fetch('http://192.168.1.103:5000/getMissions', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => missions = data);
}

//used to reach the data endpoint for account information
var logInfo;
async function getInfo() {
  await fetch('http://192.168.1.103:5000/getVeterans', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => console.log(data));
}

//used to reach the data endpoint for the specific veteran that is passed into it
//using the parameter veteran_id
var singleVet;
async function getSingleVet(veteran_id) {
  await fetch('http://192.168.1.103:5000/getVeterans?veteran_id=' + veteran_id, { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => singleVet = data);
}

//used to reach the data endpoint for veterans medical information
var accounts;
async function getAccounts(veteran_id) {
  await fetch('http://192.168.1.103:5000/getAccounts', { method: 'GET', headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' } }).then(response => response.json()).then(data => accounts = data);
}

//Function sanitizes the information from the API
async function missionInfo(){
  await getMissions();//Waiting for getMissions() to finish gathering its information

  //Creating Array for data storage
  var mid = [];
  var mname = [];
  var sdate = [];
  var edate = [];

  //begins iterating through the missions variable that is initialized in the getMission 
  //API Get request
  for(x = 0; x < missions.length; x++){
    const values = Object.entries(missions[x]);//changes the object to an array from a dictionary

    //iiterates through the 
    for(i = 0; i < values.length; i++){
      if(values[i][0] == "mission_id"){
        console.log(values[i][1])
        mid.push(values[i][1]);
      }
      if(values[i][0] == "title"){
        mname.push(values[i][1]);
      }
      if(values[i][0] == "start_date"){
        sdate.push(values[i][1]);
      }
      if(values[i][0] == "end_date"){
        edate.push(values[i][1]);
      }
    }
  }
  console.log(mid);
  console.log(mname);
  console.log(sdate);
  console.log(edate);
  popMissionList(mid, mname, sdate, edate);
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
  var comments = [];
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
      if(values[z][0] == "add_comments"){
        comments.push(values[z][1]);
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
    popVetList(fname, lname, tcolor, id, comments);
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

//This functiion populates the veteran list so users can see their bus location
function popVetList(fname, lname, tcolor, id, comment){
  for (i = 0; i < fname.length; i++){
    //places the information in the table specified
    document.getElementById("vetTable").innerHTML += "<tr><td>" + fname[i] + "</td><td>" + lname[i] + "</td><td>" + tcolor[i] + "</td><td><a href='vet-med.php' onmouseover='saveName(" + id[i] + ");'>" + "Medical" + "</a></td><td><a href='javascript:;' onclick='openCommentModal(" + id[i] + ", " + JSON.stringify(comment[i]) + ")'>" + "Add Comment" + "</a></td></tr>";
  }
}

//This function populates the user table so the admin can see all the users and changes passwords
function popUserList(id, username, roles){
  for (i = 0; i < id.length; i++){
    //places the information in the table specified
    document.getElementById("users").innerHTML += "<tr><td>" + username[i] + "</td><td>" + roles[i] + "</td><td><a href='javascript:;' onclick='openPasswordModal(" + id[i] + ", " + JSON.stringify(username[i]) + ", " + JSON.stringify(roles[i]) + ");'>Change Password</a></td></tr>";
  }
}

function popMissionList(mid, mname, sdate, edate){
  for (i = 0; i < mid.length; i++){
    //places the information in the table specified
    document.getElementById("missiontable").innerHTML += "<tr><td>"+ mname[i] + "</td><td>" + sdate[i] + "</td><td>" + edate[i] + "</td></tr>";

  }
}

//sanitizing the medicual information for each veteran
async function medicalInfo(ID){
  //list of new field names inside an array
  const fields = [
    ["first_name","First Name"],
    ["last_name","Last Name"],
    ["middle_initial","Middle Initial"],
    ["dob", "DOB"],
    ["gender","Gender"],
    ["med_code","Medical Code"],
    ["add_comments","Comments"],
    ["diet_restrictions","Diet Restrictions"],
    ["emergency_address","Emergency Address"],
    ["emergency_cell_phone", "Emergency Cell Phone"],
    ["emergency_day_phone", "Emergency Day Phone"],
    ["emergency_name","Emergency Name"],
    ["emergency_relationship","Emergency Relationship"],
    ["guardian_id","Guardian ID"],
    ["guardian_phone","Guardian Phone"],
    ["guardian_relation", "Guardian Relation"],
    ["med_cancer", "Has/Had Cancer"],
    ["med_cane","Has Cane"],
    ["med_chair_loc", "Requires Chair Lift"],
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
    ["weight","Weight"]]
  await getSingleVet(ID);
  var medical = [];
  var personal = [];
  var guardian = [];
  for(x = 0; x < singleVet.length; x++){
    const values = Object.entries(singleVet[0]);
    for(y = 0; y < fields.length; y++){
      for(z = 0; z < values.length; z++){
        if(values[z][0] == fields[y][0]){
          if(values[z][0].includes('guardian') || values[z][0].includes("emergency")){
            if(values[z][1] == null){
              guardian.push([fields[y][1],"-"]);
            }else{
              guardian.push([fields[y][1],values[z][1]]);
            }
          } 
          else if(["weight", "diet_restrictions"].indexOf(values[z][0]) >= 0 || 
          (values[z][0].includes('med_') && !values[z][0].includes("med_code"))){
            if(values[z][1] == 0){
              medical.push([fields[y][1],"No"]);
            } else if(values[z][1] == 1){
              medical.push([fields[y][1], "Yes"]);
            }else {
              medical.push([fields[y][1],values[z][1]]);
            }
          }
          else{
            if(values[z][1] == null || values[z][1] == ""){
              personal.push([fields[y][1],"-"]);
            }else{
              personal.push([fields[y][1],values[z][1]]);
            }
          }
        }
      }
    }
  }
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


function getRBY(red, blue, yellow){
  for(x = 0; x < red.length; x++){
    var fname = red[x][0]
    var lname = red[x][1]
    var id = red[x][4]
    document.getElementById("busVets").innerHTML += "<tr><td>" + red[x][0] + "</td><td>" + red[x][1] +  "</td><td>" + red[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(fname) + ", " + JSON.stringify(lname) + ", " + JSON.stringify(id) + ", " + JSON.stringify(red[x][3]) + ");'>" + red[x][3] + "</a></td></tr>";
  }
  for(x = 0; x < blue.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + blue[x][0] + "</td><td>" + blue[x][1] +  "</td><td>" + blue[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(blue[x][0]) + ", " + JSON.stringify(blue[x][1]) + ", " + JSON.stringify(blue[x][4]) + ", " + JSON.stringify(blue[x][3]) + ");'>" + blue[x][3] + "</a></td></tr>";
  }
  for(x = 0; x < yellow.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + yellow[x][0] + "</td><td>" + yellow[x][1] +  "</td><td>" + yellow[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(yellow[x][0]) + ", " + JSON.stringify(yellow[x][1]) + ", " + JSON.stringify(yellow[x][4]) + ", " + JSON.stringify(yellow[x][3]) + ");'>" + yellow[x][3] + "</a></td></tr>";
  }
}

function getGOP(green, orange, purple){
  for(x = 0; x < green.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + green[x][0] + "</td><td>" + green[x][1] +  "</td><td>" + green[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(green[x][0]) + ", " + JSON.stringify(green[x][1]) + ", " + JSON.stringify(green[x][4]) + ", " + JSON.stringify(green[x][3]) + ");'>" + green[x][3] + "</a></td></tr>";
  }
  for(x = 0; x < orange.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + orange[x][0] + "</td><td>" + orange[x][1] +  "</td><td>" + orange[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(orange[x][0]) + ", " + JSON.stringify(orange[x][1]) + ", " + JSON.stringify(orange[x][4]) + ", " + JSON.stringify(orange[x][3]) + ");'>" + orange[x][3] + "</a></td></tr>";
  }
  for(x = 0; x < purple.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + purple[x][0] + "</td><td>" + purple[x][1] +  "</td><td>" + purple[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(purple[x][0]) + ", " + JSON.stringify(purple[x][1]) + ", " + JSON.stringify(purple[x][4]) + ", " + JSON.stringify(purple[x][3]) + ");'>" + purple[x][3] + "</a></td></tr>";
  }
}

function getGST(gold, silver, teal){
  for(x = 0; x < gold.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + gold[x][0] + "</td><td>" + gold[x][1] +  "</td><td>" + gold[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(gold[x][0]) + ", " + JSON.stringify(gold[x][1]) + ", " + JSON.stringify(gold[x][4]) + ", " + JSON.stringify(gold[x][3]) + ");'>" + gold[x][3] + "</a></td></tr>";
  }
  for(x = 0; x < silver.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + silver[x][0] + "</td><td>" + silver[x][1] +  "</td><td>" + silver[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(silver[x][0]) + ", " + JSON.stringify(silver[x][1]) + ", " + JSON.stringify(silver[x][4]) + ", " + JSON.stringify(silver[x][3])+ ");'>" + silver[x][3] + "</a></td></tr>";
  }
  for(x = 0; x < teal.length; x++){
    document.getElementById("busVets").innerHTML += "<tr><td>" + teal[x][0] + "</td><td>" + teal[x][1] +  "</td><td>" + teal[x][2] + "</td><td><a href='javascript:;' onclick='openRoomModal(" + JSON.stringify(teal[x][0]) + ", " + JSON.stringify(teal[x][1]) + ", " + JSON.stringify(teal[x][4]) + ", " + JSON.stringify(teal[x][3]) + ");'>" + teal[x][3] + "</a></td></tr>";
  }
}


function openRoomModal(fname, lname, id, room) {
  var element = document.getElementById("editor");
  element.classList.add("is-active");
  var first = document.getElementById("fname");
  var last = document.getElementById("lname");
  var vid = document.getElementById("vid");
  var hroom = document.getElementById("room");
  first.setAttribute('value', fname);
  last.setAttribute('value', lname);
  vid.setAttribute('value', id);
  hroom.setAttribute('value', room);
}

function closeRoomModal(){
  var element = document.getElementById("editor");
  element.classList.remove("is-active");
  var vid = document.getElementById("vid").value;
  var room = document.getElementById("room").value;
  updateRoom(room, vid);
  setTimeout(() => { window.location.reload(); }, 1000);
}

function openPasswordModal(id, username, role) {
  var element = document.getElementById("editor");
  element.classList.add("is-active");
  var uid = document.getElementById("uid");
  var user = document.getElementById("user");
  var roles = document.getElementById("role");
  roles.setAttribute('value', role);
  user.setAttribute('value', username);
  uid.setAttribute('value', id);
}

function closePasswordModal(){
  var element = document.getElementById("editor");
  element.classList.remove("is-active");
  var uid = document.getElementById("uid").value;
  var pass = document.getElementById("pass").value;
  ResetPassword(uid, pass);
}

function openCommentModal(id, comment) {
  var element = document.getElementById("editor");
  element.classList.toggle("is-active");
  var vid = document.getElementById("vid");
  var comments = document.getElementById("comments");
  vid.setAttribute('value', id);
  comments.setAttribute('value', comment);
}

function closeCommentModal(){
  var element = document.getElementById("editor");
  element.classList.toggle("is-active");
  var vid = document.getElementById("vid").value;
  var comments = document.getElementById("comments").value;
  addComment(comments, vid);
}

function closing() {
  var element = document.getElementById("editor");
  element.classList.toggle("is-active");
}

function missionCreate(){
  mid = document.getElementById("mid").value;
  sdate = document.getElementById("sdate").value;
  edate = document.getElementById("edate").value;
  makeMission(mid, sdate, edate)
}

async function getVetBus(bus){
  document.getElementById('busVets').innerHTML = "";

  await getVeterans();
  await getTeams();

  var fname = [];
  var lname = [];
  var id = [];
  var hotelRoom = [];
  var tcolor = [];
  var allInfo = [];

  for (i = 0; i < vetdata.length; i++) {
    const values = Object.entries(vetdata[i]);
    for (z = 0; z < values.length; z++){
      if(values[z][0] == "first_name"){
        fname.push(values[z][1]);
      }
      if(values[z][0] == "veteran_id"){
        id.push(values[z][1]);
      }
      if(values[z][0] == "hotel_room"){
        hotelRoom.push(values[z][1]);
        values[z][1];
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
  var red = [];
  var blue = [];
  var yellow = [];
  var green = [];
  var orange = [];
  var purple = [];
  var gold = [];
  var silver = [];
  var teal = [];

  for(x=0;x<fname.length;x++){
    allInfo.push([fname[x], lname[x], tcolor[x], hotelRoom[x], id[x]]);
    switch(allInfo[x][2]){
      case "Red":
        red.push(allInfo[x]);
        break;
      case "Blue":
        blue.push(allInfo[x]);
        break;
      case "Yellow":
        yellow.push(allInfo[x]);
        break;
      case "Green":
        green.push(allInfo[x]);
        break;
      case "Orange":
        orange.push(allInfo[x]);
        break;
      case "Purple":
        purple.push(allInfo[x]);
        break;
      case "Gold":
        gold.push(allInfo[x]);
        break;
      case "Silver":
        silver.push(allInfo[x]);
        break;
      case "Teal":
        teal.push(allInfo[x]);
        break;
    }
  }

  if (bus == "bus1") {
    getRBY(red, blue, yellow);
  } else if(bus == "bus2") {
    getGOP(green, orange, purple);
  } else if (bus == "bus3"){
    getGST(gold, silver, teal);
  }
  
}

function updateRoom(number, id){
  var formData = new FormData();
  formData.append("veteran_id", id);
  formData.append("hotel_room", number);

  var requestOptions = {
    method: 'PUT', 
    body: formData, 
    redirect: 'follow'
  }

  fetch("http://192.168.1.103:5000/updateVeteran", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
}

function addComment(comment, id){
  var formData = new FormData();
  formData.append("veteran_id", id);
  formData.append("add_comments", comment);

  var requestOptions = {
    method: 'PUT', 
    body: formData, 
    redirect: 'follow'
  }

  fetch("http://192.168.1.103:5000/updateVeteran", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
}

function ResetPassword(uid, pass){
  var formData = new FormData();
  formData.append("id", uid);
  formData.append("password", pass);

  var requestOptions = {
    method: 'PUT', 
    body: formData, 
    redirect: 'follow'
  }

  fetch("http://192.168.1.103:5000/resetPassword", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
}

function makeMission(number, start, end){
  var formData = new FormData();
  formData.append("title", "Mission " + number.toString());
  formData.append("start_date",start);
  formData.append("end_date", end);

  var requestOptions = {
    method: 'POST', 
    body: formData, 
    redirect: 'follow'
  }

  fetch("http://192.168.1.103:5000/createMission", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));
}