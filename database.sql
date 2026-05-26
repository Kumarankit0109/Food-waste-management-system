CREATE DATABASE food_wastage;

USE food_wastage;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100),
    phone VARCHAR(20)
);

-- Food Table (with timestamp added)
CREATE TABLE food (
    id INT AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(100),
    quantity VARCHAR(50),
    location VARCHAR(150),
    time VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Admin Table
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    password VARCHAR(100)
);