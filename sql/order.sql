DROP TABLE IF EXISTS shoporder;
CREATE TABLE shoporder(
    userid INTEGER NOT NULL,
    commodityid INTEGER NOT NULL,
    PRIMARY KEY (userid, commodityid)
);