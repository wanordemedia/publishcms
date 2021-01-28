# General

The admin panel is the central contact point for the entire cms.

## Folderstruktur

```
login
├── index.php (Hereafter called Loginscreen)
└── admin
    ├── tabs
    │   ├── tab.content.php
    │   ├── tab.user.php
    │   ├── tab.media.php
    │   └── tab.js
    ├── index.php (Hereafter called mainscreen)
    └── main.css
```

## Loginscreen

#### Line 17 - 23
We get the user input from the form and check if a connection to the database can be established.
#### Line 24 - 29
Here we check if the user input is a username or an email address.
#### Line 31 - 40
Here the database query is performed.
#### Line 42 - 46
In this function the entered user password is hashed and compared with the password from the database.
#### Line 48 - 51
The user session is started
#### Line 57 - 77
Here is the HTML form for entering the user data

## mainscreen

#### Line 9 - 12
Session is being refreshed
#### Line 22 - 26
Here the main menu bar is defined.
For each tab a new event name must be defined.
#### Line 28 - 44
Here the single function windows are programmed.
Each window must get a name by ``<h3>``, after that it doesn't matter what is written into it.  

## tab.user.php

#### Line 3 - 7
Establish a new connection to the database and check the connection.
#### Line 9 - 13
Query all users from the database.
#### Line 15 - 31
Here the individual data from the database response are converted to variables and then displayed.
