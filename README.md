# 💡 Sistema de Estudo de Caso em PHP

Este projeto é um Sistema de Estudo de Caso que está sendo desenvolvido com os estudantes da disciplina de Programação Web do curso de Tecnologia em Análise e Desenvolvimento de Sistemas do IFPR Campus Telêmaco Borba. O objetivo é aplicar conceitos de desenvolvimento web utilizando PHP.

## 👨🏽‍💻 Desenvolvedor

+ Vagner Ferreira Lima Junior: [@vagnerflj](https://github.com/vagnerflj)

## Sumário

- [Teoria do Projeto](#teoria-do-projeto)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Funcionalidades](#funcionalidades)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Exemplos de Código](#exemplos-de-código)
- [Como Executar](#como-executar)
- [Contribuição](#contribuição)

## Teoria do Projeto

- Desenvolvimento de uma aplicação web utilizando PHP
- Estruturação do projeto em diferentes módulos: autenticação, gerenciamento de usuários e produtos
- Utilização de boas práticas de programação e organização de código

## Tecnologias Utilizadas

- **PHP**: Versão 7.4 ou superior
- **MySQL**: Para banco de dados
- **HTML/CSS**: Para estruturação e estilização das páginas
- **JavaScript**: Para interatividade no front-end

## Funcionalidades

- Sistema de login e autenticação de usuários
- Gerenciamento de produtos
- Validação de formulários
- Estruturação clara e organizada, seguindo boas práticas de desenvolvimento

### Conexão com o Banco de Dados

```php
<?php
// conexaoBD.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "generico";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
```
## Ação de Cadastro de Usuario

```php
<?php
// actionUsuario.php
include 'conexaoBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
```
## Como Executar

```php
## 1. Clone o repositório:

git clone https://github.com/vagnerflj/website-in-PHP.git
cd website-in-PHP

## 2. Configure o banco de dados no MySQL:
# - Crie um banco de dados chamado "generico"
# - Execute as migrações ou crie as tabelas necessárias

## 3. Execute o servidor local do PHP:

php -S localhost:8000
```
