-- Table: public.Accounts

-- DROP TABLE IF EXISTS public."Accounts";

CREATE TABLE IF NOT EXISTS public."Accounts"
(
    "Account_ID" integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    email_address character varying(250) COLLATE pg_catalog."default" NOT NULL DEFAULT ''::character varying,
    password character varying(50) COLLATE pg_catalog."default" NOT NULL DEFAULT ''::character varying,
    firstname character varying(25) COLLATE pg_catalog."default" NOT NULL DEFAULT ''::character varying,
    lastname character varying(25) COLLATE pg_catalog."default" NOT NULL DEFAULT ''::character varying,
    date_created timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT "Accounts_pkey" PRIMARY KEY ("Account_ID")
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public."Accounts"
    OWNER to uwqkxcqccvglv;

GRANT ALL ON TABLE public."Accounts" TO uwqkxcqccvglv;