CREATE DATABASE IF NOT EXISTS protocolo_rural;

USE protocolo_rural;

-- Usuários
CREATE TABLE IF NOT EXISTS usuarios (
	id_usuario BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
	celular VARCHAR(20) NOT NULL,
	senha VARCHAR(255) NOT NULL,
	ativo BOOLEAN NOT NULL DEFAULT TRUE,
	is_admin BOOLEAN NOT NULL DEFAULT FALSE
);

-- Indicadores
CREATE TABLE IF NOT EXISTS indicadores (
	id_indicador BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(255) NOT NULL,
	descricao VARCHAR(1000) NOT NULL,
	estado BOOLEAN NOT NULL DEFAULT TRUE
);

-- Parâmetros
CREATE TABLE IF NOT EXISTS parametros (
	id_parametro BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	indicador_id BIGINT UNSIGNED NOT NULL,
	descricao VARCHAR(1000) NOT NULL,
	valor TINYINT NOT NULL,
	FOREIGN KEY (indicador_id) REFERENCES indicadores(id_indicador) ON DELETE CASCADE
);

-- Avaliações
CREATE TABLE IF NOT EXISTS avaliacoes (
	id_avaliacao BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_propriedade VARCHAR(255) NOT NULL,
	usuario_id BIGINT UNSIGNED NOT NULL,
	data_avaliacao DATE NOT NULL,
	grau_sustentabilidade INT UNSIGNED NOT NULL,
	grau_porcentagem DECIMAL(5,2) NOT NULL,
	finalizado BOOLEAN NOT NULL DEFAULT FALSE,
	FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS respostas (
	id_resposta BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	avaliacao_id BIGINT UNSIGNED NOT NULL,
	indicador_id BIGINT UNSIGNED NOT NULL,
	parametro_id BIGINT UNSIGNED NOT NULL,
	FOREIGN KEY (avaliacao_id) REFERENCES avaliacoes(id_avaliacao) ON DELETE CASCADE,
	FOREIGN KEY (indicador_id) REFERENCES indicadores(id_indicador),
	FOREIGN KEY (parametro_id) REFERENCES parametros(id_parametro)
);

-- Inserir Indicadores
INSERT INTO indicadores (nome, descricao, estado) VALUES 
('Situação das Nascentes', 'A situação das nascentes refere-se ao estado de preservação e proteção dos locais onde a água brota naturalmente do solo, formando rios e córregos.', 1),
('Áreas de Preservação Permanente (APP)', 'São áreas protegidas por lei, como margens de rios, encostas e nascentes, que devem ser conservadas para proteger a água, o solo e a biodiversidade, evitando deslizamentos e enchentes.', 1),
('Reserva Legal (RL)', 'É a parte de uma propriedade rural que deve ser mantida com vegetação nativa, mesmo podendo ter uso sustentável. Ela ajuda a conservar a biodiversidade e os recursos naturais da região.', 1);

-- Parâmetros para indicador 1
INSERT INTO parametros (indicador_id, descricao, valor) VALUES
(1, '100% protegidas com mata ciliar de raio > 50m', 5),
(1, '100% protegidas com mata ciliar de raio < 50m e > 15m', 4),
(1, '+50% protegidas com mata ciliar de raio > 50m', 3),
(1, '+50% protegidas com mata ciliar de raio < 50m e > 15m', 2),
(1, '-50% protegidas com mata ciliar independente do raio', 1),
(1, 'Todas as nascentes desprotegidas', 0);

-- Parâmetros para indicador 2
INSERT INTO parametros (indicador_id, descricao, valor) VALUES
(2, '100% com vegetação remanescente/restaurada/em restauração de acordo com o artigo 4º da Lei Federal nº. 12.651/2012', 5),
(2, '100% com vegetação remanescente/restaurada/em restauração de acordo com o artigo 61 da Lei Federal nº. 12.651/2012', 4),
(2, '+50% com vegetação remanescente/restaurada/em restauração de acordo com o artigo 4º da Lei Federal nº. 12.651/2012', 3),
(2, '+50% com vegetação remanescente/restaurada/em restauração de acordo com o artigo 61 da Lei Federal nº. 12.651/2012', 2),
(2, '-50% com vegetação remanescente/restaurada/em restauração de acordo com o artigo 4º ou 61 da Lei Federal nº. 12.651/2012', 1),
(2, '100% desprotegidas', 0);

-- Parâmetros para indicador 3
INSERT INTO parametros (indicador_id, descricao, valor) VALUES
(3, 'Totalidade da RL com vegetação remanescente/restaurada/em restauração na propriedade (conforme o Capítulo IV da Lei Federal nº. 12.651/2012).', 5),
(3, 'Pelo menos 50% da RL com vegetação remanescente/restaurada/em restauração na propriedade (conforme o Capítulo IV da Lei Federal nº. 12.651/2012) e o restante compensada na região/bacia hidrográfica (conforme o artigo 66 da Lei Federal nº. 12.651/2012).', 4),
(3, 'Pelo menos 50% da RL com vegetação remanescente/restaurada/em restauração na propriedade (conforme o Capítulo IV da Lei Federal nº. 12.651/2012) e restante compensada fora de região/bacia hidrográfica (conforme o artigo 66 da Lei Federal nº. 12.651/2012).', 3),
(3, 'Menos de 50% da RL com vegetação remanescente/restaurada/em restauração na propriedade (conforme o Capítulo IV da Lei Federal nº. 12.651/2012), e o restante compensada na região/bacia hidrográfica ou 100% da RL compensada na região/bacia hidrográfica (conforme o artigo 66 da Lei Federal nº. 12.651/2012).', 2),
(3, 'Menos de 50% da RL com vegetação remanescente/restaurada/em restauração na propriedade (conforme o Capítulo IV da Lei Federal nº. 12.651/2012), e o restante compensada fora da região/bacia hidrográfica ou 100% da RL compensada fora da região/bacia hidrográfica (conforme o artigo 66 da Lei Federal nº. 12.651/2012).', 1),
(3, 'Sem RL e/ou compensação.', 0);