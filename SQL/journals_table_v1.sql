-- Table: public.journals

-- DROP TABLE IF EXISTS public.journals;

CREATE TABLE IF NOT EXISTS public.journals
(
    journal_id integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    "Account_ID" integer NOT NULL,
    journal_name character varying(255) COLLATE pg_catalog."default" NOT NULL DEFAULT ''::character varying,
    date_created timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    description text COLLATE pg_catalog."default" NOT NULL DEFAULT ''::text,
    is_deleted boolean NOT NULL DEFAULT false,
    CONSTRAINT journals_pkey PRIMARY KEY (journal_id),
    CONSTRAINT journals_account_id_fkey FOREIGN KEY ("Account_ID")
        REFERENCES public."Accounts" ("Account_ID") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.journals
    OWNER to uwqkxcqccvglv;