📘 Sistema de Cadastro de Animais

Projeto desenvolvido como teste técnico utilizando PHP puro (sem frameworks) para cadastro e listagem de animais.

A interface utiliza Bootstrap 5 apenas para organização visual e melhor experiência de navegação, sem uso de qualquer framework back-end.

🛠️ Tecnologias Utilizadas

PHP 8.2

MySQL 8.0

Bootstrap 5.3

PDO para conexão com banco de dados

Prepared Statements para prevenção de SQL Injection

⚙️ Requisitos

PHP 8.0 ou superior

MySQL 5.7+ ou MySQL 8+

Servidor web (Apache, Nginx ou similar)

Pode ser executado em qualquer ambiente como:

XAMPP

WAMP

Laragon

Docker

Servidor configurado manualmente

📂 Estrutura do Projeto
ancp-test/
│
├── config/
│   └── database.php
│
├── models/
│   └── Animal.php
│
├── public/
│   ├── index.php
│   └── create.php
│
├── sql/
│   ├── database.sql
│   └── lista-animais-criados.sql
│
└── README.md
🗄️ Banco de Dados

O projeto disponibiliza duas opções de base de dados, dependendo da necessidade do avaliador.

🔹 Opção 1 – Base limpa (recomendada para novo ambiente)

Arquivo:

sql/database.sql

Contém:

Estrutura das tabelas

Índices

Configuração inicial

Ideal para iniciar um ambiente do zero.

Criar banco manualmente:
CREATE DATABASE cadastro_animais;

Depois importar o arquivo database.sql.

🔹 Opção 2 – Base com dados cadastrados (ambiente de desenvolvimento)

Arquivo:

sql/lista-animais-criados.sql

Contém:

Estrutura da tabela

Registros cadastrados durante o desenvolvimento

Dados prontos para visualização imediata

Essa opção permite visualizar o funcionamento completo do sistema sem necessidade de realizar novos cadastros.

📥 Como Importar os Arquivos SQL
Via terminal:

Para base limpa:

mysql -u usuario -p cadastro_animais < sql/database.sql

Para base com dados:

mysql -u usuario -p cadastro_animais < sql/lista-animais-criados.sql
Via ferramenta gráfica (phpMyAdmin, DBeaver, MySQL Workbench):

Criar o banco cadastro_animais

Selecionar a opção Importar

Escolher o arquivo desejado dentro da pasta sql

Executar

🔧 Configuração da Conexão

Editar o arquivo:

config/database.php

E ajustar:

Host

Nome do banco (cadastro_animais)

Usuário

Senha

🚀 Executando o Projeto

Colocar a pasta do projeto dentro do diretório público do servidor.

Exemplo no XAMPP:

C:\xampp\htdocs\ancp-test\

Acessar no navegador:

http://localhost/ancp-test/public/index.php
📌 Funcionalidades Implementadas

Cadastro de animais

Listagem com ordenação por data de cadastro

Filtro para animais com 2 anos ou mais

Cálculo automático da idade

Validação básica de formulário

Proteção contra SQL Injection com Prepared Statements

📎 Observações Técnicas

Projeto desenvolvido em PHP puro conforme solicitado.

Bootstrap utilizado apenas para organização visual.

Filtro de idade implementado utilizando comparação precisa de datas (DATE_SUB), garantindo que animais com exatamente 2 anos sejam incluídos no filtro.
