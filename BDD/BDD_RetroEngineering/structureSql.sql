#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: product
#------------------------------------------------------------

CREATE TABLE product(
        prod_id         Int NOT NULL ,
        prod_ref        Varchar (250) NOT NULL ,
        prod_name       Varchar (250) NOT NULL ,
        prod_cat        Varchar (250) NOT NULL ,
        prod_desc       Varchar (250) NOT NULL ,
        prod_state      Varchar (15) NOT NULL ,
        prod_picture    Varchar (250) NOT NULL ,
        prod_qty        Int NOT NULL ,
        prod_qty_defect Int NOT NULL ,
        PRIMARY KEY (prod_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: provider
#------------------------------------------------------------

CREATE TABLE provider(
        prov_id    Int NOT NULL ,
        prov_ref   Varchar (20) NOT NULL ,
        prov_name  Varchar (40) NOT NULL ,
        prov_type  Varchar (20) NOT NULL ,
        prov_phone Int NOT NULL ,
        PRIMARY KEY (prov_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id                    Int NOT NULL ,
        username              Varchar (255) NOT NULL ,
        username_canonical    Varchar (255) NOT NULL ,
        email                 Varchar (255) NOT NULL ,
        email_canonical       Varchar (255) NOT NULL ,
        enabled               Bool NOT NULL ,
        salt                  Varchar (255) NOT NULL ,
        password              Varchar (255) NOT NULL ,
        last_login            Datetime ,
        locked                Bool NOT NULL ,
        expired               Datetime NOT NULL ,
        expires_at            Datetime ,
        confirmation_token    Varchar (255) ,
        password_requested_at Datetime ,
        roles                 Longtext NOT NULL ,
        credentials_expired   Datetime NOT NULL ,
        credentials_expire_at Datetime ,
        firstname             Varchar (255) NOT NULL ,
        lastname              Varchar (255) NOT NULL ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: provide
#------------------------------------------------------------

CREATE TABLE provide(
        prod_id Int NOT NULL ,
        prov_id Int NOT NULL ,
        PRIMARY KEY (prod_id ,prov_id )
)ENGINE=InnoDB;

ALTER TABLE provide ADD CONSTRAINT FK_provide_prod_id FOREIGN KEY (prod_id) REFERENCES product(prod_id);
ALTER TABLE provide ADD CONSTRAINT FK_provide_prov_id FOREIGN KEY (prov_id) REFERENCES provider(prov_id);
