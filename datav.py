import pandas as pd

death_data = pd.read_csv('./data/cleaneddeath.csv')
stroke_data = pd.read_csv('./data/cleanedstroke.csv')
hypertension_data = pd.read_csv('./data/cleanhypertension.csv')
population_data = pd.read_csv('./data/cleanpopulation.csv')
smoke_data = pd.read_csv('./data/smokedata.csv')



# Drop unnecessary columns from death_data
death_data = death_data.drop(columns=['Deaths - Sex: all - Age: all - Variant: medium'])

# Standardize
death_data = death_data.rename(columns={"Entity": "Country", "Total Death": "Total_Death"})
stroke_data = stroke_data.rename(columns={"Entity": "Country", "Stroke Deaths Rate": "Stroke_Deaths_Rate (per 100000)"})
hypertension_data = hypertension_data.rename(columns={"Entity": "Country", "Prevalence of hypertension among adults aged 30-79 years": "Hypertension_Prevalence"})
population_data = population_data.rename(columns={"Country name": "Country"})
smoke_data = smoke_data.rename(columns={"Entity": "Country"})


# 3. Merge
merged_data = death_data.merge(stroke_data, on=['Country', 'Year'], how='outer')
merged_data = merged_data.merge(hypertension_data, on=['Country', 'Year'], how='outer')
merged_data = merged_data.merge(population_data, on=['Country', 'Year'], how='outer')

# Combine 'Code_x' and 'Code_y' columns and drop them
merged_data['Code'] = merged_data['Code_x'].combine_first(merged_data['Code_y'])
merged_data = merged_data.drop(columns=['Code_x', 'Code_y'])

# 4. Handle missing values

# Interpolate missing values in 'Total Death' within each country
merged_data['Total_Death'] = merged_data.groupby('Country')['Total_Death'].transform(lambda x: x.interpolate(limit_direction='both'))

# Drop rows with missing key metrics
merged_data = merged_data.dropna(subset=['Total_Death', 'Stroke_Deaths_Rate (per 100000)', 'Hypertension_Prevalence', 'Population'])


#Merge again with smoke data
merged_data = merged_data.merge(smoke_data, on=['Country', 'Year', 'Code'], how='outer')

print(merged_data.head())


merged_data.to_csv('merged_data.csv', index=False)