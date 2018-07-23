DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS categories CASCADE;
DROP TABLE IF EXISTS movies CASCADE;
DROP TABLE IF EXISTS countries CASCADE;
DROP TABLE IF EXISTS Friendships CASCADE;
DROP TABLE IF EXISTS Messages CASCADE;
DROP TABLE IF EXISTS likes CASCADE;
DROP TABLE IF EXISTS Scores CASCADE;
DROP TABLE IF EXISTS Recommendations CASCADE;
DROP TABLE IF EXISTS View_movies CASCADE;
DROP TABLE IF EXISTS To_watch_movies CASCADE;


CREATE TABLE Users(
    id int AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(48) NOT NULL,
    email VARCHAR(48) NOT NULL,
    password VARCHAR(48) NOT NULL,
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Friendships(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_from INT NOT NULL REFERENCES users(id),
    user_to INT NOT NULL REFERENCES users(id),
    status VARCHAR(48) NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Messages(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_from INT NOT NULL REFERENCES users(id),
    user_to INT NOT NULL REFERENCES users(id),
    created DATETIME DEFAULT NULL,
    body VARCHAR(255) NOT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Categories(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(48) NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Countries(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(48) NOT NULL,
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Movies(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(48) NOT NULL,
    description VARCHAR(255),
    duration VARCHAR(15) NOT NULL,
    country_id INT NOT NULL REFERENCES countries(id),
    category_id INT NOT NULL REFERENCES categories(id),
    image VARCHAR(255),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Likes(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    movie_id INT NOT NULL REFERENCES movies(id),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Scores(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    movie_id INT NOT NULL REFERENCES movies(id),
    value int NOT NULL,
    message VARCHAR(255),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE Recommendations(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    movie_id INT NOT NULL REFERENCES movies(id),
    message VARCHAR(255),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE View_movies(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    movie_id INT NOT NULL REFERENCES movies(id),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE To_watch_movies(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id),
    movie_id INT NOT NULL REFERENCES movies(id),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);
