
CREATE TABLE continent (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);


CREATE TABLE pays (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    population BIGINT, 
    languages VARCHAR(100),  
    id_continent INT,
    FOREIGN KEY (id_continent) REFERENCES continent(id)
);


CREATE TABLE vill (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('type1', 'type2', 'type3') NOT NULL,
    id_pays INT,
    FOREIGN KEY (id_pays) REFERENCES pays(id)
);
