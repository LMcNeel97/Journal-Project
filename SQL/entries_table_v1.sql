-- Table: public.Entries

-- DROP TABLE IF EXISTS public.Entries;

CREATE TABLE IF NOT EXISTS public.Entries
(
    "Entry_ID" integer NOT NULL GENERATED ALWAYS AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    journal_id integer NOT NULL,
    entry_name character varying(255) COLLATE pg_catalog."default" NOT NULL DEFAULT ''::character varying,
    date_created timestamp with time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    description text COLLATE pg_catalog."default" NOT NULL DEFAULT ''::text,
    is_deleted boolean DEFAULT false NOT NULL,
    CONSTRAINT Entries_pkey PRIMARY KEY ("Entry_ID"),
    CONSTRAINT Entries_journal_id_fkey FOREIGN KEY ("journal_id")
        REFERENCES public."journals" ("journal_id") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.journals
    OWNER to uwqkxcqccvglv;