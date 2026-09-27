# Sistema de Gestão Completo (PHP) 💻

![Status](https://img.shields.io/badge/Status-Concluído-brightgreen)
![Tecnologias](https://img.shields.io/badge/Tecnologias-PHP%20%7C%20MySQL%20%7C%20MVC-blue)
![Deploy](https://img.shields.io/badge/Deploy-Local%20(XAMPP)-orange)

Este repositório contém o código-fonte do Projeto_completo.zip, um sistema web robusto focado no gerenciamento e controle de dados, desenvolvido em PHP com base na arquitetura MVC (Model-View-Controller) e integração segura com banco de dados.

## 📌 O que é este projeto?
É um sistema web completo focado no gerenciamento de operações através de um painel administrativo[cite: 1]. O projeto estrutura a comunicação entre a interface do usuário e o banco de dados de forma organizada, criando um ecossistema seguro onde administradores podem gerenciar entidades, estoques e usuários do sistema de forma lógica.

## 🎯 Qual problema ele procura representar/resolver?
O projeto resolve a necessidade de organização, controle de acesso e manipulação dinâmica de dados em um ambiente web[cite: 1]. Ele gerencia:
* **Controle de Acesso:** Diferenciando usuários comuns de administradores através de um sistema de login.
* **Gestão de Dados:** Interface administrativa que permite a inserção, atualização, listagem e exclusão (CRUD) de registros.
* **Segurança da Informação:** Proteção de rotas e painéis que só podem ser acessados mediante autenticação válida.

## ⚙️ Como ele foi desenvolvido?
Foi desenvolvido utilizando PHP, estruturado através do padrão de arquitetura MVC (Model-View-Controller)[cite: 1]. 

O projeto não utiliza frameworks externos complexos, focando na separação clara de responsabilidades:
* **Models:** Gerenciam as regras de negócio e a comunicação direta com o banco de dados via PDO.
* **Views:** Responsáveis pela interface do usuário (HTML, CSS, JS).
* **Controllers:** Intermediam as requisições do usuário, processam a lógica e devolvem a visualização correta.

## 🚀 Quais são suas principais funcionalidades?
* **Autenticação Segura:** Sistema de login com verificação de credenciais e proteção de sessões[cite: 1].
* **Painel Administrativo (Dashboard):** Área restrita para visualização geral e gerenciamento do sistema[cite: 1].
* **Operações CRUD Completas:** Criação, leitura, atualização e exclusão de registros diretamente pelo painel[cite: 1].
* **Controle de Níveis de Acesso:** Separação de privilégios baseada no perfil do usuário logado[cite: 1].

## 🛠️ Quais tecnologias foram utilizadas?
* **Linguagem Back-end:** PHP[cite: 1].
* **Banco de Dados:** MySQL / MariaDB[cite: 1].
* **Conexão de Dados:** PDO (PHP Data Objects) para consultas preparadas e seguras contra SQL Injection[cite: 1].
* **Front-end:** HTML5, CSS3 e JavaScript[cite: 1].
* **Arquitetura:** MVC (Model-View-Controller)[cite: 1].

## 🧠 Quais conceitos avançados aparecem no sistema?
O código aplica conceitos essenciais para o desenvolvimento web moderno:

* **Arquitetura MVC:** Separação rígida entre a lógica de apresentação e a lógica de negócios, facilitando a manutenção e escalabilidade[cite: 1].
* **Consultas Preparadas (Prepared Statements):** Utilização da biblioteca PDO do PHP para interagir com o banco de dados, garantindo proteção contra ataques de injeção de SQL[cite: 1].
* **Gerenciamento de Sessões:** Uso de `$_SESSION` para manter o estado do usuário logado e proteger rotas administrativas contra acessos não autorizados[cite: 1].
* **Modularidade:** Reutilização de código através da importação de arquivos essenciais (como scripts de conexão com banco e cabeçalhos de página)[cite: 1].

## 💻 Como baixar e executar o projeto localmente

Para rodar este sistema na sua própria máquina e testar todas as suas funcionalidades, você precisará de um ambiente de servidor local. Recomendamos o uso do **XAMPP** (que já inclui o servidor Apache e o banco de dados MySQL/MariaDB).

### Passo a Passo

**1. Faça o Download do Projeto:**
Baixe este repositório em formato ZIP ou faça o clone pelo terminal com o comando abaixo:
`git clone [https://github.com/lc_lucky_/](https://github.com/lc_lucky_/)[nome-do-repositorio].git`

**2. Mova os Arquivos para o Servidor Local:**
* Extraia o ficheiro ZIP do projeto.
* Mova a pasta inteira para o diretório raiz do XAMPP, que geralmente fica em:
  * **Windows:** `C:\xampp\htdocs\`
  * **Linux:** `/opt/lampp/htdocs/`

**3. Inicie os Serviços do XAMPP:**
Abra o painel de controle do XAMPP e clique em **Start** nos módulos **Apache** e **MySQL**.

**4. Configure o Banco de Dados (phpMyAdmin):**
* Abra o seu navegador e acesse: `http://localhost/phpmyadmin`
* Crie um novo banco de dados com o nome exato esperado pelo sistema (verifique o ficheiro de conexão do projeto).
* Clique na aba **Importar**, selecione o ficheiro `.sql` (encontrado dentro da pasta do projeto) e clique em **Executar** para criar as tabelas.

**5. Acesse o Sistema:**
No seu navegador, digite a URL correspondente à pasta do projeto:
`http://localhost/[nome-da-pasta-do-projeto]/`

## 🔐 Acesso ao Sistema (Ambiente de Teste)

Como este é um projeto demonstrativo, você pode acessar o painel administrativo na sua máquina local utilizando as credenciais padrão do sistema:

* **E-mail do Admin:** `[INSERIR E-MAIL AQUI]`
* **Senha do Admin:** `[INSERIR SENHA AQUI]`
