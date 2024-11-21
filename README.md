Documentação do Sistema SIMPAC
1. Introdução
O NUPEX (Núcleo de Apoio à Pesquisa e Extensão da Univiçosa), responsável por gerenciar as avaliações realizadas no SIMPAC (Simpósio de Pesquisa e Extensão da Univiçosa), enfrentava desafios como a entrega eficiente de resultados e a gestão manual das avaliações. O projeto visa otimizar esses processos por meio de uma aplicação web que automatiza tarefas e organiza projetos por curso, resultando em maior agilidade e redução do trabalho repetitivo para os organizadores.

2. Tecnologias Utilizadas
Framework Backend: Laravel (PHP)
Banco de Dados: MySQL, gerenciado via PHPMyAdmin
Frontend: HTML, CSS (Tailwind CSS)
Arquitetura: MVC (Model-View-Controller)
O Laravel foi escolhido por sua robustez, flexibilidade e ecossistema rico, que inclui recursos nativos para autenticação, roteamento e gerenciamento de banco de dados. O Tailwind CSS facilita a criação de interfaces modernas e responsivas, com uma abordagem baseada em utilitários altamente customizável.

3. Funcionalidades Principais
3.1 Área Administrativa
Os administradores têm acesso a ferramentas de gerenciamento que incluem:

Gerenciamento de Avaliadores: Cadastro, edição e exclusão de avaliadores.
Gestão de Trabalhos: Criação, edição e exclusão de trabalhos submetidos.
Organização de Resumos: Edição e exclusão de resumos cadastrados no sistema.
Atribuição de Avaliadores: Seleção de avaliadores para os resumos submetidos.
3.2 Área do Avaliador
Os avaliadores acessam resumos atribuídos a eles e podem realizar avaliações diretamente no sistema:

Visualização de Resumos: Informações detalhadas, como curso e protocolo.
Avaliação de Resumos: Inserção e modificação de notas conforme os critérios estabelecidos.
3.3 Resultados
A funcionalidade de resultados permite a consulta e exibição pública dos trabalhos aprovados:

Resultados de Pôster e Apresentação Oral: Trabalhos selecionados para apresentações.
Resumos Aprovados: Disponibilizados para consulta via link externo.
3.4 Login e Autenticação
Sistema de autenticação robusto, com controle de acesso às áreas administrativas e de avaliadores, garantindo a segurança dos dados.

4. Módulos do Sistema
4.1 Página Inicial
Página de boas-vindas com acesso às áreas "Admin", "Avaliador", "Resultados" e "Resumos Aprovados".

4.2 Gerenciamento de Avaliadores
Módulo que permite aos administradores gerenciar avaliadores para a avaliação dos resumos submetidos.

4.3 Cadastro e Edição de Trabalhos
Permite aos administradores cadastrar, editar ou excluir trabalhos, incluindo informações detalhadas como curso e resumo.

4.4 Avaliação de Resumos
Avaliadores podem visualizar resumos atribuídos e atribuir notas conforme os critérios definidos.

4.5 Exibição de Resultados
Resultados das avaliações são organizados e exibidos para consulta pública ou privada, dependendo das permissões de acesso.

5. Fluxo de Trabalho
5.1 Login e Acesso
Os usuários se autenticam no sistema e são redirecionados para suas respectivas áreas (Administrador ou Avaliador).

5.2 Avaliação de Resumos
Avaliadores acessam a lista de resumos atribuídos e preenchem as notas seguindo os critérios estabelecidos.

5.3 Gerenciamento pelo Administrador
Os administradores organizam resumos e avaliadores, com opções para criar, editar e excluir registros.

5.4 Divulgação de Resultados
Os resultados são processados e disponibilizados para os participantes ou público, conforme configurações do sistema.

6. Requisitos Funcionais
Cadastro e gerenciamento de usuários (administradores e avaliadores).
Sistema de autenticação para controle de acesso.
Organização e gestão de resumos e trabalhos submetidos.
Inserção e modificação de notas pelos avaliadores.
Exibição de resultados em diferentes formatos.

8. Considerações Finais
O sistema desenvolvido com Laravel e Tailwind CSS traz eficiência e praticidade ao processo de avaliação no SIMPAC. Ele automatiza tarefas repetitivas, melhora a organização das avaliações e oferece uma interface moderna, responsiva e intuitiva para usuários administrativos e avaliadores.

