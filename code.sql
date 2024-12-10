
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
    type ENUM('3asima', 'MAdina aktare chohra') NOT NULL,
    id_pays INT,
    FOREIGN KEY (id_pays) REFERENCES pays(id)
);


INSERT INTO continent (name) 
VALUES ('Africa');

INSERT INTO pays (name, population, languages, id_continent)
VALUES 
    ('Morocco', 36910560, 'Arabic, Berber', 1),
    ('Nigeria', 206139589, 'English, Hausa, Yoruba, Igbo', 1),
    ('South Africa', 59308690, 'Afrikaans, English, Zulu, Xhosa', 1),
    ('Egypt', 104124440, 'Arabic', 1),
    ('Kenya', 53771296, 'Swahili, English', 1),
    ('Ethiopia', 118907000, 'Amharic, Oromo', 1),
    ('Ghana', 31072940, 'English', 1),
    ('Uganda', 45741007, 'English, Swahili', 1),
    ('Algeria', 43851044, 'Arabic, Berber', 1),
    ('Senegal', 16420000, 'French, Wolof', 1);

INSERT INTO vill (name, type, id_pays)
VALUES 
    ('Marrakech', 'Famous City', 1),  
    ('Lagos', 'Famous City', 2),      
    ('Cape Town', 'Famous City', 3),  
    ('Cairo', 'Capital City', 4),     
    ('Nairobi', 'Capital City', 5),   
    ('Addis Ababa', 'Capital City', 6), 
    ('Accra', 'Capital City', 7),     
    ('Kampala', 'Capital City', 8),  
    ('Algiers', 'Capital City', 9),   
    ('Dakar', 'Capital City', 10);   
