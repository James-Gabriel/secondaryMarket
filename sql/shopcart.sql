DROP TABLE IF EXISTS shopcart;
CREATE TABLE shopcart(
    userid INTEGER NOT NULL,
    commodityid INTEGER NOT NULL,
    PRIMARY KEY (userid, commodityid)
);