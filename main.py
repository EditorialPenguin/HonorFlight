from flask import Flask, request, render_template, jsonify, abort, session, redirect, url_for
import MySQLdb
from flask_mysqldb import MySQL
from flask_cors import CORS
import os
from os import name as os_name
from pyngrok import ngrok, exception
import qrcode

mysql = MySQL()
app = Flask(__name__)
CORS(app)
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'honor_flight'
app.config['MYSQL_HOST'] = 'localhost'
app.config['JSONIFY_PRETTYPRINT_REGULAR'] = True
app.secret_key = 'SECRET KEY'
mysql.init_app(app)

ngroksql = ""

@app.route('/')
def index():
    if(ngroksql != ""):
        return redirect("http://localhost:8000?ngrok=" + ngroksql, code=302)
    else:
        return redirect("http://localhost:8000", code=302)

@app.route("/getAccounts", methods=['GET'])
def getAccounts():
    cursor = mysql.connection.cursor()
    cursor.execute('SELECT * FROM accounts')
    columns = [column[0] for column in cursor.description]
    results = []
    for row in cursor.fetchall():
        results.append(dict(zip(columns, row)))
    return jsonify(results)

@app.route("/resetPassword", methods=['PUT'])
def resetPassword():
    return updateSomething("accounts", "id")


@app.route("/login", methods=['POST'])
def login():
    cursor = mysql.connection.cursor()
    data = request.form.to_dict(flat=False)
    username = data['username'][0]
    password = data['password'][0]
    role = ""
    cursor.execute('SELECT * FROM accounts WHERE username = %s AND password = %s', (username, password,))
    account = cursor.fetchone()
    print(account)
    if account:
        # Create session data, we can access this data in other routes
        session['loggedin'] = True
        session['id'] = account[0]
        session['username'] = account[1]
        return redirect("http://localhost:8000/assets/mission.php?role=" + account[3] + "&name=" + account[1])
    else:
        # Account doesnt exist or username/password incorrect
        msg = 'Incorrect username/password!'
    return redirect("http://localhost:8000?incorrect=True")

@app.route("/homepage", methods=['GET'])
def home():
    return render_template("role.html")

# -- BUS --
@app.route("/createBus", methods=['POST'])
def createBus():
    cursor = mysql.connection.cursor()
    results = {}
    data = request.form.to_dict(flat=False)
    try:
        if (data["mission_id"][0] == ""):
            error = {}
            error['error'] = "NO_MISSION_ID_VALUE_ERROR"
            return jsonify(error)
    except KeyError:
        error = {}
        error['error'] = "NO_MISSION_ID_ERROR"
        return jsonify(error)
    try:
        if (data["name"][0] != ""):
            cursor.execute("INSERT INTO bus (mission_id, name) VALUES (" + str(data["mission_id"][0]) + ", '" + str(
                data["name"][0]) + "')")
            mysql.connection.commit()
            results['CREATE_BUS_' + data["name"][0].upper().replace(" ", "_")] = True
            return jsonify(results)
        else:
            error = {}
            error['error'] = "NO_NAME_VALUE_ERROR"
            return jsonify(error)
    except KeyError:
        error = {}
        error['error'] = "NO_NAME_ERROR"
        return jsonify(error)

@app.route("/getBuses", methods=['GET'])
def getBuses():
    return getSomething("bus", "bus_id")

@app.route("/updateBus", methods=['PUT'])
def updateBus():
    return updateSomething("bus", "bus_id")

@app.route("/deleteBus", methods=['DELETE'])
def deleteBus():
    return deleteSomething("bus", "bus_id")

# -- GUARDIAN --
@app.route("/createGuardian", methods=['POST'])
def createGuardian():
    cursor = mysql.connection.cursor()
    results = {}
    data = request.form.to_dict(flat=False)
    try:
        if (data["first_name"][0] == ""):
            error = {}
            error['error'] = "NO_FIRST_NAME_VALUE_ERROR"
            return jsonify(error)
    except KeyError:
        error = {}
        error['error'] = "NO_FIRST_NAME_ERROR"
        return jsonify(error)
    try:
        if (data["last_name"][0] == ""):
            error = {}
            error['error'] = "NO_LAST_NAME_VALUE_ERROR"
            return jsonify(error)
        else:
            cursor.execute("INSERT INTO guardian (first_name, last_name) VALUES ('" + str(data["first_name"][0])  + "', '"  + str(data['last_name'][0]) + "')")
            mysql.connection.commit()
            results['CREATE_MISSION_' + data["first_name"][0].upper().replace(" ", "_") + "_" + data["last_name"][0].upper().replace(" ", "_")] = True
            return jsonify(results)
    except KeyError:
        error = {}
        error['error'] = "NO_LAST_NAME_ERROR"
        return jsonify(error)

@app.route("/getGuardians", methods=['GET'])
def getGuardians():
    return getSomething("guardian", "guardian_id")

@app.route("/updateGuardian", methods=['PUT'])
def updateGuardian():
    return updateSomething("guardian", "guardian_id")

@app.route("/deleteGuardian", methods=['DELETE'])
def deleteGuardian():
    return deleteSomething("guardian", "guardian_id")

# -- MISSION --
@app.route("/createMission", methods=['POST'])
def createMission():
    cursor = mysql.connection.cursor()
    results = {}
    data = request.form.to_dict(flat=False)
    try:
        if (data["title"][0] == ""):
            error = {}
            error['error'] = "NO_TITLE_VALUE_ERROR"
            return jsonify(error)
        else:
            cursor.execute("INSERT INTO mission (title) VALUES ('" + str(data["title"][0])  + "')")
            mysql.connection.commit()
            results['CREATE_MISSION_' + data["title"][0].upper().replace(" ", "_")] = True
            return jsonify(results)
    except KeyError:
        error = {}
        error['error'] = "NO_TITLE_ERROR"
        return jsonify(error)

@app.route("/getMissions", methods=['GET'])
def getMissions():
    return getSomething("mission", "mission_id")

@app.route("/updateMission", methods=['PUT'])
def updateMission():
    return updateSomething("mission", "mission_id")

@app.route("/deleteMission", methods=['DELETE'])
def deleteMission():
    return deleteSomething("mission", "mission_id")

# -- TEAM --
@app.route("/createTeam", methods=['POST'])
def createTeam():
    cursor = mysql.connection.cursor()
    results = {}
    data = request.form.to_dict(flat=False)
    try:
        if (data["mission_id"][0] == ""):
            error = {}
            error['error'] = "NO_MISSION_ID_VALUE_ERROR"
            return jsonify(error)
    except KeyError:
        error = {}
        error['error'] = "NO_MISSION_ID_ERROR"
        return jsonify(error)

    try:
        if (data["color"][0] == ""):
            error = {}
            error['error'] = "NO_COLOR_VALUE_ERROR"
            return jsonify(error)
        else:
            cursor.execute("INSERT INTO team (mission_id, color) VALUES ('" + str(data["mission_id"][0])  + "', '" + str(data["color"][0])  + "')")
            mysql.connection.commit()
            cursor.execute("SELECT team_id FROM team ORDER BY team_id DESC LIMIT 1")
            last_record = cursor.fetchone()[0]
            results['CREATE_TEAM_' + str(last_record)] = True
            return jsonify(results)
    except KeyError:
        error = {}
        error['error'] = "NO_COLOR_ERROR"
        return jsonify(error)
    except MySQLdb._exceptions.IntegrityError:
        error = {}
        error['error'] = "NO_MISSION_" + str(data["mission_id"][0])
        return jsonify(error)

@app.route("/getTeams", methods=['GET'])
def getTeams():
    return getSomething("team", "team_id")

@app.route("/updateTeam", methods=['PUT'])
def updateTeam():
    return updateSomething("team", "team_id")

@app.route("/deleteTeam", methods=['DELETE'])
def deleteTeam():
    return deleteSomething("team", "team_id")

# -- VETERAN --
@app.route("/createVeteran", methods=['POST'])
def createVeteran():
    cursor = mysql.connection.cursor()
    results = {}
    data = request.form.to_dict(flat=False)
    try:
        if (data["first_name"][0] == ""):
            abort(400, description="NO_FIRST_NAME_VALUE_ERROR")
    except KeyError:
        abort(400, description="NO_FIRST_NAME_ERROR")
    try:
        if (data["last_name"][0] == ""):
            abort(400, description="NO_LAST_NAME_VALUE_ERROR")
        else:
            cursor.execute("INSERT INTO veteran (first_name, last_name) VALUES ('" + str(data["first_name"][0]) + "', '" + str(data['last_name'][0]) + "')")
            mysql.connection.commit()
            results['CREATE_VETERAN_' + data["first_name"][0].upper().replace(" ", "_") + "_" + data["last_name"][
                0].upper().replace(" ", "_")] = True
            return jsonify(results)
    except KeyError:
        abort(400, description="NO_LAST_NAME_ERROR")

@app.route("/getVeterans", methods=['GET'])
def getVeterans():
    return getSomething("veteran", "veteran_id")

@app.route("/updateVeteran", methods=['PUT'])
def updateVeteran():\
    return updateSomething("veteran", "veteran_id")

@app.route("/deleteVeteran", methods=['DELETE'])
def deleteVeteran():
    return deleteSomething("veteran", "veteran_id")

# -- Generic Query --
def getSomething(table_name, unique_attribute):
    cursor = mysql.connection.cursor()
    args = request.args.to_dict(flat=False)
    try:
        if (len(args) == 0):
            cursor.execute("SELECT * from " + table_name)  # Get All Data from Table
            columns = [column[0] for column in cursor.description]
            results = []
            for row in cursor.fetchall():
                results.append(dict(zip(columns, row)))
            return jsonify(results)
        # Return Error if the id arg has no value
        if (args[unique_attribute][0] == ""):
            abort(400, description="NO_" + table_name.upper() + "_ID_SPECIFIED_ERROR")
        elif (len(args) == 1):
            # Query Database for record with the specified ID
            cursor.execute(
                "SELECT * from " + table_name + " WHERE " + unique_attribute + "=" + args[unique_attribute][0])
            columns = [column[0] for column in cursor.description]
            results = []
            for row in cursor.fetchall():
                results.append(dict(zip(columns, row)))
        else:
            # Query Database for team with the specified Team ID and Field
            query = "SELECT "
            for x in range(len(args['attribute'])):
                if x != len(args['attribute']) - 1:
                    query += args['attribute'][x] + ", "
                else:
                    query += args['attribute'][x] + " FROM " + table_name + " WHERE " + unique_attribute + "=" + args[unique_attribute][0]
            cursor.execute(query)
            #cursor.execute("SELECT " + args['attribute'][0] + " FROM " + table_name + " WHERE " + unique_attribute + "=" + args[unique_attribute][0])
            columns = [column[0] for column in cursor.description]
            results = []
            for row in cursor.fetchall():
                results.append(dict(zip(columns, row)))
        # Return Error if no records are found with the ID specified
        if (len(results) == 0):
            abort(404, description="UNKNOWN_" + table_name.upper() + "_ID_ERROR")
        else:
            return jsonify(results)
    # User requested an unknown attribute
    except KeyError:
        abort(400, description="UNKNOWN_ATTRIBUTE_ERROR")
    # User requested a field with no value
    except MySQLdb._exceptions.ProgrammingError:
        abort(400, description="NO_ATTRIBUTE_VALUE_ERROR")
    # User requested a field that does not exist
    except MySQLdb._exceptions.OperationalError:
        abort(400, description="UNKNOWN_ATTRIBUTE_VALUE_ERROR")

# -- Generic Update --
def updateSomething(table_name, unique_attribute):
    cursor = mysql.connection.cursor()
    results = {}
    data = request.form.to_dict(flat=False)
    try:
        if (data[unique_attribute]):  # Check if Primary Key is in data request
            # Start Check if Record with Primary Key exists in Database Table
            cursor.execute(
                "SELECT " + unique_attribute + " from " + table_name + " WHERE " + unique_attribute + "=" +
                data[unique_attribute][0])
            if (str(cursor.fetchone()[0]) == data[unique_attribute][0]):
                # End Check
                # Updates attribute except Primary Key
                for key in data.items():
                    if (key[0] == unique_attribute):
                        continue
                    cursor.execute("UPDATE " + table_name + " SET " + key[0] + "='" + key[1][0] + "' WHERE " + unique_attribute + "='" + data[unique_attribute][0] + "'")
                    results['UPDATE_' + str(key[0].upper())] = True
                    mysql.connection.commit()
                return jsonify(results)
    # User did not have Primary Key Key in request data
    except KeyError:
        abort(400, description="NO_" + table_name.upper() + "_ID_SPECIFIED_ERROR")
    # User had Primary Key Key in request data but no value for it
    except MySQLdb._exceptions.ProgrammingError:
        abort(400, description="NO_" + table_name.upper() + "_ID_VALUE_ERROR")
    # User requested a field that does not exist or tried to enter a value with the wrong data type
    except MySQLdb._exceptions.OperationalError as e:
        abort(400, description="UNKNOWN_ATTRIBUTE_VALUE_ERROR")
    # User had Primary Key Key in request data but Primary Key did not exist in Database Table
    except TypeError:
        abort(404, description="UNKNOWN_" + table_name.upper() + "_ID_ERROR")

# -- Generic Delete --
def deleteSomething(table_name, unique_attribute):
    cursor = mysql.connection.cursor()
    results = {}
    data = request.form.to_dict(flat=False)
    try:
        if (data[unique_attribute][0] == ""):
            error = {}
            error['error'] = "NO_" + table_name.upper() + "_VALUE_ERROR"
            return jsonify(error)
        else:
            cursor.execute("DELETE FROM " + table_name + " WHERE " + unique_attribute + "='" + str(data[unique_attribute][0]) + "'")
            mysql.connection.commit()
            results['DELETE_' + table_name.upper() + '_' + data[unique_attribute][0].upper().replace(" ", "_")] = True
            return jsonify(results)
    except KeyError:
        error = {}
        error['error'] = "NO_" + unique_attribute.upper() + "_ERROR"
        return jsonify(error)

def startNgrok():
    global ngroksql;
    if os_name == "nt":
        tasks = (os.popen("tasklist").read().split("\n"))
    else:
        tasks = os.popen("ps -aux").read().split("\n")
    for task in tasks:
        if ("ngrok" in task):
            if os_name == 'nt':
                os.system("taskkill /F /PID " + list(filter(None, task.split()))[1])
            else:
                os.system("kill -9 " + list(filter(None, task.split()))[1])
    try:
        ngrok.set_auth_token("1aVaJQuQWSdgEb89cUsC10jVu3Z_5M1BhRPaov587jAqwbznm")
        host = ngrok.connect(8000, proto="http")
        server = str(host).split(' "')[1].split('" -')[0]
        qrcode.make(server).save("link.png")
        ngrok.set_auth_token("1qBjAgA27YzPvWRFM5NySXpcErI_Y5PvunybTAgapzScQGvd") 
        host = ngrok.connect(5000, proto="http")
        ngroksql = str(host).split(' "')[1].split('" -')[0].replace("http://", "").replace(".ngrok.io", "")
        print(ngroksql)
        
    except(exception.PyngrokNgrokHTTPError):
        if os_name == 'nt':
            os.system("ngrok authtoken 1aVaJQuQWSdgEb89cUsC10jVu3Z_5M1BhRPaov587jAqwbznm")
            print("\n\nExit and Restart Server")
        else:
            os.system("sudo ngrok authtoken 1aVaJQuQWSdgEb89cUsC10jVu3Z_5M1BhRPaov587jAqwbznm")
            print("\n\nExit and Restart Server")
        time.sleep(10)
        exit()
    '''
    except(exception.PyngrokNgrokError):
        print("ERROR: Unable to create server at this time...\n")
        print("Solution 1: Stop existing servers.")
        print("Solution 2: Wait a few seconds before starting another server.")
        exit()
'''
if __name__ == '__main__':
    #startNgrok();
    app.run(host="0.0.0.0")

