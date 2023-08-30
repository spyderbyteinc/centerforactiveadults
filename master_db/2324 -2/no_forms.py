import pandas as pd
import numpy as np
import math
file_loc = "noform.xlsx"
df = pd.read_excel(file_loc, sheet_name='2023-2024 Member No Forms NEW', index_col=None, na_values=['NA'], usecols="C:M")

def isNaN(num):
    return num != num

rows = df.values

all_rows = []
for r in rows:
    num_cols = len(r)
    if(isNaN(r[num_cols-1])):
        continue
    else:
        all_rows.append(r)

for v in all_rows:
    last_name = v[0]
    first_name = v[1]
    first_visit = v[2]
    spouse = v[3]
    spouse_visit = v[4]
    address = v[5]
    city = v[6]
    state = v[7]
    zipcode = v[8]
    home_phone = v[9]
    municipality = v[10]

    if(isNaN(first_visit)):
        first_visit = ""


    if(isNaN(spouse)):
        spouse = ""


    if(isNaN(spouse_visit)):
        spouse_visit = ""

    

#    sql = "INSERT INTO `no_forms` (`id`, `last_name`, `first_name`, `first_visit_main`, `spouse`, `first_visit_spouse`, `address`, `city`, `state`, `zip`, `home_phone`, `municipality`) VALUES (NULL, '{last_name}', '{first_name}', '{first_visit}', '{spouse}', '{spouse_visit}', '{address}', '{city}', '{state}', '{zipcode}', '{home_phone}', '{municipality}');"
    print(f'INSERT INTO `no_forms` (`id`, `last_name`, `first_name`, `first_visit_main`, `spouse`, `first_visit_spouse`, `address`, `city`, `state`, `zip`, `home_phone`, `municipality`) VALUES (NULL, "{last_name}", "{first_name}", "{first_visit}", "{spouse}", "{spouse_visit}", "{address}", "{city}", "{state}", "{zipcode}", "{home_phone}", "{municipality}");')
