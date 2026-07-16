CREATE DATABASE logistics_db;

USE logistics_db;

-- Customers Table
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT
);

-- Agents Table
CREATE TABLE agents (
    agent_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    email VARCHAR(100)
);

-- Packages Table
CREATE TABLE packages (
    package_id INT AUTO_INCREMENT PRIMARY KEY,
    tracking_id VARCHAR(50) UNIQUE,
    customer_id INT,
    agent_id INT DEFAULT NULL,
    weight DECIMAL(10,2),
    source VARCHAR(255),
    destination VARCHAR(255),
    status VARCHAR(50) DEFAULT 'Created',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (customer_id)
        REFERENCES customers(customer_id)
        ON DELETE CASCADE,

    FOREIGN KEY (agent_id)
        REFERENCES agents(agent_id)
        ON DELETE SET NULL
);