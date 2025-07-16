📖 Manual de Uso: Jornada do Casamento com Docker
Este manual serve como um guia rápido para desenvolvedores que trabalham com o projeto "Jornada do Casamento". Ele detalha o fluxo de trabalho com Docker e os comandos essenciais para o desenvolvimento diário.

🚀 Visão Geral do Ambiente
Seu ambiente de desenvolvimento para o projeto "Jornada do Casamento" é totalmente containerizado usando Docker e Docker Compose. Isso significa que PHP, Nginx (servidor web) e MySQL (banco de dados) rodam em contêineres isolados, garantindo consistência e fácil configuração.

app (PHP-FPM): Onde seu código Laravel é executado. Ele contém PHP, Composer e as extensões necessárias.

web (Nginx): O servidor web que recebe as requisições HTTP e as direciona para o app (para o código PHP) ou serve arquivos estáticos.

db (MySQL): Seu banco de dados para armazenar todos os dados da aplicação.

Seu código-source Laravel reside na pasta raiz do projeto no seu computador (jornada-do-casamento/) e é automaticamente sincronizado com o contêiner app via volumes Docker.

▶️ Iniciando e Parando o Projeto
Esses comandos são a base do seu dia a dia de desenvolvimento.

Iniciar o Projeto (Ligar os Contêineres)
Para ligar todos os serviços do seu projeto e deixá-los rodando em segundo plano:

Bash

sudo docker compose up -d
Execute isso no início do seu dia de trabalho, ou sempre que reiniciar seu computador.

Na primeira vez (ou após mudanças nos Dockerfiles), o Docker vai construir as imagens. Depois, ele apenas iniciará os contêineres existentes.

Seu projeto estará acessível em http://localhost:45.

Parar o Projeto (Desligar os Contêineres)
Para parar todos os serviços, mas manter os contêineres e seus dados (incluindo o banco de dados e arquivos de cache/log do Laravel):

Bash

sudo docker compose stop
Use isso no final do dia ou quando quiser liberar recursos do seu sistema sem perder o estado atual.

Para iniciar novamente, basta usar sudo docker compose up -d.

Desligar e Remover Contêineres (Limpeza Padrão)
Para parar e remover completamente os contêineres e as redes associadas ao projeto. Por padrão, ele mantém os volumes de dados (como o dbdata do MySQL), então seus dados do banco de dados estarão seguros.

Bash

sudo docker compose down
Use quando for trocar de projeto ou quiser uma limpeza leve.

Para iniciar, use sudo docker compose up -d.

Desligar e Remover TUDO (Reset Completo)
Para parar e remover contêineres, redes e todos os volumes de dados. Use com cautela, pois isso apagará seu banco de dados e qualquer arquivo gerado dentro dos volumes!

Bash

sudo docker compose down --rmi all -v
Use apenas quando quiser recomeçar do zero (como fizemos durante a configuração inicial).

Após este comando, você precisará rodar sudo docker compose up -d --build e então reinstalar o Laravel (se a pasta principal estiver vazia) e as migrações.

🛠️ Desenvolvendo o Projeto (Comandos Essenciais)
Seu código-source está na pasta jornada-do-casamento/ no seu computador. Use seu editor de código preferido para modificá-lo. As alterações serão refletidas automaticamente nos contêineres devido ao uso de volumes.

Para executar comandos relacionados ao PHP, Laravel ou frontend, você precisará interagir com o contêiner app.

Acessar o Terminal do Contêiner app
Sempre que precisar executar comandos Artisan, Composer ou NPM, você deve fazê-lo dentro do contêiner app:

Bash

sudo docker compose exec app sh
O prompt do seu terminal mudará para algo como /var/www/html #, indicando que você está dentro do contêiner.

Use exit para sair do contêiner e voltar ao seu terminal local.

Comandos Comuns Dentro do Contêiner
Instalar dependências PHP:

Bash

composer install
Atualizar dependências PHP:

Bash

composer update
Criar um novo model, controller, migration, etc.:

Bash

php artisan make:model NomeDoModelo -mcr # Exemplo: Model, Migration, Controller, Resource
Executar migrações do banco de dados (após criar novas):

Bash

php artisan migrate
Para reverter a última migração: php artisan migrate:rollback

Para reverter todas e rodar novamente: php artisan migrate:fresh (APAGA TODOS OS DADOS das tabelas!)

Limpar o cache do Laravel (muito importante durante o desenvolvimento):

Bash

php artisan config:clear
php artisan cache:clear
php artisan view:clear
Gerar a chave da aplicação (se não foi gerada ou precisa de uma nova):

Bash

php artisan key:generate
Instalar dependências de frontend (Node.js/NPM):

Bash

npm install
Compilar assets de frontend para desenvolvimento (observa mudanças):

Bash

npm run dev
Compilar assets de frontend para produção:

Bash

npm run build
🔍 Depuração e Solução de Problemas
Se algo não estiver funcionando como esperado (um erro 500, página em branco, etc.), suas primeiras ferramentas devem ser verificar o estado dos contêineres e seus logs.

Verificar o Status dos Serviços
Bash

sudo docker compose ps
Verifique se todos os serviços (app, web, db) estão com o State como Up e healthy (se configurado).

Se algum estiver Exited ou Restarting, o problema está ali.

Verificar os Logs dos Serviços
Logs do PHP (app - para erros do Laravel):

Bash

sudo docker compose logs app
Logs do Nginx (web - para problemas de acesso ou 502 Bad Gateway):

Bash

sudo docker compose logs web
Logs do MySQL (db - para problemas de inicialização do banco de dados):

Bash

sudo docker compose logs db
🌐 Acessando a Aplicação
Sua aplicação estará sempre acessível no seu navegador em:

http://localhost:45