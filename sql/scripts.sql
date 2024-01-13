CREATE TABLE CONTATO (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(50) NOT NULL,
    EMAIL VARCHAR(50) NOT NULL UNIQUE,
    TELEFONE VARCHAR(20) NOT NULL
);

CREATE TABLE ENDERECO (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    RUA VARCHAR(100) NOT NULL,
    NUMERO VARCHAR(10) NOT NULL,
    BAIRRO VARCHAR(50) NOT NULL,
    CIDADE VARCHAR(50) NOT NULL,
    ESTADO VARCHAR(2) NOT NULL,
    CEP VARCHAR(8) NOT NULL,
    ID_CONTATO INT NOT NULL,
    FOREIGN KEY (ID_CONTATO) REFERENCES CONTATO (ID)
);

INSERT INTO CONTATO (NOME, EMAIL, TELEFONE)
VALUES ('John Doe', 'john.doe@example.com', '34 91234-9876'),
       ('Jane Smith', 'jane.smith@example.com', '34 91234-9876'),
       ('Michael Johnson', 'michael.johnson@example.com', '34 91234-9876'),
       ('Emily Davis', 'emily.davis@example.com', '34 91234-9876'),
       ('David Wilson', 'david.wilson@example.com', '34 91234-9876'),
       ('Sarah Anderson', 'sarah.anderson@example.com', '34 91234-9876'),
       ('Christopher Martinez', 'christopher.martinez@example.com', '34 91234-9876'),
       ('Jessica Taylor', 'jessica.taylor@example.com', '34 91234-9876'),
       ('Matthew Thomas', 'matthew.thomas@example.com', '34 91234-9876'),
       ('Olivia Hernandez', 'olivia.hernandez@example.com', '34 91234-9876'),
       ('Andrew Moore', 'andrew.moore@example.com', '34 91234-9876'),
       ('Elizabeth Clark', 'elizabeth.clark@example.com', '34 91234-9876'),
       ('Daniel Lewis', 'daniel.lewis@example.com', '34 91234-9876'),
       ('Sophia Walker', 'sophia.walker@example.com', '34 91234-9876'),
       ('Joseph Hall', 'joseph.hall@example.com', '34 91234-9876'),
       ('Ava Young', 'ava.young@example.com', '34 91234-9876'),
       ('William Allen', 'william.allen@example.com', '34 91234-9876'),
       ('Mia Hernandez', 'mia.hernandez@example.com', '34 91234-9876'),
       ('James Rodriguez', 'james.rodriguez@example.com', '34 91234-9876'),
       ('Charlotte Lee', 'charlotte.lee@example.com', '34 91234-9876');

INSERT INTO ENDERECO (RUA, NUMERO, BAIRRO, CIDADE, ESTADO, CEP, ID_CONTATO)
VALUES
  ('Rua Chiquinha Gonzaga', 123, 'São Jorge', 'Uberlândia', 'MG', 38407-230, 1),
  ('Rua Ruth Rocha', 456, 'Tubalina', 'Uberlândia', 'MG', 38409-210, 2),
  ('Rua Real Grandeza', 789, 'Tubalina', 'Uberlândia', 'MG', 38412-074, 3),
  ('Rua Whashington', 012, 'Novo Mundo', 'Uberlândia', 'MG', 38409-074, 4),
  ('Rua Manhatan', 345, 'Novo Mundo', 'Uberlândia', 'MG', 38407-714, 5),
  ('Avenida Nova York', 678, 'Novo Mundo', 'Uberlândia', 'MG', 38407-712, 6),
  ('Avenida Atlanta', 901, 'Novo Mundo', 'Uberlândia', 'MG', 38407-710, 7),
  ('Rua Cheyenne', 234, 'Novo Mundo', 'Uberlândia', 'MG', 38407-704, 8),
  ('Rua Ovídio Bradamante Toledo', 567, 'Tubalina', 'Uberlândia', 'MG', 38412-003, 9),
  ('Rua Fádua Barcha Gustim', 890, 'Tubalina', 'Uberlândia', 'MG', 38412-004, 10),
  ('Rua Guerra Junqueira', 123, 'Tubalina', 'Uberlândia', 'MG', 38412-006, 11),
  ('Rua Eça de Queirós', 456, 'Tubalina', 'Uberlândia', 'MG', 38412-008, 12),
  ('Rua Adelso Ferreira Tavares', 789, 'Tubalina', 'Uberlândia', 'MG', 38412-010, 13),
  ('Rua Imperatriz Leopoldina', 012, 'Tubalina', 'Uberlândia', 'MG', 38412-012, 14),
  ('Rua Maria Aparecida Costa', 345, 'Tubalina', 'Uberlândia', 'MG', 38412-008, 15),
  ('Rua Humaitá', 678, 'Tubalina', 'Uberlândia', 'MG', 38412-000, 16),
  ('Avenida Segismundo Pereira', 901, 'Novo Mundo', 'Uberlândia', 'MG', 38407-718, 17),
  ('Rua Albuquerque', 234, 'Novo Mundo', 'Uberlândia', 'MG', 38407-720, 18),
  ('Avenida Palmeira Real', 567, 'Novo Mundo', 'Uberlândia', 'MG', 38409-074, 19),
  ('Rua 10', 890, 'Umuarama', 'Uberlândia', 'MG', 38408-070, 20);
    
