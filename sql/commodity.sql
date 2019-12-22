DROP TABLE IF EXISTS commodity;
CREATE TABLE commodity(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    class CHAR(20) NOT NULL,
    name CHAR(20) NOT NULL,
    descrip CHAR(100) NOT NULL,
    seller INTEGER NOT NULL,
    price DOUBLE NOT NULL,
    evaluation CHAR(100) ,
    issold INTEGER NOT NULL
);