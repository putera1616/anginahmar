from flask import Flask, render_template, request, redirect,url_for, session, flash
import numpy as np
from joblib import load 
import mysql.connector



admin_username = 'admin';
admin_password = "123";

app = Flask(__name__)
app.secret_key = 'anginahmarcare'
app.config['SESSION_TYPE'] = 'filesystem'

def get_db_connection():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="anginahmarcare"
    )

# Load the trained model and label encoders
model = load('trained_model.joblib')
le_gender = load('le_gender.joblib')
le_smoking_status = load('le_smoking_status.joblib')
le_ever_married = load('le_ever_married.joblib')
le_work_type = load('le_work_type.joblib')
le_Residence_type = load('le_Residence_type.joblib')


# Function to predict stroke risk and identify influential factors
def predict_stroke_risk(gender, age, hypertension, heart_disease, bmi, smoking_status,
                         ever_married, work_type, Residence_type):
    # Encode categorical variables
    gender = le_gender.transform([gender])[0]
    smoking_status = le_smoking_status.transform([smoking_status])[0]
    ever_married = le_ever_married.transform([ever_married])[0]
    work_type = le_work_type.transform([work_type])[0]
    Residence_type = le_Residence_type.transform([Residence_type])[0]

    # Calculate BMI

    # Create input data for prediction
    input_data = np.array([[gender, age, hypertension, heart_disease, ever_married, work_type,
                            Residence_type, bmi, smoking_status]])

    # Predict stroke risk
    probability = model.predict_proba(input_data)[:, 1]
    stroke_risk = probability * 100


    return stroke_risk[0]


#delete userdata
@app.route('/delete_user_data/<string:user_id>', methods=['POST'])
def delete_user_data(user_id):
    
    mydb = get_db_connection()
    cursor = mydb.cursor()

    # Execute the DELETE query
    cursor.execute("DELETE FROM userdata WHERE id = %s", (user_id,))
    cursor.close()
    mydb.close()
    return redirect(url_for('admindata'))
   


# Homepage route
@app.route('/')
def home():
    return render_template('index.html')

## Prediction page route
@app.route('/predict', methods=['GET', 'POST'])
def index():
    stroke_risk = None

    if request.method == 'POST':
        gender = request.form['gender']
        age = float(request.form['age'])
        hypertension = int(request.form['hypertension'])
        heart_disease = int(request.form['heart_disease'])
        weight = float(request.form['weight'])
        height = float(request.form['height']) / 100  # Convert height to meters
        bmi = weight / (height ** 2)  # Calculate BMI
        bmi = round(bmi, 2)  # Round BMI to two decimal places
        smoking_status = request.form['smoking_status']
        ever_married = request.form['ever_married']
        work_type = request.form['work_type']
        Residence_type = request.form['Residence_type']

        # Predict stroke risk
        stroke_risk = predict_stroke_risk(gender, age, hypertension, heart_disease,
                                                               bmi, smoking_status,
                                                               ever_married, work_type, Residence_type)
        
        if stroke_risk < 20:
            stroke_level = "Low"
        elif stroke_risk < 50:
            stroke_level = "Moderate"
        else:
            stroke_level = "High"
    

        user_data = {
            'gender': gender,
            'age': age,
            'hypertension': hypertension,
            'heart_disease': heart_disease,
            'weight': weight,
            'height': height,
            'bmi': bmi, 
            'smoking_status': smoking_status,
            'ever_married': ever_married,
            'work_type': work_type,
            'Residence_type': Residence_type,
            'stroke_level' : stroke_level,
            'stroke_risk': stroke_risk
        }
        
        insert_query = """
        INSERT INTO userdata (gender, age, hypertension, heart_disease, weight, height, bmi, smoking_status, ever_married, work_type, residence_type, stroke_level, stroke_risk)
        VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
        """

        mydb = get_db_connection()
        cursor = mydb.cursor()


        cursor.execute(insert_query, list(user_data.values()))
        mydb.commit()
        return redirect(url_for('result', stroke_risk=stroke_risk))


    return render_template('predict.html')

@app.route('/result')
def result():
    stroke_risk = request.args.get('stroke_risk', 0)  
    return render_template('result.html', stroke_risk=stroke_risk)


@app.route('/information')
def information():
    return render_template('information.html')

@app.route('/dashboard')
def dashboard():
    return render_template('dashboard.html')

@app.route('/admin/login', methods=['GET', 'POST'])
def admin_login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        if username == admin_username and password == admin_password:
            session['admin'] = True
            session['admin_logging_in'] = True  

            flash('You are logged in as an admin.', 'success')
            return redirect(url_for('admindashboard'))  # Redirect to admin dashboard on successful login

        flash('Invalid credentials. Please try again.', 'danger')  # Add this line for failed login

    return redirect(url_for('adminpage'))  # Redirect to the index page on failed login


@app.route('/admin')
def adminpage():
    return render_template('login.html')


@app.route('/admin/logout')
def admin_logout():
    if 'admin' in session:
        session.pop('admin', None)  
        session['admin_logging_out'] = True  
        flash('You have been logged out.', 'success')
    return redirect(url_for('adminpage'))


@app.route('/admin/home')
def admindashboard():
    if 'admin' in session and session['admin']:

        return render_template('admindashboard.php')
    else:
        flash('You need to log in as an admin to access this page.', 'danger')
        return redirect(url_for('adminpage'))


@app.route('/admin/data', methods=['GET'])
def admindata():
    if 'admin' in session and session['admin']:
         
         mydb = get_db_connection()
         cursor = mydb.cursor()
         cursor.execute("SELECT * FROM userdata")
         user_data = cursor.fetchall()

         # Close the cursor and the connection
         cursor.close()
         mydb.close()
         return render_template('admindata.php', user_data=user_data)
    else:
        flash('You need to log in as an admin to access this page.', 'danger')
        return redirect(url_for('adminpage'))
    

if __name__ == '__main__':
    app.run(debug=True)