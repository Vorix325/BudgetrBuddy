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
    user_id      INT NOT NULL,
    PRIMARY KEY (user_id)
);

CREATE TABLE currentQ
(
    queue   INT NOT NULL,
    user_id INT,
    PRIMARY KEY (queue)
);

CREATE TABLE Category_BBudget
(
    category_name VARCHAR(30),
    category_id   INT            NOT NULL,
    user_id       INT            NOT NULL,
    total         FLOAT,                     
    PRIMARY KEY (category_id),
    FOREIGN KEY (user_id) REFERENCES Users_Bbudget(user_id)
        
);

CREATE TABLE Budget_Bbudget
(
    budget_id   INT NOT NULL,
    amount      FLOAT,
    category_id INT NOT NULL,
    Sdate       DATE,
    Smonth      VARCHAR(15),
    PRIMARY KEY (budget_id),
    FOREIGN KEY (category_id)
        REFERENCES Category_BBudget(category_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE Spending_Bbudget
(
    spending_id    INT              NOT NULL,
    user_id        INT,
    category_id    INT,
    Samount        FLOAT,
    smonth         VARCHAR(15),
    PRIMARY KEY (spending_id),
    FOREIGN KEY (category_id)
        REFERENCES Category_BBudget(category_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    FOREIGN KEY (user_id)
        REFERENCES Users_Bbudget(user_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);
-- INSERT Current User
INSERT INTO currentQ VALUES
(1, 0);

INSERT INTO Users_BBudget VALUES
('guest','guest','guest','guest','guest','guest','reg','guest',0);
INSERT INTO Category_BBudget VALUES
('groceries',      0, 0, 0),
('utility',        1, 0, 0),
('medical',        2, 0, 0),
('transportation', 3, 0, 0);
-- create the users
CREATE USER IF NOT EXISTS mgs_user@localhost 
IDENTIFIED BY 'pa55word';

-- grant privleges to the users
GRANT SELECT, INSERT, DELETE, UPDATE
ON * 
TO mgs_user@localhost;
