-- Create Database 

CREATE TABLE site_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    site_name VARCHAR(255) NOT NULL,
    site_address VARCHAR(255) NOT NULL,
    site_area VARCHAR(255) NOT NULL,
    site_city VARCHAR(255) NOT NULL,
    site_state VARCHAR(255) NOT NULL,
    site_pin VARCHAR(10) NOT NULL,
    site_intro VARCHAR(255) NOT NULL
);


INSERT INTO site_details (site_name, site_address, site_area, site_city, site_state, site_pin, site_intro
) VALUES ('RK Entertainment', 'A-203, Himansu apartment, behind gujarat gas company', 'Adajan Gam', 'Surat', 'Gujarat', '395009', 'https://www.youtube.com/watch?v=hu1FI8Ej0MM&ab_channel=AashishSolanki'
);
