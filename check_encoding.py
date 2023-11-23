# check_encoding.py

from joblib import load

# Load the trained model
loaded_model = load('trained_model.joblib')

# Load the label encoders
le_gender = load('le_gender.joblib')
le_smoking_status = load('le_smoking_status.joblib')
le_ever_married = load('le_ever_married.joblib')
le_work_type = load('le_work_type.joblib')
le_residence_type = load('le_residence_type.joblib')

# Print the encoding mappings
print("Gender Encoding:", le_gender.classes_)
print("Smoking Status Encoding:", le_smoking_status.classes_)
print("Ever Married Encoding:", le_ever_married.classes_)
print("Work Type Encoding:", le_work_type.classes_)
print("Residence Type Encoding:", le_residence_type.classes_)
