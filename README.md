# INTRODUCCIÓN
En el contexto de una sociedad cada vez más consciente de la importancia de la sostenibilidad y la economía circular, surge la necesidad de desarrollar soluciones innovadoras que promuevan la reducción, el reciclaje y la reutilización de productos.La creación de "errre", tiene como objetivo principal una página web de compra/venta de artículos de segunda mano que busca revolucionar la forma en que las personas adquieren y desechan objetos.

"errre" se presenta como una plataforma digital que va más allá de las tradicionales páginas de comercio electrónico. Nuestra propuesta se destaca por la implementación de un sistema de puntos, donde cada artículo adquirido o vendido otorgará a los usuarios una determinada cantidad de puntos. Estos puntos acumulados podrán ser posteriormente canjeados por descuentos en futuras transacciones. De esta manera, no solo incentivamos la compra de productos usados, sino que también recompensamos a nuestros usuarios por su compromiso con la sostenibilidad y la economía circular.

El objetivo principal de "errre" es crear una comunidad comprometida con los valores de reducir, reciclar y reutilizar. Nuestra plataforma ofrecerá una experiencia intuitiva y atractiva, donde los usuarios podrán explorar una amplia variedad de categorías de productos de segunda mano, desde moda y hogar hasta tecnología y ocio. Asimismo, fomentaremos la educación y concienciación sobre la importancia de prolongar la vida útil de los objetos y realizar compras más sostenibles.

El presente anteproyecto abordará tanto los aspectos técnicos como los funcionales de "errre". Se realizará un análisis de los requisitos, se diseñará una base de datos para almacenar la información, y se implementará una interfaz de usuario atractiva y fácil de usar.

En conclusión, "errre" se posiciona como una alternativa innovadora en el mercado de compra/venta de artículos de segunda mano, brindando una plataforma única que premia la sostenibilidad y la participación activa de los usuarios. A través de la implementación de un sistema de puntos y descuentos, buscamos promover un estilo de vida más consciente y contribuir al desarrollo de una sociedad más sostenible y responsable con el medio ambiente.

# LÓGICA DE LA EMPRESA
- Como comprador: Cada vez que se obtenga un producto, se le asignarán los puntos que valga ese producto. Una vez tenga más de 0 puntos, éstos ya pueden ser utilizados para obtener descuentos en todos los productos de la web. Se obtendrán puntos siempre que no se utilicen puntos para la compra de un artículo, en caso de que se utilizen, el contador volverá a 0. Para evitar precios negativos, ponemos un mínimo de 5€ (si la resta del precio - el descuento del cliente es inferior a 5€, no se podrán utilizar los puntos).

- Como vendedor: Los puntos se asigarán según el peso del producto, para incentivar a la reutilización de los productos más dañinos para el medio ambiente. Si el peso del producto se encuentra entre los 0-2kg, se le asignarán de 1 a 2 puntos. Si el peso está entre los 3-5kg, se le asignarán de 3-5 puntos. Si el peso es inferior a 10 kg se le asignarán a su producto entre 6-8 puntos, y, si el peso supera los 10kg, se le asignarán de 9-10 puntos. Cada vez que venda un producto se le asignarán los atribuidos a éste. Un vendedor no verá en el listado de productos recientes su producto, ni tampoco si filtra por categorías, pero sí lo verá en el listado de todos los productos. 

- Como administrador: También se puede entrar con el rol de **administrador** (email: admin@errreshop.com y pssw: 123456789). En el cual podrá acceder a la sección de mi perfil y ver una lista con todas las transacciones y ordenarlas por precio ascendente, y, un listado con todos los usuarios y poder eliminarlos. 

- Como usuarios: Cada usuario podrá editar y eliminar sus propios productos según desee, pero no podrá eliminar porductos de otro usuario. Tiene una sección de **Mi perfil** dónde puede ver sus productos disponibles, los comprados y los vendidos. También, puede compartir el producto en diversas redes sociales cuando lo está visualizando, para así poder compartirlo.   

# DESCRIPCIÓN TÉCNICA
La arquitectura de tres capas es un estilo de programación, cuyo objetivo primordial es la separación de la capa de presentación, la capa de negocio y la capa de datos.

- En la capa de presentación (frontend), se encarga de la interfaz de usuario, la presentación de datos y la interacción con el usuario. Aquí se desarrollan las páginas web, la lógica de presentación y los componentes visuales. Se desarrollará con Blade, el motor de plantillas de laravel. Para los estilos, se usará SCSS que será compilado a CSS, y JS, para añadir diversas funcionalidades a la web. También se ha acabado utilizando JQuery para diversas funcionalidades.

- En la capa de lógica de negocio (backend), es la capa que contiene la lógica de negocio de la aplicación. Aquí se procesan las solicitudes del usuario, se realizan las operaciones de validación, cálculos y manipulación de datos. Se usará laravel ya que es un framework que para realizar proyectos en poco tiempo está muy bien, tiene una muy buena documentación y gracias a Eloquent ORM tiene una ágil conexión a la base de datos.

- Y, en la capa de acceso a datos (base de datos), esta capa se ocupa de interactuar con la base de datos, almacenar y recuperar datos. Aquí se definen las tablas, se realizan las consultas y se gestionan las transacciones. Se usará una base de datos postgreSQL ya que tiene buen soporte para Eloquent, y debido a que ya tengo un entorno de pruebas hecho con postgreSQL.

![Diagrama de componentes](/public/img/md/diagrama-de-componentes.png)

# METODOLOGÍA DE DESARROLLO

Se ha seguido la metodología de desarrollo **Prototipado**. Se creó un producto mínimo viable y a partir de éste, se ha ido mejorando y mejorando el producto.

# CLOCKIFY

Este es un diagrama aproximado del timepo que se ha invertido en el proyecto. 

![Diagrama de tiempo](/public/img/md/Clockify_Time_Report_Summary_01_05_2023-11_06_2023.pdf)

Como se esperaba, en la parte dónde más tiempo se ha invertido es en el frontend y en el backend.

# CONCLUSIONES Y POSIBLES MEJORAS

Las principales mejoras que tenemos en mente son:
- La creación de un chat, para que los usuarios puedan hablar entre ellos y negociar los precios, haría que la web fuese mucho más interactiva.
- Crear diversos tipos de planes ('premium', 'standard', etc) para aquellos usuarios que más consuman la web y así fidelizarlos.

Para concluir, el proyecto ha sido una oportunidad para aprender y mejorar en laravel, ya no sólo en los fundamentos básicos, sino en poder desarrollar una api resolutiva y de cierta complejidad. Gracias a este proyecto, se ha obtenido experiencia en la construcción de una aplicación escalable y segura.

