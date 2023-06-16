# DESPLEGADA

errreshop.randion.es

# INTRODUCCIÓN
En el contexto de una sociedad cada vez más consciente de la importancia de la sostenibilidad y la economía circular, surge la necesidad de desarrollar soluciones innovadoras que promuevan la reducción, el reciclaje y la reutilización de productos.La creación de "errre", tiene como objetivo principal una página web de compra/venta de artículos de segunda mano que busca revolucionar la forma en que las personas adquieren y desechan objetos.

"errre" se presenta como una plataforma digital que va más allá de las tradicionales páginas de comercio electrónico. Nuestra propuesta se destaca por la implementación de un sistema de puntos, donde cada artículo adquirido o vendido otorgará a los usuarios una determinada cantidad de puntos. Estos puntos acumulados podrán ser posteriormente canjeados por descuentos en futuras transacciones. De esta manera, no solo incentivamos la compra de productos usados, sino que también recompensamos a nuestros usuarios por su compromiso con la sostenibilidad y la economía circular.

El objetivo principal de "errre" es crear una comunidad comprometida con los valores de reducir, reciclar y reutilizar. Nuestra plataforma ofrecerá una experiencia intuitiva y atractiva, donde los usuarios podrán explorar una amplia variedad de categorías de productos de segunda mano, desde moda y hogar hasta tecnología y ocio. Asimismo, fomentaremos la educación y concienciación sobre la importancia de prolongar la vida útil de los objetos y realizar compras más sostenibles.

El presente anteproyecto abordará tanto los aspectos técnicos como los funcionales de "errre". Se realizará un análisis de los requisitos, se diseñará una base de datos para almacenar la información, y se implementará una interfaz de usuario atractiva y fácil de usar.

En conclusión, "errre" se posiciona como una alternativa innovadora en el mercado de compra/venta de artículos de segunda mano, brindando una plataforma única que premia la sostenibilidad y la participación activa de los usuarios. A través de la implementación de un sistema de puntos y descuentos, buscamos promover un estilo de vida más consciente y contribuir al desarrollo de una sociedad más sostenible y responsable con el medio ambiente.

# OBJETIVOS PARA EL COMPRADOR

OBJETIVOS PARA EL COMPRADOR
El proyecto "errre" tiene como objetivo principal desarrollar una página web de compra/venta de artículos de segunda mano con un sistema de puntos y descuentos, con el fin de promover la sostenibilidad y la economía circular. A continuación, se detallan los objetivos específicos que se persiguen:

1. Implementar un sistema de puntos y descuentos: Diseñar e implementar un sistema de puntos que recompense a los usuarios por la compra y venta de artículos en la plataforma. Establecer un mecanismo para que los usuarios puedan canjear sus puntos acumulados por descuentos en futuras transacciones.
2. Crear una interfaz intuitiva y atractiva: Desarrollar una interfaz de usuario que sea fácil de navegar y que proporcione una experiencia agradable a los usuarios. Garantizar una presentación clara de los productos, categorías y funcionalidades, facilitando así la búsqueda y compra de artículos de segunda mano.
3. Fomentar la sostenibilidad y la economía circular: Promover la adquisición de artículos de segunda mano como alternativa sostenible a la compra de productos nuevos. Educar y concienciar a los usuarios sobre la importancia de reducir, reciclar y reutilizar, proporcionando información relevante y consejos prácticos en la plataforma.
4. Privacidad y seguridad: Cada usuario deberá tener un nombre de usuario y una contraseña que servirá para identificarse.
5. Identificar posibles mejoras y expansiones futuras: Evaluar continuamente la plataforma para identificar áreas de mejora y posibles expansiones. Estar atentos a las necesidades y sugerencias de los usuarios, y considerar la incorporación de nuevas funcionalidades.


# LÓGICA DE LA EMPRESA
- Como comprador: Cada vez que se obtenga un producto, se le asignarán los puntos que valga ese producto. Una vez tenga más de 0 puntos, éstos ya pueden ser utilizados para obtener descuentos en todos los productos de la web. Se obtendrán puntos siempre que no se utilicen para la compra de un nuevo artículo, en caso de que se utilizen, el contador volverá a 0. Para evitar precios negativos, ponemos un mínimo de 5€ (si la resta del precio - el descuento del cliente es inferior a 5€, no se podrán utilizar los puntos).

- Como vendedor: Los puntos se asigarán según el peso del producto, para incentivar a la reutilización de los productos más dañinos para el medio ambiente. Si el peso del producto se encuentra entre los 0-2kg, se le asignarán de 1 a 2 puntos. Si el peso está entre los 3-5kg, se le asignarán de 3-5 puntos. Si el peso es inferior a 10 kg se le asignarán a su producto entre 6-8 puntos, y, si el peso supera los 10kg, se le asignarán de 9-10 puntos. Cada vez que venda un producto se le asignarán los atribuidos a éste. Un vendedor no verá en el listado de productos recientes su producto, ni tampoco si filtra por categorías, pero sí lo verá en el listado de todos los productos. 

- Como administrador: También se puede entrar con el rol de **administrador** (email: admin@errreshop.com y pssw: 123456789). En el cual podrá acceder a la sección de mi perfil y ver un listado con todas las transacciones y ordenarlas por precio descendente, y, un listado con todos los usuarios y poder eliminarlos. 

- Como usuarios (general): Cada usuario podrá editar y eliminar sus propios productos según desee, pero no podrá eliminar porductos de otro usuario. Tiene una sección de **Mi perfil** (donde pone su nombre) dónde puede ver sus productos disponibles, los comprados y los vendidos, dónde verá el nombre de la persona que ha vendido/comprado el porducto. También, puede compartir el producto en diversas redes sociales cuando lo está visualizando.   

# CASOS DE USO

- Registro de usuario: Tener el control de los usuarios que hacen log in, pidiéndoles usuario y contraseña para que puedan acceder al total de las funcionalidades de la web.
- Sistema de puntos: Cada transacción exitosa (tanto venta como compra) hará que aumente el número de puntos de los usuarios. 
- Canjear los puntos: El usuario podrá canjear los puntos acumulados para obtener descuentos en productos.
- Venta/Compra de artículos: Los usuarios podrán comprar y vender artículos de una forma sencilla, recibiendo sus puntos.
- Publicar, eliminar y editar artículos: Los usuarios podrán publicar, eliminar y editar artículos de una forma sencilla debido a una interfaz intuitiva.

# DESCRIPCIÓN TÉCNICA
La arquitectura de tres capas es un estilo de programación, cuyo objetivo primordial es la separación de la capa de presentación, la capa de negocio y la capa de datos.

- En la capa de presentación (frontend), se encarga de la interfaz de usuario, la presentación de datos y la interacción con el usuario. Aquí se desarrollan las páginas web, la lógica de presentación y los componentes visuales. Se desarrollará con Blade, el motor de plantillas de laravel. Para los estilos, se usará SCSS que será compilado a CSS, y JS, para añadir diversas funcionalidades a la web. También se ha acabado utilizando JQuery para diversas funcionalidades.

- En la capa de lógica de negocio (backend), es la capa que contiene la lógica de negocio de la aplicación. Aquí se procesan las solicitudes del usuario, se realizan las operaciones de validación, cálculos y manipulación de datos. Se usará laravel ya que es un framework que para realizar proyectos en poco tiempo está muy bien, tiene una muy buena documentación y gracias a Eloquent ORM tiene una ágil conexión a la base de datos.

- Y, en la capa de acceso a datos (base de datos), esta capa se ocupa de interactuar con la base de datos, almacenar y recuperar datos. Aquí se definen las tablas, se realizan las consultas y se gestionan las transacciones. Se usará una base de datos postgreSQL ya que tiene buen soporte para Eloquent, y debido a que ya tengo un entorno de pruebas hecho con postgreSQL.

![Diagrama de componentes](/public/img/md/diagrama-de-componentes.png)


# PROCESO DE DESARROLLO
He elegido el proceso Unificado de Desarrollo de Software ya que con sus diversas fases se adapta muy bien a proyectos de mediana envergadura. Al no tener muy claras diversas cosas del proyecto, este método de desarrollo me permite poder ir avanzando y resolviendo las dudas conforme van saliendo, y gracias a sus varias fases, me permiten una mejor estructura para conseguir sacar el proyecto adelante.

Fases:

1. Inicio: En esta fase se identifican los objetivos del proyecto, se analizan los riesgos y se define una visión general del sistema a desarrollar.
2. Elaboración: En esta fase se realiza un análisis detallado de los requisitos, se definen las características clave del sistema y se elabora un plan detallado para el desarrollo.
3. Construcción: En esta fase se desarrolla el sistema de acuerdo con el plan establecido, se realizan pruebas unitarias y se integran los componentes desarrollados.
4. Transición: En esta fase se realiza la implementación del sistema en el entorno de producción, se llevan a cabo pruebas de aceptación y se proporciona soporte al usuario final.


# METODOLOGÍA DE DESARROLLO

 El desarrollo del proyecto ha seguido la metodología de desarrollo **Prototipado**, comenzando con un producto mínimo viable y mejorándolo continuamente en base a los comentarios y necesidades de los usuarios (compañeros de clase, del trabajo, familiares, etc). Este enfoque ha permitido construir un producto sólido y adaptado a las expectativas del mercado.
 
 # GITFLOW
 
 Al estar trabajando yo solo en el proyecto, trabajar directamente en **master** simplifica el flujo de trabajo y evita el tener que administrar múltiples ramas. Además de la agilidad que proporciona el no tener que estra cambiando de una rama a otra para decisiones que tengan relación con el proyecto. 

# CLOCKIFY

Este es un diagrama aproximado del timepo que se ha invertido en el proyecto. 

![Diagrama de tiempo](/public/img/md/clockify.pdf)

El tiempo invertido en el desarrollo del proyecto ha estado principalmente en el front y el back, debido a la importancia de estas áreas para lograr un producto completo y funcional. Sin embargo, también hay que tener en cuenta que se han dedicado esfuerzos en otras tareas relacionadas con la planificación, documentación y teesting para garantizar la calidad y el éxito del proyecto.

Como presupuesto, he 
# TESTS

![Casos test](/public/img/test.png)

# MEDIOS MATERIALES NECESARIOS

Los medios materiales utilizados para el proyecto son:

**HARDWARE**

Servidor: CPU 4 vcores, RAM 8gb, SSD 240gb
Conectividad de red: Conexión a internet estable

**SOFTWARE**

Sistema operativo: Windows 11 Version 22H2
Servidor web: Apache2 2.4.54
Base de datos: PostgreSQL 19.3
Versión de laravel: Laravel 10.9
Versión de sass: Sass 
Entorno de desarrollo: VS Code
Versión de VS Code: VS Code 1.78.2

**LICENCIAS**

https://opensource.org/license/mit/


# CONCLUSIONES Y POSIBLES MEJORAS

Las principales mejoras que tenemos en mente son:
- La creación de un chat, para que los usuarios puedan hablar entre ellos y negociar los precios, haría que la web fuese mucho más interactiva.

- Crear diversos tipos de planes ('premium', 'standard', etc) para aquellos usuarios que más consuman la web y así fidelizarlos.

Para concluir, el proyecto ha sido una oportunidad para aprender y mejorar en laravel, ya no sólo en los fundamentos básicos, sino en poder desarrollar una api resolutiva y de cierta complejidad. Gracias a este proyecto, se ha obtenido experiencia en la construcción de una aplicación escalable y segura.

# BIBLIOGRAFÍA

del Proceso Unificado, T. 6: F. de T. (s/f). INGENIERÍA DE SOFTWARE I. Grial.eu. Recuperado el 25 de mayo de 2023, de https://repositorio.grial.eu/bitstream/grial/1145/1/IS_I%20Tema%206%20-%20Flujos%20de%20trabajo%20del%20Proceso%20Unificado.pdf

GracoProject [@gracoproject4543]. (2020, abril 29). Diagrama de Gantt en Google Sheets. Youtube. https://www.youtube.com/watch?v=CU2NuXF517E

Ibero, J. (2021, octubre 28). Arquitectura Cliente/Servidor: modelo de 3 capas. IberAsync.es – Blog de tecnología en el mundo IT. https://iberasync.es/arquitectura-cliente-servidor-modelo-de-3-capas/

IONOS » E-mail, dominios y páginas web. (s/f). Ionos.es. Recuperado el 25 de mayo de 2023, de https://www.ionos.es/?ac=OM.WE.WEo41K356260T7073a&itc=TOIP6F1L--&utm_source=google&utm_medium=cpc&utm_campaign=SBT-ES-BRA-MIXX---IONOS---&utm_term=ionos&matchtype=e&utm_content=EX-Ionos&gad=1&gclid=CjwKCAjw36GjBhAkEiwAKwIWyfDdCKqQttN_oO5Xpvpqbqf6X3t5VAD7AEieje0E0A_J_4ZgqKrDXRoCof4QAvD_BwE&gclsrc=aw.ds

PUD (Proceso Unificado de Desarrollo) - Business-Control. (s/f). Google.com. Recuperado el 25 de mayo de 2023, de https://sites.google.com/site/businesscontrolesi/productos-software/metodologia-del-trabajo/pud

PUDS. (s/f). Isi2018. Recuperado el 25 de mayo de 2023, de https://diegodavidalmiron1.wixsite.com/isi2018/puds

¿Qué es la arquitectura de tres niveles? (s/f). Ibm.com. Recuperado el 25 de mayo de 2023, de https://www.ibm.com/es-es/topics/three-tier-architecture

VPS. (s/f). Ionos.es. Recuperado el 25 de mayo de 2023, de https://www.ionos.es/servidores/vps

Wikipedia contributors. (s/f-a). Proceso unificado. Wikipedia, The Free Encyclopedia. https://es.wikipedia.org/w/index.php?title=Proceso_unificado&oldid=146409957

Wikipedia contributors. (s/f-b). Programación por capas. Wikipedia, The Free Encyclopedia. https://es.wikipedia.org/w/index.php?title=Programaci%C3%B3n_por_capas&oldid=149121324


