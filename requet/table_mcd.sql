#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: sp_users
#------------------------------------------------------------

CREATE TABLE sp_users(
        id                Int  Auto_increment  NOT NULL ,
        sp_users_login    Varchar (30) NOT NULL ,
        sp_users_email    Varchar (50) NOT NULL ,
        sp_users_password Varchar (25) NOT NULL ,
        sp_users_country  Varchar (100) NOT NULL ,
        sp_users_avatar   Varchar (260) ,
        sp_users_role     Varchar (50) NOT NULL
	,CONSTRAINT sp_users_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sp_series_pages
#------------------------------------------------------------

CREATE TABLE sp_series_pages(
        id                                Int  Auto_increment  NOT NULL ,
        sp_series_pages_title             Varchar (75) NOT NULL ,
        sp_series_pages_description       Varchar (1900) NOT NULL ,
        sp_series_pages_number_seasons    Int NOT NULL ,
        sp_series_pages_number_episodes   Int NOT NULL ,
        sp_series_pages_duration_episodes Int NOT NULL ,
        sp_series_pages_diffusion_channel Varchar (40) NOT NULL ,
        sp_series_pages_trailer           Varchar (260) NOT NULL ,
        sp_series_pages_image             Varchar (260) NOT NULL ,
        sp_series_pages_french_title      Varchar (260) ,
        sp_series_pages_original_title    Varchar (260) ,
        sp_series_pages_origin            Varchar (260) ,
        sp_series_pages_verification      TinyINT NOT NULL
	,CONSTRAINT sp_series_pages_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sp_creator
#------------------------------------------------------------

CREATE TABLE sp_creator(
        id                   Int  Auto_increment  NOT NULL ,
        sp_creator_productor Varchar (250) NOT NULL
	,CONSTRAINT sp_creator_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sp_actor
#------------------------------------------------------------

CREATE TABLE sp_actor(
        id                 Int  Auto_increment  NOT NULL ,
        sp_actor_firstname Varchar (50) NOT NULL ,
        sp_actor_lastname  Varchar (50) NOT NULL
	,CONSTRAINT sp_actor_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sp_episodes_infos
#------------------------------------------------------------

CREATE TABLE sp_episodes_infos(
        id                       Int  Auto_increment  NOT NULL ,
        sp_episodes_infos_name   Varchar (150) NOT NULL ,
        sp_episodes_infos_number Varchar (15) NOT NULL ,
        id_sp_series_pages       Int NOT NULL
	,CONSTRAINT sp_episodes_infos_PK PRIMARY KEY (id)

	,CONSTRAINT sp_episodes_infos_sp_series_pages_FK FOREIGN KEY (id_sp_series_pages) REFERENCES sp_series_pages(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sp_categories
#------------------------------------------------------------

CREATE TABLE sp_categories(
        id                   Int  Auto_increment  NOT NULL ,
        sp_categories_gender Varchar (260) NOT NULL
	,CONSTRAINT sp_categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relation_series_pages_actor
#------------------------------------------------------------

CREATE TABLE relation_series_pages_actor(
        id          Int NOT NULL ,
        id_sp_actor Int NOT NULL
	,CONSTRAINT relation_series_pages_actor_PK PRIMARY KEY (id,id_sp_actor)

	,CONSTRAINT relation_series_pages_actor_sp_series_pages_FK FOREIGN KEY (id) REFERENCES sp_series_pages(id)
	,CONSTRAINT relation_series_pages_actor_sp_actor0_FK FOREIGN KEY (id_sp_actor) REFERENCES sp_actor(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relation_series_pages_creator
#------------------------------------------------------------

CREATE TABLE relation_series_pages_creator(
        id                 Int NOT NULL ,
        id_sp_series_pages Int NOT NULL
	,CONSTRAINT relation_series_pages_creator_PK PRIMARY KEY (id,id_sp_series_pages)

	,CONSTRAINT relation_series_pages_creator_sp_creator_FK FOREIGN KEY (id) REFERENCES sp_creator(id)
	,CONSTRAINT relation_series_pages_creator_sp_series_pages0_FK FOREIGN KEY (id_sp_series_pages) REFERENCES sp_series_pages(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: relation_series_pages_categories
#------------------------------------------------------------

CREATE TABLE relation_series_pages_categories(
        id               Int NOT NULL ,
        id_sp_categories Int NOT NULL
	,CONSTRAINT relation_series_pages_categories_PK PRIMARY KEY (id,id_sp_categories)

	,CONSTRAINT relation_series_pages_categories_sp_series_pages_FK FOREIGN KEY (id) REFERENCES sp_series_pages(id)
	,CONSTRAINT relation_series_pages_categories_sp_categories0_FK FOREIGN KEY (id_sp_categories) REFERENCES sp_categories(id)
)ENGINE=InnoDB;

