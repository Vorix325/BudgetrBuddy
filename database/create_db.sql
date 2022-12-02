DROP DATABASE IF EXISTS BBDataBase;
CREATE DATABASE BBDataBase;
USE BBDataBase;

-- create the tables
CREATE TABLE Users_Bbudget
(
    user_name    VARCHAR(30),
    first_name   VARCHAR(30),
    last_name    VARCHAR(30),
    email        VARCHAR(30),
    phone_number VARCHAR(30),
    nick_name    VARCHAR(30),
    typeof_user  VARCHAR(30),
    password     VARCHAR(30),
    user_id      INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (user_id)
);

CREATE TABLE currentq
(
    queue       INT NOT NULL,
    user_id     INT,
    typeof_user  VARCHAR(30),
    PRIMARY KEY (queue)
    
);
CREATE TABLE Budget_Bbudget
(
    budget_id   INT NOT NULL AUTO_INCREMENT,
    amount      FLOAT,
    user_id     INT NOT NULL,
    SMonth       VARCHAR(30),
    SYear        VARCHAR(30),
    PRIMARY KEY (budget_id),
    FOREIGN KEY (user_id)
        REFERENCES Users_Bbudget(user_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
CREATE TABLE Category_BBudget
(
    category_name VARCHAR(30),
    category_id   INT            NOT NULL  AUTO_INCREMENT,
    user_id       INT            NOT NULL,
    limitS         FLOAT,
    total         FLOAT, 
    SMonth        VARCHAR(30),
    SYear         VARCHAR(30),   
    budget_id    INT NOT NULL,                 
    PRIMARY KEY (category_id),
    FOREIGN KEY (user_id) 
     REFERENCES Users_Bbudget(user_id)
     ON UPDATE CASCADE
     ON DELETE CASCADE,
    FOREIGN KEY (budget_id) 
      REFERENCES Budget_Bbudget(budget_id)
      ON UPDATE CASCADE
      ON DELETE CASCADE
        
);



CREATE TABLE Spending_Bbudget
(
    spending_id    INT              NOT NULL AUTO_INCREMENT,
    user_id        INT,
    costName       VARCHAR(30),
    category_id    INT,
    Samount        FLOAT,
    SDate        VARCHAR(30),
    SMonth       VARCHAR(30),
    SYear        VARCHAR(30),
    
    PRIMARY KEY (spending_id),
    FOREIGN KEY (category_id)
        REFERENCES Category_BBudget(category_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (user_id)
        REFERENCES Users_Bbudget(user_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE EMAIL
(
    pr_id      INT         NOT NULL AUTO_INCREMENT,
    user_id    INT,
    adminN      VARCHAR(30),
    email     VARCHAR(30),
    editStatus INT,
    monthS     VARCHAR(30),
    yearS      VARCHAR(30),
    PRIMARY KEY (pr_id)


);
-- INSERT Current User
INSERT INTO currentq VALUES
(1, 0, 'regular');

INSERT INTO Users_BBudget VALUES
('testUser','JK','LSO','test@gmail.com','135-246-9825','guestTest','reg','Test$abc',0),
 ('testAdmin','AD','STK','testAdmin@gmail.com','569-234-1235','admin','super','abcd',1);

INSERT INTO Budget_bbudget VALUES
(0,  1000, 0, 'November', '2022' );

INSERT INTO Category_BBudget VALUES
('food',           0, 0, 100 ,20, 'November', '2022',0),
('cloth',          1, 0, 100 ,40, 'November', '2022',0),
('ultility',       2, 0, 100 ,70, 'November', '2022',0),
('transportation', 3, 0, 100 ,0, 'November', '2022',0),
('medial',         4, 0, 100 ,0, 'November', '2022',0),
('entertaiment',   5, 0, 100 ,0, 'November', '2022',0);



INSERT INTO Spending_Bbudget VALUES
(0,0,'McDonald',0,20,'12','November','2022'),
(1,0,'Uniqlo',1,40,'12','November','2022'),
(2,0,'Saving',2,70,'12','November','2022');

INSERT INTO EMAIL VALUES
(0,0,'testAdmin','fftpnhan2246@gmail.com',0,'November', '2022');
-- create the users
CREATE USER IF NOT EXISTS mgs_user@localhost 
IDENTIFIED BY 'pa55word';

-- grant privleges to the users
GRANT ALL PRIVILEGES ON bbdatabase TO mgs_user@localhost;

