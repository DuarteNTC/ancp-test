# Sistema de Cadastro de Animais

## 📌 Descrição
Aplicação web desenvolvida em PHP puro com MySQL para cadastro e listagem de animais, conforme solicitado no teste técnico.

---

## 🚀 Tecnologias Utilizadas
- PHP 8.2
- MySQL 8.0
- PDO (Prepared Statements)
- Bootstrap 5 (apenas para melhoria visual)
- XAMPP (ambiente local)

---

## ⚙️ Funcionalidades

✔ Cadastro de animal  
✔ Listagem de animais  
✔ Cálculo de idade baseado na data de nascimento  
✔ Ordenação por data de cadastro (mais recente primeiro)  
✔ Filtro para animais com mais de 2 anos  
✔ Proteção contra SQL Injection  

---

## 🛠️ Como Executar

1. Instalar XAMPP
2. Iniciar Apache e MySQL
3. Criar banco `animais_db` dentro do PhpAdmin
5. Colocar projeto dentro de:
   C:\xampp\htdocs\
6. Acessar:
   http://localhost/ancp-test/public/index.php

---

## 🗄️ Banco de Dados

O projeto disponibiliza duas opções de base de dados, dependendo da necessidade.

## 🔹 Opção 1 – Base limpa (início de novo ambiente)

Arquivo: `sql/database.sql`

- Contém apenas:

1. Estrutura das tabelas

2. Índices

3. Configuração inicial

Ideal para iniciar um ambiente do zero.


## 🔹 Opção 2 – Base com dados cadastrados (ambiente de desenvolvimento)

Arquivo: `sql/lista-animais-criados.sql`

- Contém:

1. Estrutura da tabela

2. Registros cadastrados durante o desenvolvimento

3. Dados prontos para visualização imediata

Essa opção permite visualizar o funcionamento completo do sistema sem necessidade de realizar novos cadastros.

---
## 🧠 Estrutura do Projeto

- config → conexão com banco
- models → regras de negócio
- public → interface
- sql → script da base
