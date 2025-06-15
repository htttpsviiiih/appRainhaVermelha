CREATE TABLE Personagens (
    
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_completo VARCHAR(100) NOT NULL,
    casa CHAR(2), -- 'CA' para Calore, 'SA' para Samos, 'GE' para Guarda Escarlate, etc.
    cor_sangue CHAR(1) NOT NULL, -- 'V' para Vermelho, 'P' para Prata
    habilidade VARCHAR(100) NOT NULL,
    maior_ambicao TEXT,
    local_descoberta_poder VARCHAR(100)

);