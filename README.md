# Kloter22

### Persiapan database mysql
-- Buka Xampp
-- Start Apache dan MySql di Xampp
-- Klik Shell yang ada pada pojok kanan
-- Masukan perintah 
    mysql -u root -p
    ~press enter~
    -- Masukan query berikut
    -- Buat Database
CREATE DATABASE dwusers;
USE dwusers;

-- Buat Table
CREATE TABLE users_tb (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(64) NOT NULL,
image VARCHAR(64) NOT NULL
); 

CREATE TABLE skill_tb (
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(64) NOT NULL,
user_id INT NULL,
FOREIGN KEY (user_id) REFERENCES users_tb(id)
ON DELETE CASCADE
ON UPDATE CASCADE
);

-- Insert data ke TABLE users_tb --
INSERT INTO users_tb (name, image)
VALUES ('envy', 'envy.jpg'), 
('sloth', 'sloth.jpg'),
('greed', 'greed.jpg'),
('pride', 'pride.jpg'),
('wrath', 'wrath.jpg');

![Image description](https://github.com/ihsan0211/Kloter22/blob/main/Screenchots%204a/insert-users.jpg)

-- Insert data ke TABLE skill_tb --

INSERT INTO skill_tb (name, user_id)
VALUES ('SQL', 6),
('XML', 7),
('Javascript', 8),
('CSS', 9),
('HTML', 10)
;

![Image description](https://github.com/ihsan0211/Kloter22/blob/main/Screenchots%204a/insert-skills.jpg.png)

-- SELECT users with all their skills --

SELECT skill_tb.user_id, users_tb.name, 
	GROUP_CONCAT(DISTINCT skill_tb.name SEPARATOR ', ') AS skills
FROM skill_tb
LEFT JOIN users_tb ON skill_tb.user_id = users_tb.id
GROUP BY skill_tb.user_id;

![Image description](https://github.com/ihsan0211/Kloter22/blob/main/Screenchots%204a/user-all-skills.png)

-- SELECT users dengan spesific skill --

SELECT skill_tb.name, users_tb.name
FROM skill_tb
LEFT JOIN users_tb ON skill_tb.user_id = users_tb.id
WHERE skill_tb.name = 'Javascript';

![Image description](https://github.com/ihsan0211/Kloter22/blob/main/Screenchots%204a/user-spesific-skill.png)

### Buka Web Aplikasi

-- Buka browser
-- Buka localhost/path/index.php  -- Untuk path disesuaikan dengan directory







