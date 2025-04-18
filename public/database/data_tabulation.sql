
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
    otp_code VARCHAR(6),
    is_verified TINYINT(1) DEFAULT 0,
    role ENUM('admin', 'judge', 'pending') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Events
CREATE TABLE events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(user_id)
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
    otp_code VARCHAR(10),
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
