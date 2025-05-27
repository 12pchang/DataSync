-- Drop if exists 
DROP DATABASE IF EXISTS DataSync;
CREATE DATABASE DataSync;
USE DataSync;

-- Users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    alias VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    is_verified TINYINT(1) DEFAULT 0,
    role ENUM('admin', 'judge', 'pending') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    event_type VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    `time` TIME NOT NULL DEFAULT '00:00:00',
    venue VARCHAR(255) NOT NULL,
    banner VARCHAR(255),
    status ENUM('Ongoing', 'Completed', 'Upcoming') DEFAULT 'Upcoming',
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
);


-- Rounds
CREATE TABLE event_rounds (
    round_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    order_number INT,
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

-- Criteria
CREATE TABLE criteria (
    criteria_id INT AUTO_INCREMENT PRIMARY KEY,
    round_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    percentage DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (round_id) REFERENCES event_rounds(round_id)
);

-- Contestants
CREATE TABLE contestants (
    contestant_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    number VARCHAR(20) NOT NULL,
    photo VARCHAR(255),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

-- Judges
CREATE TABLE judges (
    judge_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    has_scored BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (event_id) REFERENCES events(event_id)
);

-- Scores
CREATE TABLE scores (
    score_id INT AUTO_INCREMENT PRIMARY KEY,
    judge_id INT NOT NULL,
    contestant_id INT NOT NULL,
    round_id INT NOT NULL,
    criteria_id INT NOT NULL,
    score_value DECIMAL(5,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (judge_id) REFERENCES judges(judge_id),
    FOREIGN KEY (contestant_id) REFERENCES contestants(contestant_id),
    FOREIGN KEY (round_id) REFERENCES event_rounds(round_id),
    FOREIGN KEY (criteria_id) REFERENCES criteria(criteria_id)
);

-- use this to for temp user pass
echo password_hash("admin123", PASSWORD_DEFAULT);

-- Admin user
INSERT INTO users (full_name, email, password, is_verified, role)
VALUES (
    'Sophie Santos', 
    'admin@datasync.com', 
    'admin@example.com', 
    '$2y$10$MJ5IDL7GlSwZJok5YZJ7w.UHkcXEQLPOc6riNDeIajPkA2dZ043uC', 
    1,
    'admin' -- or  judge 
);