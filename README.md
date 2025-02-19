![Screenshot](https://github.com/Buildbox-ItSolutions/wordpress-developer-challenge/blob/main/wp-content/themes/desafio-wp/screenshot.png?raw=true)

# Tema Wordpress

**Tema WordPress construído do zero**. Foi utilizando conhecimentos avançados em desenvolvimento com WordPress, e de habilidades com front-end.

## Descrição do tema

Plataforma fictícia de vídeos chamada “Play”.
Front-end e back-end com fidelidade ao design e responsivo.

-  **Home**: contendo o último vídeo publicado em destaque; e carrosséis horizontais para cada termo na taxonomia criada.
-  **Arquivo**: página de arquivo da taxonomia, que exibe todos os vídeos na mesma.
-  **Single**: página de detalhe de um vídeo e embed do YouTube.

### Diferenciais

-  Custom post type para os vídeos, registrado como `video`;
-  Taxonomia customizada para segmentar os vídeos (`video_type`) em 3 diferentes termos: Filmes, Documentários e Séries;
-  Todo o conteúdo é carregado dinamicamente, como Título, Imagem de Capa, Descrição, Tempo de Duração, Sinopse e Embed de Vídeo.
   -  Todas essas informações são editáveis na edição do post do vídeo no painel administrativo;
   -  Tempo de Duração: número (registrado como `bx_play_video_duration`)
   -  Embed de Vídeo: URL do YouTube (registrado como `bx_play_video_ID`).
-  Uso de SASS.
