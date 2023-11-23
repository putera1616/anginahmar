import pandas as pd

df = pd.read_csv('healthcare-dataset-stroke-data.csv')

# Remove rows contain value 'Other' in gender column.
df = df[df['gender'] != 'Other']

# Remove rows contain value 'unknown' in smoking_status column.
df = df[df['smoking_status'] != 'Unknown']

# Convert the 'age' column to integers
df['age'] = df['age'].astype(int)

# Remove rows where 'age' is equal to 0
df = df[df['age'] != 0]

# Remove rows where 'bmi' is NaN
df = df.dropna(subset=['bmi'])

# Remove column avg_glucose_level 
df.drop(columns=['avg_glucose_level'], inplace=True)

# Save the modified DataFrame to a new CSV file if needed
df.to_csv('cleaned_dataset.csv', index=False)