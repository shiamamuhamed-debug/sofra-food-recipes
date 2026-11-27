CREATE DATABASE IF NOT EXISTS student_learning_hub CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE student_learning_hub;

DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE posts (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id INT UNSIGNED NOT NULL,
  title VARCHAR(180) NOT NULL,
  content TEXT NOT NULL,
  status ENUM('published','draft') NOT NULL DEFAULT 'published',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_posts_categories FOREIGN KEY (category_id)
    REFERENCES categories(id) ON UPDATE CASCADE ON DELETE RESTRICT,
  INDEX idx_posts_status_created (status, created_at)
) ENGINE=InnoDB;

INSERT INTO categories (name) VALUES
('Programming'), ('Study Skills'), ('Technology');

INSERT INTO posts (category_id,title,content,status) VALUES
(1,'Getting Started with HTML',
'HTML is the standard markup language used to structure web pages. Start with a clear document structure, use headings for titles, paragraphs for text, and links to connect pages. Practice by building a small page and checking it in your browser.','published'),
(1,'What Is PHP?',
'PHP is a server-side scripting language often used to build dynamic websites. A PHP page can process form data, communicate with a database, and generate HTML that is sent to the browser.','published'),
(2,'Simple Study Planning',
'Break a large subject into small tasks. Decide what you want to finish in each session, take short breaks, and review the key ideas at the end. A realistic plan is easier to follow than an overloaded one.','published'),
(3,'Understanding Databases',
'A database stores information in an organized way. In a relational database, tables contain rows and columns. A primary key identifies each row, while a foreign key connects related records in different tables.','published');
