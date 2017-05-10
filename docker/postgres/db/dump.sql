--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.5
-- Dumped by pg_dump version 9.5.5

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: tasks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tasks (
    tsk_id integer NOT NULL,
    tsk_name character varying(255) NOT NULL,
    tsk_description text NOT NULL,
    tsk_project character varying(255) NOT NULL,
    tsk_type character varying(70) NOT NULL,
    tsk_link character(255) NOT NULL,
    tsk_time_start timestamp(6) without time zone NOT NULL,
    tsk_time_end timestamp(6) without time zone NOT NULL,
    tsk_created timestamp(6) without time zone DEFAULT now() NOT NULL,
    tsk_work_time character varying(11) NOT NULL
);


ALTER TABLE tasks OWNER TO postgres;

--
-- Name: tasks_tsk_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tasks_tsk_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tasks_tsk_id_seq OWNER TO postgres;

--
-- Name: tasks_tsk_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tasks_tsk_id_seq OWNED BY tasks.tsk_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE users (
    usr_id integer NOT NULL,
    usr_login character varying(20) NOT NULL,
    usr_password character varying(40) NOT NULL,
    usr_created timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE users OWNER TO postgres;

--
-- Name: users_usr_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_usr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_usr_id_seq OWNER TO postgres;

--
-- Name: users_usr_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_usr_id_seq OWNED BY users.usr_id;


--
-- Name: tsk_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tasks ALTER COLUMN tsk_id SET DEFAULT nextval('tasks_tsk_id_seq'::regclass);


--
-- Name: usr_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN usr_id SET DEFAULT nextval('users_usr_id_seq'::regclass);


--
-- Data for Name: tasks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tasks (tsk_id, tsk_name, tsk_description, tsk_project, tsk_type, tsk_link, tsk_time_start, tsk_time_end, tsk_created, tsk_work_time) FROM stdin;
1	Test task	test task deskription	project	bug	http://test.loc                                                                                                                                                                                                                                                	2017-05-09 18:55:00	2017-05-09 19:15:00	2017-05-09 15:55:26.214797	20
2	Create new module	Create module Users	Task	Improvement	http://test.loc                                                                                                                                                                                                                                                	2017-05-10 06:35:00	2017-05-10 07:35:00	2017-05-10 05:37:57.513763	60
\.


--
-- Name: tasks_tsk_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tasks_tsk_id_seq', 2, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY users (usr_id, usr_login, usr_password, usr_created) FROM stdin;
1	admin	7c4a8d09ca3762af61e59520943dc26494f8941b	2017-05-09 10:49:32.459795
\.


--
-- Name: users_usr_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_usr_id_seq', 1, true);


--
-- Name: tasks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tasks
    ADD CONSTRAINT tasks_pkey PRIMARY KEY (tsk_id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (usr_id);


--
-- Name: users_usr_login_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_usr_login_key UNIQUE (usr_login);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

