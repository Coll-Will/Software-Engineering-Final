CREATE TABLE customers(CID int NOT NULL AUTO_INCREMENT, fname varchar(36), lname varchar(36),
	email varchar(255) NOT NULL, phone varchar(11), street varchar(64), city varchar(64), 
	state varchar(2), zip int, pass varchar(36) NOT NULL,
    PRIMARY KEY (CID)
    ); 
    
CREATE TABLE warehouses(WID int NOT NULL AUTO_INCREMENT, street varchar(64), state varchar(2),
	city varchar(64), zip int,
    PRIMARY KEY (WID)
    );
    
CREATE TABLE inventory(IID int NOT NULL AUTO_INCREMENT, package_name varchar(255), cost double,
	PRIMARY KEY (IID)
    );

CREATE TABLE shipments(SID int NOT NULL AUTO_INCREMENT, IID int NOT NULL, CID int NOT NULL, WID int DEFAULT 0,
	to_street varchar(64), to_city varchar(64), to_state varchar(2), to_zip int,
    cur_street varchar(64), cur_city varchar(64), cur_state varchar(2), cur_zip int,
	cancel char, refund char,
    PRIMARY KEY (SID),
    CONSTRAINT fk_IID FOREIGN KEY (IID) REFERENCES inventory(IID),
    CONSTRAINT fk_CID FOREIGN KEY (CID) REFERENCES customers(CID),
    CONSTRAINT fk_WID FOREIGN KEY (WID) REFERENCES warehouses(WID)
    );