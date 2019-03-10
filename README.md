# Time Tracker

### Develop time tracking module to save work time with the client.

- Log Login-time and log-out time of users and save them into a database

- List all users and login times by days

- Enable filtering by

  - team

  - user and

  - date (dropdown year, week and day)

  - Filter for current week and current month as well as trailing 3 months
  
## Application Deployed @ http://laravel-time-tracker.herokuapp.com/
  
## Application Modules

#### TimeLog
- This module mantain the login and logout time of user
- Different dropdown are dependent and shown/hidden on basis of requirement
- Scroll based custom pagination added i-e on window scroll records are fetch.
- Refresh button reset all the data to selected filters

#### User
- This module handles user basic details i.e basic info, team

#### Team
- This module defines different teams to which a user are associated
 
### Modules Relation Description
- A User can be part of a team
- Login/Logout Time can be logged for user on any date
- Logout time must be greater than Login time i-e this is handled by extending the validator

##### Happy Exploring !! :) 
