
CREATE TABLE IF NOT EXISTS public."Users_Bbudget"
(
    user_name character varying(30) COLLATE pg_catalog."default",
    first_name character varying(30) COLLATE pg_catalog."default",
    last_name character varying(30) COLLATE pg_catalog."default",
    email character varying(30) COLLATE pg_catalog."default",
    phone_number character varying(30) COLLATE pg_catalog."default",
    nick_name character varying(30) COLLATE pg_catalog."default",
    typeof_user character varying(30) COLLATE pg_catalog."default",
    password character varying(30) COLLATE pg_catalog."default",
    user_id integer NOT NULL DEFAULT nextval('"Users_Bbudget_user_id_seq"'::regclass),
    CONSTRAINT "Users_Bbudget_pkey" PRIMARY KEY (user_id)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."Users_Bbudget"
    OWNER to "Super User";

GRANT ALL ON TABLE public."Users_Bbudget" TO "Super User";

GRANT INSERT(first_name), UPDATE(first_name) ON public."Users_Bbudget" TO "Regular User";

GRANT INSERT(last_name), UPDATE(last_name) ON public."Users_Bbudget" TO "Regular User";

GRANT INSERT(email), UPDATE(email) ON public."Users_Bbudget" TO "Regular User";

GRANT INSERT(phone_number), UPDATE(phone_number) ON public."Users_Bbudget" TO "Regular User";

GRANT INSERT(nick_name), UPDATE(nick_name) ON public."Users_Bbudget" TO "Regular User";
