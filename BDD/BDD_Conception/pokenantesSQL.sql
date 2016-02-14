#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        usr_id        int (11) Auto_increment  NOT NULL ,
        usr_firstname Varchar (40) NOT NULL ,
        usr_lastname  Varchar (40) NOT NULL ,
        usr_login     Varchar (40) NOT NULL ,
        usr_password  Varchar (250) NOT NULL ,
        usr_key       Varchar (250) NOT NULL ,
        PRIMARY KEY (usr_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Product
#------------------------------------------------------------

CREATE TABLE Product(
        prod_id      int (11) Auto_increment  NOT NULL ,
        prod_ref     Varchar (250) NOT NULL ,
        prod_name    Varchar (250) NOT NULL ,
        prod_cat     Varchar (250) NOT NULL ,
        prod_desc    Varchar (250) NOT NULL ,
        prod_state   Varchar (15) NOT NULL ,
        prod_picture Varchar (250) NOT NULL ,
        PRIMARY KEY (prod_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Provider
#------------------------------------------------------------

CREATE TABLE Provider(
        prov_id    int (11) Auto_increment  NOT NULL ,
        prov_ref   Varchar (20) NOT NULL ,
        prov_name  Varchar (40) NOT NULL ,
        prov_type  Varchar (20) NOT NULL ,
        prov_phone Int NOT NULL ,
        PRIMARY KEY (prov_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Manage
#------------------------------------------------------------

CREATE TABLE Manage(
        faulty_qty Int NOT NULL ,
        usr_id     Int NOT NULL ,
        prod_id    Int NOT NULL ,
        PRIMARY KEY (usr_id ,prod_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Provide
#------------------------------------------------------------

CREATE TABLE Provide(
        buy_qty Int NOT NULL ,
        prod_id Int NOT NULL ,
        prov_id Int NOT NULL ,
        PRIMARY KEY (prod_id ,prov_id )
)ENGINE=InnoDB;

ALTER TABLE Manage ADD CONSTRAINT FK_Manage_usr_id FOREIGN KEY (usr_id) REFERENCES User(usr_id);
ALTER TABLE Manage ADD CONSTRAINT FK_Manage_prod_id FOREIGN KEY (prod_id) REFERENCES Product(prod_id);
ALTER TABLE Provide ADD CONSTRAINT FK_Provide_prod_id FOREIGN KEY (prod_id) REFERENCES Product(prod_id);
ALTER TABLE Provide ADD CONSTRAINT FK_Provide_prov_id FOREIGN KEY (prov_id) REFERENCES Provider(prov_id);
