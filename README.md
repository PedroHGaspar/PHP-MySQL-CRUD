# Teste XNEO

Fiz um CRUD 100% funcional com um front-end bem simples com um fundo verde(minha cor preferida).

Temos uma organização simples de arquivos:

1º: criptografia/conexao.php OU index.php OU login.php OU logout.php - nessa pasta temos os 4 arquivos
que fazem a conexao com o crud, mostra a pagina de cadastro do usuario, mostra a página de login e 
a página de logout(que atualmente só da um explode)

2º: Information About Tables/arquivosHTML: aqui eu só fiz algumas anotações sobre SQL pra estudo
e pra fixar melhor sobre os comandos. Estou acostumado já mas é sempre bom anotar e ter algo rápido
para pesquisar se precisar.

3º: Project/cadastrar_cliente.php: aqui está o arquivo de cadastrar novos clientes na lista.

4º: Project/clientes.php: aqui temos a lista de clientes em si, com todos os clientes cadastrados.
Podemos EDITAR ou DELETAR os clientes nessa página.

5º: Project/conexao.php: aqui temos um arquivo para conexao com o db.

6º: Project/crud_clientes.sql: aqui temos o código da tabela no sql para criação do db. 

7º: Project/deletar_cliente.php: aqui temos o arquivo para deletar o cliente. O usuário é levado
para uma outra página que é para ele ver os dados do cliente e perguntar se realmente quer deletar.

8º: Project/editar_cliente.php: aqui temos a parte de editar os clientes. Uma página onde traz
todos os dados do cliente que o usuário clicar na lista(clientes.php), e ele poderá editar os dados.

9º: Project/pagina_inicial.php: aqui temos uma coisa que eu fiz a mais: a página inicial. É simplesmente
dois botões: Adicionar um novo cliente ao sistema e Ver todos os clientes cadastrados no sistema.

CONSIDERAÇÕES FINAIS: Agradeço a oportunidade de fazer esse teste, e foi bem divertido! Acho PHP e MySQL
mais simples do que React avançado e Node.js, então eu estava com saudades de trabalhar com essas tecnologias!

Tomei a liberdade de adicionar 3 coisas a mais: Login, Admin/User e envio automático de e-mail.

Levei cerca de 10 horas para fazer tudo, desde a primeira linha de código até esse documento em texto que estou escrevendo.

Peço que ignorem a parte do Front End pois fiz algo bem simples, eu foquei na funcionalidade, e não fiz botões custom ou componentes custom,
pois creio que a funcionalidade é o principal... Mas me vejo na obrigação de pedir para não reparar no Front End, já que sou um Dev Front End hahahaha.

