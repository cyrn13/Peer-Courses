DROP DATABASE IF EXISTS peer;

CREATE DATABASE peer;

USE peer;

CREATE table users(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE table trainors(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER UNSIGNED,
    specialty VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE table courses(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trainor_id INTEGER UNSIGNED,
    title VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (trainor_id) REFERENCES trainors(id)
);

CREATE table trainees(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER UNSIGNED,
    course_id INTEGER UNSIGNED,
    `status` VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);
