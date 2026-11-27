STUDENT LEARNING HUB — GRADE 3 DYNAMIC WEBSITE PROJECT
======================================================

PROJECT IDEA
A small educational website where visitors can read published lessons. The administrator can add categories, add lessons, choose whether a lesson is published or draft, view all lessons, and delete a lesson.

TECHNOLOGIES
- PHP
- MySQL
- PDO (prepared statements)
- HTML5 / CSS3
- Bootstrap 5.3.3

REQUIREMENTS
- XAMPP with Apache, MySQL, and PHP
- A modern web browser
- Internet connection for the Bootstrap CDN (the PHP/database features work locally)

INSTALLATION ON XAMPP
1. Extract the folder "G3_Project_StudentLearningHub".
2. Copy it into: C:\\xampp\\htdocs\\
3. Open XAMPP Control Panel and start Apache and MySQL.
4. Open http://localhost/phpmyadmin
5. Choose Import, select database.sql from this project folder, and click Import/Go.
   The SQL file creates the database student_learning_hub, its two related tables, and sample data.
6. Check includes/db.php. The default XAMPP settings are:
   host: localhost
   database: student_learning_hub
   username: root
   password: (empty)
   Change these values if your MySQL configuration is different.
7. Open the website:
   http://localhost/G3_Project_StudentLearningHub/
8. Open the administration page:
   http://localhost/G3_Project_StudentLearningHub/admin/

IMPORTANT SECURITY NOTE
The assignment guide asks for an administration section but does not require authentication. This classroom version keeps the admin page local for demonstration. Do not publish it online or expose it to the public internet without adding secure administrator authentication and other production protections.

PROJECT FEATURES
PUBLIC WEBSITE
- Homepage displays published posts retrieved from MySQL.
- Each post has a details page.
- Navigation menu and responsive Bootstrap layout.
- At least two categories and four sample posts.

ADMINISTRATION
- Add a category.
- View existing categories.
- Add a post with title, content, category, and published/draft status.
- View all posts.
- Delete a post after browser confirmation.

DATABASE DESIGN
- categories: id, name, created_at
- posts: id, category_id, title, content, status, created_at
- posts.category_id is a foreign key referencing categories.id.

TEST CHECKLIST
[ ] Import database.sql successfully.
[ ] Open the homepage and confirm that four sample posts appear.
[ ] Open a post details page.
[ ] Add a category from Administration.
[ ] Add a published post and confirm it appears on the homepage.
[ ] Add a draft post and confirm it does not appear on the public homepage.
[ ] Delete a post and confirm it disappears from the administration list.
[ ] Resize the browser or use a phone-sized viewport to check responsiveness.

FILES
- index.php: public homepage
- post.php: post details
- admin/: category and post management
- includes/: database connection and shared layout/helpers
- assets/css/style.css: custom styling
- database.sql: database schema and sample records
- Project_Report.pdf: project summary and test plan
