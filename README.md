

# CETHub

Management Information System for College of Engineering and Technology of UDM

## Getting Started

### Installing local server

Download and run [XAMPP](https://www.apachefriends.org/download.html)

### Clone

```sh
cd C:\xampp\htdocs (default)
git clone https://github.com/garciamarvs/cethub.git
```

### Creating the Database

 - Go to phpMyAdmin 
 - Create `cethub`database
 - Import `cethub.sql` into the newly created database
 
 Note: You may need to change the database credentials in `application\config` to match yours.

### See it now on!
Navigate to your `localhost/cethub`

## Modules
- Announcement Module
  - Create/Read/Update/Delete Post
  
- Semester Module
  - Set Course Curriculum
  - Add Semester then add each sections course subject
  - Set Sections Course
  - Enroll Student in Course
  - Add Section
  - Add Course

- My Course Module
  - View Student Schedule
  - View Student Grades
  
- Submit Grades Module
  - View Assigned Course for Faculty
  - Update Students' Grade
  
- Account Module
  - Update Info
  - Change Password
  - Add User
  
- Live Chat
  - Send Messages Real Time
  
