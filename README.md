# Student Performance System

**Student Performance System** is a system to view student's performance. It can track students from Form 1 to Form 5.

The user can ask the information on screen to be printed for reference purpose. Visualization of each students performance.

Functions performed by the system as described below:

Parent:

1. The parent is able to look at the student's performance and they can compare their performance from year to year.
2. Parent can then do digital signature by agreeing that they have seen their child's report.
3. Parent will receive an email regarding the availability of report to the students

Headmaster:

1. Headmaster can see score of every student.
2. To release the report, headmaster have to approve the release of the report by clicking 'I agree to release this report to parent'.
3. The school may have to have a meeting first in order to discuss the performance of the teachers. If there is no meeting scheduled, then system will remind headmaster to set a meeting
5. Headmaster can sort the information he sees. He can see the highest to lowest average or according to year since using the system

Teacher:

1. Subject teacher can key in the marks directly into the system and they don't need to ask class teacher to key in the marks into the system. This will ease the load of subject teacher to do work.
2. Class teacher can look at all students scores and compare the average from year to year.
3. They can choose how to view the data. It can be in a form of table and graph.
4. Class teacher can sort the student in the class data in ascending or descending order.

Admin:

1. Manage/configure site settings
2. Add/edit/delete new class into the system (can undo)
3. Add/edit/delete new stream (can undo)

What System Can Do:

- Direct to email (if there is any notification, an e-mail will be sent to the parents)
- Compare year by year by parent and teacher
- Separate core subject with elective subject (Form 4 and Form 5)
- Can key in test result
- Class teacher key in students' details
- Parents digitally sign the document
- Can be printed


Future Plan:

1. In Form 4 and Form 5, they will be divided according to their respective stream. In Form 4 and Form 5, they can add or minus the elective subjects.

TO DO:
- Change all query statement to PDO statements.
- Security: never save passwords in plain text


I need to break things down into its respective place so that I can put them in a proper place. 

Where to add/edit/delete subject?
Where to add/edit/delete student?
Where to add/edit/delete class?
Who can add student attendance?

## INSTALLATION

1. Please download the zip file or clone this repo

2. Please create a file 'connect.php' (put it at the root of this project file) and insert the following:

```php
<?php
    
$host = 'localhost';
$db   = 'YOURDBNAME';
$user = 'YOURDBUSERNAME';
$pass = 'YOURDBPASSWORD';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);
```

3. Import 'sps.sql' into your database.

You will get 3 usernames which you can use to access each.

Headmaster:
Username: headmaster
Password: headmaster

Teacher:
Username: teacher
Password: teacher

Parent:
Username: parent
Password: parent