import pandas as pd
import numpy as np
import math
file_loc = "member.xlsx"
df = pd.read_excel(file_loc, index_col=None, na_values=['NA'], usecols="A:Y")


def isNaN(num):
    return num != num

rows = df.values

all_rows = []
for r in rows:
    num_cols = len(r)
    all_rows.append(r)
y = 0
for v in all_rows:
    x = 0
    y = y + 1
    if(y == 2520):
        break
    for c in v:
        if(isNaN(c)):
            c = ""
            
        if(x == 0):
            if(c == "" or c == "Male" or c== "Female"):
                continue
            if(c == " "):
                break
            LAST_NAME = c
        elif(x == 1):
            FIRST_NAME = c
        elif(x == 2):
            KEY_TAG = c
        elif(x == 3):
            LAST_VISIT_MAIN = c
        elif(x == 4):
            SPOUSE_FIRST_NAME = c
        elif(x == 5):
            LAST_VISIT_SPOUSE = c
        elif(x == 6):
            ADDRESS =c
        elif(x == 7):
            CITY = c
        elif(x == 8):
            STATE = c
        elif(x == 9):
            ZIP = c
        elif(x == 10):
            HOME_PHONE = c
        elif(x == 11):
            MUNICIPALITY = c
        elif(x == 12):
            EMAIL = c
            EMAIL = EMAIL.replace("\"", "\'")
        elif(x == 13):
            NEWSLETTER = c
        elif(x == 14):
            EMERGENCY_CONTACT_1 = c
        elif(x == 15):
            EMERGENCY_PHONE_1 = c
        elif(x == 16):
            EMERGENCY_CONTACT_2 = c
        elif(x == 17):
            EMERGENCY_PHONE_2 = c
        elif(x == 18):
            NUMBER_IN_HOME = c
        elif(x == 19):
            HEAD_OF_HOUSEHOLD = c
        elif(x == 20):
            RACE = c
        elif(x == 21):
            SIXTY_OLDER = c
        elif(x == 22):
            MEMBERSHIP_DATE = c
        elif(x == 23):
            MEMBER_FEE_PAID_NOTES = c
        elif(x == 24):
            VACCINE = c

        x = x + 1
    print(f'INSERT INTO `members` (`id`, `last_name`, `first_name`, `key_tag`, `last_visit_main`, `spouse_first_name`, `last_visit_spouse`, `address`, `city`, `state`, `zip`, `home_phone`, `municipality`, `email`, `newsletter`, `emergency_contact_1`, `emergency_phone_1`, `emergency_contact_2`, `emergency_phone_2`, `number_in_home`, `head_of_household`, `race`, `62_older`, `membership_date`, `member_fee_paid_notes`, `vaccine`) VALUES (NULL, "{LAST_NAME}", "{FIRST_NAME}", "{KEY_TAG}", "{LAST_VISIT_MAIN}", "{SPOUSE_FIRST_NAME}", "{LAST_VISIT_SPOUSE}", "{ADDRESS}", "{CITY}", "{STATE}", "{ZIP}", "{HOME_PHONE}", "{MUNICIPALITY}", "{EMAIL}", "{NEWSLETTER}", "{EMERGENCY_CONTACT_1}", "{EMERGENCY_PHONE_1}", "{EMERGENCY_CONTACT_2}", "{EMERGENCY_PHONE_2}", "{NUMBER_IN_HOME}", "{HEAD_OF_HOUSEHOLD}", "{RACE}", "{SIXTY_OLDER}", "{MEMBERSHIP_DATE}", "{MEMBER_FEE_PAID_NOTES}", "{VACCINE}");')
    print("\n")
