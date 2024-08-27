CREATE TABLE tarefas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  descricao TEXT,
  data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status ENUM('pendente', 'concluída') DEFAULT 'pendente'
);

INSERT INTO tarefas (titulo, descricao) VALUES 
('Fazer compras no supermercado', 'Comprar leite, pão, ovos e frutas'),
('Agendar consulta médica', 'Agendar consulta com o cardiologista'),
('Pagar contas', 'Pagar as contas de água, luz e telefone');