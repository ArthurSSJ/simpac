 Documentação do Sistema SIMPAC

 1. Introdução

O NUPEX (Núcleo de Apoio à Pesquisa e Extensão da Univiçosa), responsável por gerenciar as avaliações feitas no SIMPAC (Simpósio de Pesquisa e Extensão da Univiçosa), enfrenta desafios na entrega eficiente de resultados e na gestão manual das avaliações. O projeto visa otimizar esse processo por meio de uma aplicação que proporciona eficiência na organização de projetos por curso, resultando em entregas mais rápidas e menos trabalho repetitivo para os organizadores.

 2. Tecnologias Utilizadas

- Framework: Laravel
- Banco de Dados: MySQL, gerenciado via PHPMyAdmin
- Frontend**: HTML, CSS (Tailwind CSS)


O CodeIgniter 4 foi escolhido por sua leveza, simplicidade e por oferecer uma arquitetura MVC robusta, que facilita a separação entre lógica de negócio, interface e acesso aos dados. O banco de dados MySQL, administrado via PHPMyAdmin, será utilizado para armazenar todas as informações referentes a resumos, avaliadores, notas, entre outros.

 3. Funcionalidades Principais

 3.1 Área Admin
A área administrativa permite aos organizadores realizar as seguintes operações:
- Selecionar Avaliadores: Escolher avaliadores para os resumos.
- Criar/Alterar Trabalhos: Gerenciar os trabalhos submetidos.
- Editar/Excluir Resumos: Manipular os resumos cadastrados no sistema.
- Gerenciar Avaliadores: Adicionar, editar ou excluir avaliadores.

 3.2 Área Avaliador
Os avaliadores têm acesso à lista de resumos atribuídos a eles, podendo visualizar as informações e submeter suas avaliações:
- Visualizar Resumos: Acesso às informações do resumo (curso, protocolo, etc.).
- Inserir e Modificar Notas: Avaliar os resumos e enviar suas avaliações.

 3.3 Resultados
Os resultados são disponibilizados para consulta tanto pelos avaliadores quanto pelos participantes:
- Resultados Pôster e Oral: Trabalhos aprovados para apresentações.
- Resumos Aprovados**: Disponibilizados via um link externo.

 3.4 Login
Sistema de autenticação que controla o acesso às áreas administrativas e de avaliadores.

 4. Módulos do Sistema

 4.1 Home
A página inicial dá acesso a diferentes áreas do sistema, como "Admin", "Avaliador", "Resultados" e "Resumos Aprovados".

 4.2 Gerenciamento de Avaliadores
Módulo que permite ao administrador selecionar avaliadores para revisar os resumos submetidos.

 4.3 Cadastro de Trabalhos
Permite o cadastro de novos trabalhos com detalhes como curso, resumo e protocolo.

 4.4 Avaliação de Resumos
Os avaliadores podem visualizar os resumos e atribuir notas de acordo com os critérios estabelecidos.

 4.5 Exibição de Resultados
Os resultados das avaliações são compilados e disponibilizados para consulta na área de "Resultados".

 5. Fluxo de Trabalho

 5.1 Login e Acesso ao Sistema
Os usuários se autenticam para acessar suas respectivas áreas: Administrador ou Avaliador.

 5.2 Avaliação de Resumos
O avaliador acessa sua lista de resumos, preenche as notas conforme o modelo avaliativo e envia as avaliações para o sistema.

 5.3 Gestão de Resumos e Avaliadores
Os administradores gerenciam tanto os resumos submetidos quanto os avaliadores, com possibilidade de criar, editar e excluir registros.

 5.4 Visualização de Resultados
Após as avaliações, os resultados são exibidos publicamente ou de forma controlada, conforme as permissões dos usuários.

 6. Requisitos Funcionais

- Cadastro e gerenciamento de usuários (admin e avaliador).
- Sistema de autenticação para controle de acesso.
- Gerenciamento de resumos, trabalhos e avaliadores.
- Inserção e modificação de notas pelos avaliadores.
- Visualização de resultados por usuários autorizados.

 7. Considerações Finais

Esse sistema visa trazer mais eficiência ao processo de avaliação de resumos no SIMPAC, automatizando tarefas e facilitando a gestão de grandes volumes de dados.
<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# simpac
>>>>>>> 64208c719cf9dc882a71de28c01b60d597adb9b4
