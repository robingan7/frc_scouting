CREATE TABLE teams(
teamnumber VARCHAR(4) NOT NULL,
image VARCHAR(30),
speed INTEGER(10),
weight INTEGER(10),
height INTEGER(10),
autopoints INTEGER(10),
pickupspeed VARCHAR(10),
notes TEXT,
imagetype VARCHAR(20),
climbplatform VARCHAR(6),
cargolevel VARCHAR(6),
hatchlevel VARCHAR(6),
automous VARCHAR(20),
totalcargo INT(5),
totalhatch INT(5),
cargolvl1 INT(5),
cargolvl2 INT(5),
cargolvl3 INT(5),
hatchlvl1 INT(5),
hatchlvl2 INT(5),
hatchlvl3 INT(5),
climbpoint INT(5),
cargoship INT(5),
hatchship INT(5),
autohatch INT(5),
autocargo INT(11),
nothing CHAR(2)
)
;

CREATE TABLE matchperformance ( 
    matchnumber INT(3) NOT NULL, 
    teamnumber VARCHAR(4) NOT NULL, 
    alliance VARCHAR(4) NOT NULL, 
    numberOfHatch INT(5) NOT NULL, 
    numberOfCargo INT(5) NOT NULL, 
    autopoint INT(5) NOT NULL, 
    climbpoint INT(5) NOT NULL,
    cargolvl1 INT(5),
    cargolvl2 INT(5),
    cargolvl3 INT(5),
    hatchlvl1 INT(5),
    hatchlvl2 INT(5),
    hatchlvl3 INT(5),
    region VARCHAR(40),
    cargoship INT(5),
    hatchship INT(5),
    autohatch INT(5),
    autocargo INT(11)
);
 CREATE TABLE users
(
    teamnumber VARCHAR(4) NOT NULL,
    password2 VARCHAR(30) NOT NULL
);


/*
INSERT INTO `teams`(`teamnumber`, `image`, `speed`, `weight`, `height`, `matchnumber`, `autopoints`, `teleboxes`, `pickupspeed`, `standing`, `notes`) VALUES (5805,null,12,12,12,121,2,12,12,12,"Very good");
UPDATE `teams` SET `teamnumber`='0000' WHERE teamnumber=0;