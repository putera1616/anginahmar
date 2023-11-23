import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import LabelEncoder
from sklearn.metrics import accuracy_score, precision_score, recall_score, f1_score, confusion_matrix
from imblearn.over_sampling import SMOTE
from joblib import dump
from pymongo import MongoClient

client = MongoClient('mongodb://localhost:27017/')
db = client['stroke']
collection = db['stroke']

cursor = collection.find({}, {'_id': 0})
data = list(cursor)
data = pd.DataFrame(data)

# Data preprocessing
data = data[['gender', 'age', 'hypertension', 'heart_disease', 'ever_married', 'work_type',
             'Residence_type', 'bmi', 'smoking_status', 'stroke']]

le_gender = LabelEncoder()
le_smoking_status = LabelEncoder()
le_ever_married = LabelEncoder()
le_work_type = LabelEncoder()
le_Residence_type = LabelEncoder()

data['gender'] = le_gender.fit_transform(data['gender'])
data['smoking_status'] = le_smoking_status.fit_transform(data['smoking_status'])
data['ever_married'] = le_ever_married.fit_transform(data['ever_married'])
data['work_type'] = le_work_type.fit_transform(data['work_type'])
data['Residence_type'] = le_Residence_type.fit_transform(data['Residence_type'])

X = data.drop('stroke', axis=1)
y = data['stroke']

# Balancing using SMOTE
smote = SMOTE(random_state=42)
X_balanced, y_balanced = smote.fit_resample(X, y)

# Train-test split
X_train, X_test, y_train, y_test = train_test_split(X_balanced, y_balanced, test_size=0.2, random_state=42)

# Model training
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

# Model Evaluation
y_pred = model.predict(X_test)

# Calculate evaluation metrics
accuracy = accuracy_score(y_test, y_pred)
precision = precision_score(y_test, y_pred)
recall = recall_score(y_test, y_pred)
f1 = f1_score(y_test, y_pred)

# Calculate the confusion matrix
cm = confusion_matrix(y_test, y_pred)

# Save model and label encoders
dump(model, 'trained_model.joblib')
dump(le_gender, 'le_gender.joblib')
dump(le_smoking_status, 'le_smoking_status.joblib')
dump(le_ever_married, 'le_ever_married.joblib')
dump(le_work_type, 'le_work_type.joblib')
dump(le_Residence_type, 'le_Residence_type.joblib')

# model evaluation metrics and confusion matrix
print("Model Evaluation:")
print(f"Accuracy: {accuracy:.2f}")
print(f"Precision: {precision:.2f}")
print(f"Recall: {recall:.2f}")
print(f"F1 Score: {f1:.2f}")

print("\nConfusion Matrix:")
print(cm)

print("Model and label encoders saved.")
