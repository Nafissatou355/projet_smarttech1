-- Création de la base de données
CREATE DATABASE smarttech;
USE smarttech;

-- Table des employés
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    position VARCHAR(100) NOT NULL
);

-- Table des clients
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    company VARCHAR(100) NOT NULL
);

-- Table des documents
CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Ajout de quelques données initiales
INSERT INTO employees (name, email, position) VALUES 
('Alice Dupont', 'alice@example.com', 'Développeur'),
('Bob Martin', 'bob@example.com', 'Administrateur Système');

INSERT INTO clients (name, email, company) VALUES 
('Entreprise X', 'contact@entreprisex.com', 'Entreprise X'),
('Société Y', 'info@societey.com', 'Société Y');
