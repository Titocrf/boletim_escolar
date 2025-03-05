<h1>Projeto de boletim escolar</h1>

<h2>Requisitos</h2>
<ul>
  <li>Docker</li>
</ul>

<h2>Especificação</h2>
<ul>
  <li>PHP 7.4</li>
  <li>Codeigniter 3</li>
  <li>PostgreSQL 13</li>
</ul>

<h2>Instalação</h2>
<ol>
  <li>Rode o comando para instalar e rodar os containers:
    <pre class="command">docker compose up -d --build</pre>
  </li>
  <li>Para gerar os dados, acesse:
    <pre class="command">http://localhost:7700/seeder</pre>
  </li>
  <li>Para acessar o relatório:
    <pre class="command">http://localhost:7700/boletim/gerar_pdf/1</pre>
  </li>
  <li>Rode o comando para parar:
    <pre class="command">docker compose stop</pre>
  </li>
</ol>

<h2>Licença</h2>
<p>Este projeto foi feito por Thiago Dionisio.</p>

</body>
</html>
