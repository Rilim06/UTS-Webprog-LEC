CREATE TABLE cart(
    id INT(11) AUTO_INCREMENT,
    `Food Name` VARCHAR(512),
    Category VARCHAR(512),
    Price VARCHAR(512),
    Qty INT(11),
    id_user INT(25),
    PRIMARY KEY (id),
    FOREIGN KEY (id_user) REFERENCES mahasiswa_login(id)
);