# Jornada do Casamento

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0C6?style=for-the-badge&logo=alpine.js&logoColor=white)

## 🎵 Sobre o Projeto

**Jornada do Casamento** é uma aplicação web moderna, projetada para ser a companheira digital de casais em todas as etapas do planejamento do seu grande dia. Atualmente, o projeto foca na funcionalidade de **Playlists Musicais**, oferecendo uma maneira intuitiva e elegante de organizar a trilha sonora perfeita para cada momento da celebração.

Com um design exclusivo e uma interface de usuário "cool" e festiva, a aplicação é a base para futuras expansões, como galerias de inspiração e áreas de anotações, tornando-se a plataforma ideal para gerenciar todos os aspectos do casamento.

## ✨ Funcionalidades Atuais

- **Criação e Edição de Playlists:** Crie playlists personalizadas com nome e descrição.
- **Gerenciamento de Músicas:** Adicione, edite e exclua músicas facilmente.
- **Organização por Etapas:** Classifique cada música em categorias como `Cerimônia`, `Coquetel`, `Jantar` e `Festa`.
- **Links para Músicas:** Salve links do YouTube, Spotify ou outras plataformas para acesso rápido.
- **Design Exclusivo:** Interface de usuário moderna e totalmente responsiva, com tema escuro e elementos neomórficos.
- **Autenticação Segura:** Telas de login e registro estilizadas, garantindo acesso seguro ao seu planejador.

## 🚀 Tecnologias

O projeto foi construído sobre uma base sólida e moderna, utilizando:

- **Back-end:** [Laravel](https://laravel.com/) (versão 10+)
- **Front-end:** [Blade](https://laravel.com/docs/master/blade), [Tailwind CSS](https://tailwindcss.com/) (com Vite) e [Alpine.js](https://alpinejs.dev/)
- **Banco de Dados:** SQLite (padrão do `.env.example`, pode ser alterado para MySQL, PostgreSQL, etc.)
- **Ambiente de Desenvolvimento:** [Node.js](https://nodejs.org/) e [Composer](https://getcomposer.org/)

## ⚙️ Instalação e Execução

Siga os passos abaixo para configurar e rodar o projeto localmente.

### Requisitos

- PHP >= 8.1
- Composer
- Node.js & NPM

### Passo a Passo

1. **Clone o repositório:**
   ```bash
   git clone [https://github.com/seu-usuario/seu-repositorio.git](https://github.com/seu-usuario/seu-repositorio.git)
   cd seu-repositorio
    ```

2. **Instale as dependências do Composer:**
    ```bash
   composer install
   ```  

3. **Copie o arquivo de ambiente e gere a chave:**
    ```bash
    cp .env.example .env
    php artisan key:generate
   ``` 
4. **Instale as dependências do NPM:**
    ```bash
   npm install
   ```

5. **Execute as migrações do banco de dados:**
    ```bash
      php artisan migrate
    ```

6. **Inicie o servidor de desenvolvimento e o compilador de assets:**
Abra dois terminais separados.

Terminal 1 (para o servidor Laravel):
   ```bash
       php artisan serve
   ```
Terminal 2 (para o compilador do Tailwind e Alpine):
   ```bash
       php artisan serve
   ```

7. **Acesse a aplicação:** 
Abra seu navegador e acesse a URL que o php artisan serve fornecer (geralmente http://127.0.0.1:8000).

## 🎨 Design e Estilo
A interface da Jornada do Casamento foi totalmente customizada com o Tailwind CSS. As escolhas de design incluem:

Tema Escuro: Uma paleta de cores baseada em tons de cinza escuro (#1e1e1e, #2a2a2a) para uma aparência sofisticada.

Neumorfismo: Efeitos de sombra sutis que criam a sensação de que os elementos "saltam" ou "afundam" na tela.

Cores de Destaque: Uso de rosa (pink-500) e azul (blue-400) vibrantes para botões, ícones e links, injetando energia na interface.

Tipografia: Combinação das fontes Poppins (para títulos) e Inter (para o corpo do texto), o que equilibra um visual moderno com legibilidade.

## 👨‍💻 Autor
[Guilherme Lara](https://github.com/devguilara)

## 📄 Licença
Este projeto é de código aberto e está licenciado sob a Licença MIT.