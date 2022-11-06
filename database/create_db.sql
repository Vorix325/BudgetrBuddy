DROP DATABASE IF EXISTS BBDataBase;
CREATE DATABASE BBDataBase;
USE BBDataBase;

TABLESPACE pg_default;

-- create the tables
CREATE TABLE Users_Bbudget
(
    user_name    character varying(30) COLLATE pg_catalog."default",
    first_name   character varying(30) COLLATE pg_catalog."default",
    last_name    character varying(30) COLLATE pg_catalog."default",
    email        character varying(30) COLLATE pg_catalog."default",
    phone_number character varying(30) COLLATE pg_catalog."default",
    nick_name    character varying(30) COLLATE pg_catalog."default",
    typeof_user  character varying(30) COLLATE pg_catalog."default",
    password     character varying(30) COLLATE pg_catalog."default",
    user_id      integer NOT NULL DEFAULT nextval('"Users_Bbudget_user_id_seq"'::regclass),
    CONSTRAINT "Users_Bbudget_pkey" 
    PRIMARY KEY (user_id)
)

CREATE TABLE currentQ
{
    queue   integer NOT NULL COLLATE pg_catalog."default",
    user_id integer DEFAULT,
    PRIMARY KEY (queue)
}

CREATE TABLE Budget_Bbudget
(
    budget_id integer NOT NULL DEFAULT nextval('"Budget_Bbudget_budget_id_seq"'::regclass),
    amount money,
    category_id integer,
    date date,
    month character varying(15) COLLATE pg_catalog."default",
    CONSTRAINT "Budget_Bbudget_pkey" PRIMARY KEY (budget_id),
    CONSTRAINT "Budget_Bbudget" FOREIGN KEY (category_id)
        REFERENCES public."Category_BBudget" (category_id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
)

CREATE TABLE Category_BBudget
(
    category_name character varying(30) COLLATE pg_catalog."default",
    category_id   integer NOT NULL DEFAULT nextval('"Category_BBudget_category_id_seq"'::regclass),
    user_id       integer NOT NULL DEFAULT nextval('"Category_BBudget_user_id_seq"'::regclass),
    total         float,
    CONSTRAINT "Category_BBudget_pkey" PRIMARY KEY (category_id),
    CONSTRAINT "Category_BBudget_FKEY" FOREIGN KEY (user_id)
        REFERENCES public."Users_Bbudget" (user_id) MATCH FULL
        ON UPDATE CASCADE
        ON DELETE CASCADE
)

CREATE TABLE Spending_Bbudget
(
    spending_id    integer              NOT NULL DEFAULT nextval('"Spending_Bbudget_spending_id_seq"'::regclass),
    user_id        integer,
    category_id    integer,
    amount money,
    month          character varying(15) COLLATE pg_catalog."default",
    CONSTRAINT "Spending_Bbudget_pkey"   PRIMARY KEY (spending_id),
    CONSTRAINT "Category_BBudget_FKEY2"  FOREIGN KEY (category_id)
        REFERENCES public."Category_BBudget" (category_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "Category_BBudget_fkey1" FOREIGN KEY (user_id)
        REFERENCES public."Users_Bbudget" (user_id) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
)
-- INSERT Current User
INSERT INTO currentQ VALUES
(1, 0);

-- create the users
CREATE USER IF NOT EXISTS mgs_user@localhost 
IDENTIFIED BY 'pa55word';

-- grant privleges to the users
GRANT SELECT, INSERT, DELETE, UPDATE
ON * 
TO mgs_user@localhost;
