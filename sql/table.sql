DROP TABLE IF EXISTS user;
CREATE TABLE user(
    id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name CHAR(20) UNIQUE NOT NULL,
    password CHAR(20) NOT NULL,
    birthday DATE NOT NULL,
    gender CHAR(10) NOT NULL,
    email CHAR(30) NOT NULL,
    phone CHAR(20) NOT NULL,
    isseller INTEGER NOT NULL,
    isadmin INTEGER NOT NULL
);

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

DROP TABLE IF EXISTS shopcart;
CREATE TABLE shopcart(
    userid INTEGER NOT NULL,
    commodityid INTEGER NOT NULL,
    PRIMARY KEY (userid, commodityid)
);

DROP TABLE IF EXISTS shoporder;
CREATE TABLE shoporder(
    userid INTEGER NOT NULL,
    commodityid INTEGER NOT NULL,
    PRIMARY KEY (userid, commodityid)
);
