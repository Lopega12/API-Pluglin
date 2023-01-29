Para el desarollo de la solucion a esta prueba tecnica, he utilziado el framework Laravel en su version 9, por lo que Php 8.1 y MariaDB/MySQL instalados, ya que me resultaba mas sencillo, rapido y compacto, ademas de que me sentía mas comodo.
Me he apoyado en la libreria laravel-translation para hacer la relacion de contenidos con sus traducciones de una manera mas fácil.

Me ha dado tiempo a hacer los dos endpoints pedidos y el cliente API, lo que no he podido hacer son pruebas automatizadas.

Para hacer el cliente API he utilizado las clases Seeder puesto que su unica funcionalidad es rellenar las tablas

En cuanto a las entidades y relaciones(Si no se ve la imagen es el fichero modelo ER.png):
![[modelo ER.png]]

He utilizado tres tablas:
- categories: Almaceno las categorias
- contents: Donde almaceno el contenido sin las traducciones al igual que el idioma origen
- contents_translations: Almaceno las traducciones de los contenidos junto con su idioma.
El resto de tablas son las que genera automaticamente Laravel.

No he guardado los idiomas que me poneis en el endpoint /config, puesto que en la propia tabla contents_tranlsations ya guardo el idioma y su traduccion
y para no estar guardando constantemente en un tabla langs cada idioma nuevo y hacer una relacion extra solo para guardar esa informacion.

Si que he considerado guardar el idioma original del contenido para informacion adicional, que posteriormente puede ser util para mostrar en un panel por ejemplo.

Los endpoints no llevan autenticación (aunque lo normal es que esten protegidos minimo con el middelware de autenticacion api), ya que no me interesaba estar lidiando con tener un token de usuario autenticado y que esto es meramente una prueba y no tiene que salir del entorno local.

Respecto a los endpoints:
- http://pluglin.test/api/contents/id?language=pt
Para obtener un contenido en un idioma concreto.
- http://pluglin.test/api/categories/6/contents?languague=pt
 Obtener los contenidos de una categoría en un idioma concreto,este endpoint devuelve ademas informacion sobre la categoria(lo consideré util).
Estos endpoints tienen validador, por lo que devolverán el codigo de estado 422 si languague no esta relleno/presente.

Respecto a las clases seeder
- ContentSeeder.php
- CategoriesSeeder.php
Esto sería el cliente API pedido, solo que en vez de ponerlo dentro de endpoints en mi aplicacion lo he hecho mediante seeds, se puede tener como un comando personalizado o tenerlo en algun controlador API/Web (que ahora mismo se me ocurra),pero como solo se especifica que es para rellenar los datos de las tablas pues lo deje de esta manera.

Dejo una coleccion y enviroment correspondiente para Postman o la plataforma API que utilizes en el directorio Docs/Postman.

