# Desafio Técnico FullStack Jr.

## Visão Geral

Este desafio foi projetado para avaliar habilidades técnicas, criativas, e de resolução de problemas em candidatos à posição de desenvolvedor(a) FullStack Jr. O desafio envolve a configuração de um ambiente de desenvolvimento usando Docker, PHP (com Laravel), Vuetify e MySQL, a correção de migrations incorretas, implementação de autenticação, e ajustes visuais e de funcionalidade em um sistema de gerenciamento de produtos.

## Tecnologias Utilizadas

- **Docker**
- **PHP 8.3** com **Laravel 11**
- **Vuetify 3**
- **MySQL**

## Estrutura do Repositório

- `/README.md`: Este documento.
- `/vuetify3/README.md`: Instruções para configurar e executar o frontend.
- `/php83-laravel11/README.md`: Instruções para configurar e executar o backend.

## Desafios

### 1. Configuração do Ambiente

- Você deverá inicializar o ambiente utilizando Docker, configurando as imagens necessárias para o PHP, MySQL e quaisquer outros serviços necessários.
- Atente-se às migrations do Laravel no diretório `/php83-laravel11`, pois há erros propositais que deverão ser identificados e corrigidos para que o backend funcione corretamente.

### 2. Autenticação

- Implemente uma camada de autenticação para proteger os endpoints do backend. Todos os CRUDs das tabelas `produtos` e `produtos_categorias` devem exigir autenticação.
- Desenvolva a tela de login de acordo com sua criatividade, priorizando uma boa experiência visual.

### 3. Ajustes e Funcionalidades

- Corrija um bug visual que desconfigura o logo quando visualizado em dispositivos móveis.
- Implemente a funcionalidade de deleção para as tabelas de produtos e categorias de produtos, considerando uma dupla confirmação (double check) por questões de segurança.

## Entrega do Projeto

- Seu projeto deve ser entregue através de um repositório Git, com acesso pré-configurado para avaliação.
- Certifique-se de incluir instruções detalhadas sobre como configurar e executar seu projeto, tanto para o frontend quanto para o backend.
- A documentação é uma parte crucial do desenvolvimento de software. Garanta que seu código esteja bem comentado e que o README detalhe todas as etapas necessárias para a avaliação do seu trabalho.

## Critérios de Avaliação

- **Correção técnica**: Funcionamento conforme especificado.
- **Criatividade e UX/UI**: Qualidade visual e da experiência do usuário na tela de login e ajustes visuais.
- **Segurança**: Implementação correta de autenticação e segurança na deleção de itens.
- **Código e documentação**: Clareza, qualidade do código e documentação.

Boa sorte em seu desafio! Estamos ansiosos para ver sua solução criativa e técnica.
