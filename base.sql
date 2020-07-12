CREATE TABLE `academico`.`identificador` ( 
    
    `ci` INT NOT NULL , 
    `nombres` VARCHAR(100) NOT NULL ,
    `apellido materno` VARCHAR(100) NOT NULL ,
    `apellido paterno` VARCHAR(100) NOT NULL ,
    `nacimiento` DATE NOT NULL ,
    `departamento` VARCHAR(100) NOT NULL)
     ENGINE = InnoDB; 



CREATE TABLE USUARIO
{
ci int NOT NULL,
clave varchar(255),
FOREIGN KEY (ci) REFERENCES identificador(ci)
} 



CREATE TABLE notas
{
    ci int NOT NULL,
    nota varchar(255),
    FOREIGN KEY (ci) REFERENCES identificador(ci)
}

INSERT INTO `identificador` (`ci`, `nombres`, `apellido_materno`, `apellido_paterno`, `nacimiento`, `departamento`, `color`) VALUES ('232322', 'Camila', 'Espejo', 'Carvajal', '1990-07-07', 'cb', '0');
INSERT INTO `identificador` (`ci`, `nombres`, `apellido_materno`, `apellido_paterno`, `nacimiento`, `departamento`, `color`) VALUES ('123456', 'Miguel', 'Diaz', 'Choque', '1990-01-18', 'lp', '0') ;


INSERT INTO `notas` (`ci`, `nota`) VALUES ('8340024', '60'), ('123456', '80');

INSERT INTO `notas` (`ci`, `nota`) VALUES ('8340024', '60'), ('123456', '80');






SELECT * FROM notas n, identificador i WHERE n.ci=i.ci;


SELECT  
    sum( if( departamento = 'lp', departamento, 0 ) ) AS LP,  
    sum( if( departamento = 'cb', departamento, 0 ) ) AS CB, 
    sum( if( departamento = 'sc', departamento, 0 ) ) AS  SC,
    sum( if( departamento = 'OR', departamento, 0 ) ) AS LP,  
    sum( if( departamento = 'PO', departamento, 0 ) ) AS CB, 
    sum( if( departamento = 'PA', departamento, 0 ) ) AS  SC,
    sum( if( departamento = 'BE', departamento, 0 ) ) AS  SC,
    sum( if( departamento = 'TA', departamento, 0 ) ) AS  SC,
    
FROM 
    notas n, identificador i
GROUP BY 
    departamento



    SELECT 
            sum( if( i.departamento = 'lp', 1, 0 ) ) AS LP,
            sum( if( i.departamento = 'cb', 1, 0 ) ) AS CB, 
            sum( if( i.departamento = 'sc', 1, 0 ) ) AS SC,
            sum( if( i.departamento = 'OR', 1, 0 ) ) AS 'OR',  
            sum( if( i.departamento = 'PO', 1, 0 ) ) AS PT, 
            sum( if( i.departamento = 'PA', 1, 0 ) ) AS  PD,
            sum( if( i.departamento = 'BE', 1, 0 ) ) AS  BE,
            sum( if( i.departamento = 'TA', 1, 0 ) ) AS  TJ,
            sum( if( i.departamento = 'CH', 1, 0 ) ) AS  CH
        
    FROM notas n, identificador i
    where n.ci=i.ci && n.nota>=51
    GROUP BY departamento