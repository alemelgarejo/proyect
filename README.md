<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Aplicación web para gestión inmobiliaria - Alejandro Melgarejo Curbelo
- Inmodata
Índice:
1. Introducción.
2. Análisis de requerimientos.
3. Tiempo empleado.
4. ¿Es factible?
5. Diseño.
6. Implementación.
7. Validación y pruebas.
8. Actualizaciones.
9. Mantenimiento.


1. Introducción.

 Antes de nada, quisiera dar las gracias a todos los profesores que han formado parte de mi formación tanto el primer año cómo el segundo, por dedicar su tiempo y ganas. Me llamo Alejandro Melgarejo Curbelo, nací el 27 de mayo de 1996 y vivo en Arrecife. Me dedico a desarrollar aplicaciones web desde hace poco. En este documento se establecerá la documentación de un proyecto web llamado, Inmodata. Se trata de una aplicación web para gestionar o ayudar a la gestión de una empresa inmobiliaria. He decidido llevar a cabo la realización de este proyecto debido a que un familiar trabaja en el sector inmobiliario y puede ser de mucha utilidad a la hora de desarrollar la aplicación web.


2. Requerimientos.

Se requiere de un sistema que gestione una empresa local dedicada a la gestión
Inmobiliaria.

En esta aplicación web, se pide, poder introducir información sobre los siguientes
conceptos inmobiliarios; usuario, cliente, propietario para así poder gestionar las
diferentes posibilidades que tiene como vender, arrendar o traspasar un negocio o local, y si estuviera interesado en adquirir pues, poder gestionar si es un comprador o un arrendatario.
Para ello también se debe poder guardar la información sobre las propiedades a
gestionar y sus propietarios..
Por otro lado también se pide añadir un apartado donde añadir, ver y editar las
órdenes de los interesados, con esto nos referimos, por ejemplo, si quiere alquilar o comprar, que precio está dispuesto a pagar, dónde prefiere la ubicación, ….

Para llevar a cabo la demanda de la empresa local debemos diseñar un sistema en el que se puedan registrar usuarios con diferentes permisos y con contenido
individual, teniendo acceso cada uno solo a sus clientes viendo que tipo de cliente son y los datos almacenados.

Se debe también poder acceder también a un apartado con la información sobre las propiedades añadidas en el sistema viendo también toda su información y además un apartado para poder gestionar sus imágenes de cara al público.  

Por último, es muy importante que haya otra sección de órdenes de los clientes interesados dónde almacenar todos los parámetros para poder dar al cliente las mejores posibilidades en cuanto a la elección de una propiedad.


3. Tiempo empleado. 

El tiempo estimado para este trabajo será el siguiente: 
● Unas 20 horas para el diseño. 
● Unas 60 horas para la implementación. 
● 10 horas para la validación y las pruebas. 
● Un total de 90 horas a las que habrá que sumarle el mantenimiento.





4. ¿Es factible?

Después de muchas horas de desarrollo del proyecto, he podido llegar a la conclusión de que es una tarea bastante factible por diversos motivos:
● La lógica para las funcionalidades principales de la aplicación no es muy compleja.
● Tengo referencias en el sector inmobiliario para poder saber qué podría hacer falta y que no en la aplicación.


5. Diseño.

Para desarrollar la aplicación lo haré de forma local, para poder modificar cosas constantemente sin dificultades y sin poner en riesgo el sistema. Pero la aplicación estará disponible en la siguiente dirección:
https://inmo.amwebdev.eu/

Para la base de datos, en este caso, utilizaré mysql, y para acceder a ella, phpmyadmin, haciendo uso del lenguaje php en su versión 7.4.

El sistema estará dividido en tres partes, correspondientes a los roles de los usuarios, que serán el de administrador, el de usuario regular, que corresponde al agente que trabaje en la inmobiliaria, y por último, el rol de usuario visitante, se hará uso de él a la hora de que una persona ajena a la empresa, a través de la web, pueda ver las propiedades disponibles y disponer de una contacto directo.

Para ello, el diseño de la base de datos será el expuesto a continuación:
Lo primero, es establecer el esquema conceptual de la base de datos del sistema, después de ellos, veremos tabla a tabla los parámetros que se almacenarán en ellas.

Esquema lógico Inmodata

● Tabla roles, almacenaremos el tipo de permisos para los usuarios, es decir, si puede editar el todo el contenido del sistema, si pueden editar su propio contenido o si sólo pueden observar los contenidos.. Tendrá la siguiente estructura:



● Tabla users, donde almacenaremos información diversa sobre los trabajadores de la inmobiliaria y de los visitantes, tanto del gestor de ésta como del resto de personal y usuarios ajenos a la empresa. Tendrá la siguiente estructura: 














● Tabla customers, donde almacenaremos la información más directa sobre los clientes, para poder hacer contacto de forma fácil. Destacar que el nombre de clientes hace referencia a aquellas personas cuyo objetivo es adquirir una propiedad o alquilar. Un cliente puede tener un usuario, y un usuario puede tener muchos clientes.Tendrá la siguiente estructura. 



● Tabla owners, destacar en este punto, que también son clientes pero en este caso, son las personas que buscan vender, traspasar o poner en alquiler sus propiedades para sacar un beneficio. Un propietario puede tener un usuario, y un usuario puede tener muchos propietarios. Esta tendrá la siguiente estructura:




● Tabla estates, en esta tabla almacenaremos la información sobre las propiedades disponibles para su venta, alquiler o traspaso. Un propietario puede tener muchas propiedades mientras que una propiedad solo puede tener un propietario. Esta tendrá la siguiente estructura:






● Tabla orders, aquí se guardarán las preferencias en los parámetros de las propiedades de los clientes interesados en adquirir una propiedad o alquilarla. Tendrá la siguiente estructura:




El código para crear la base de datos mostrada será el siguiente, en caso de necesitarlo: 
Estructura de tabla para la tabla `customers`

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dni` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

Estructura de tabla para la tabla `estates`


CREATE TABLE `estates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `published` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `built_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baths` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wardrobe` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `lobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lobbies_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `separate_dining_room` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `dining_room_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_kitchen` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `kitchen_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terraces` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terraces_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balcony` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `balcony_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courtyard` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `courtyard_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courtyard_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ceiling_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garage` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `garage_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_room` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `storage_room_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basement` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `basement_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heating` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `heating_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `air_conditioning` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `air_conditioning_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pool` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `elevator` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `urbanization` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `garden` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `garden_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_date` date DEFAULT NULL,
  `conservation_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_maps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estate_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estate_image_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




 Estructura de tabla para la tabla `images`

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estate_id` int(10) UNSIGNED DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlWeb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `to_user_id` int(10) UNSIGNED DEFAULT NULL,
  `estate_id` int(10) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readed` enum('no','yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


Estructura de tabla para la tabla `orders`

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estate_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_surface` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_rooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_rooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `elevator` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `garage` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `terraces` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `courtyard` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `heating` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `air_conditioning` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `garden` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `pool` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conservation_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `need_loan` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `observations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


Estructura de tabla para la tabla `owners`

CREATE TABLE `owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dni` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `observations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

Estructura de tabla para la tabla `roles`

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;






Volcado de datos para la tabla `roles`

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2021-05-05 12:45:34', '2021-05-05 12:45:34'),
(2, 'Admin', '2021-05-05 12:45:34', '2021-05-05 12:45:34'),
(3, 'Normal', '2021-05-05 12:45:34', '2021-05-05 12:45:34'),
(4, 'Visitante', '2021-05-05 12:45:34', '2021-05-05 12:45:34');

Estructura de tabla para la tabla `users`

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comertial` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribble_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


Índices de la tabla `customers`

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

Índices de la tabla `estates`

ALTER TABLE `estates`
  ADD PRIMARY KEY (`id`);

Índices de la tabla `images`

ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

Índices de la tabla `messages`

ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

Índices de la tabla `orders`

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

Índices de la tabla `owners`

ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `owners_email_unique` (`email`);




Índices de la tabla `roles`

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

Índices de la tabla `users`

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

AUTO_INCREMENT de la tabla `customers`

ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

AUTO_INCREMENT de la tabla `estates`

ALTER TABLE `estates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

AUTO_INCREMENT de la tabla `failed_jobs`

ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

AUTO_INCREMENT de la tabla `images`

ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;



AUTO_INCREMENT de la tabla `messages`

ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

AUTO_INCREMENT de la tabla `orders`

ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

AUTO_INCREMENT de la tabla `owners`

ALTER TABLE `owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

AUTO_INCREMENT de la tabla `roles`

ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

AUTO_INCREMENT de la tabla `users`

ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

Por último en este apartado, se especificará el precio de la aplicación. Se trata de un pago fijo, dónde el cliente al pagar, será dueño del código. Este pago lleva incluido 3 meses de mantenimiento gratis junto al precio. El precio final de la aplicación será de 400€ en un pago al que habrá que sumarle cada año 50€ para pagar el dominio mientras la aplicación esté en funcionamiento. 
6. Implementación. 

A nivel de backend, haré uso de un framework, que en este caso será Laravel en su versión 8, Laravel es un popular framework de PHP. Permite el desarrollo de aplicaciones web totalmente personalizadas y de una gran calidad. Es uno de los frameworks más utilizados y de mayor comunidad en el mundo de Internet. 

Para la gestión de los usuarios y los perfiles de los usuarios, se usará Laravel UI Laravel UI is a very simple authentication scaffolding built on the Bootstrap CSS framework.

A nivel estético utilizaré en mayor parte, un panel de administración llamado NOW UI, que es un panel de administración de Bootstrap 4, con un backend integrado de Laravel proporcionado por UPDIVISION . Es de uso gratuito, al menos los elementos que estoy utilizando.

La aplicación, cómo se menciona anteriormente estará dividida en tres partes: 
● Una para el usuario visitante, donde cualquier persona, registrándose, podrá ver las diferentes propiedades disponibles en la empresa y ponerse en contacto con integrantes de esta misma. 
● Usuario normal, es cualquier persona que trabaje gestionando clientes y propiedades en la empresa, tendrá acceso a crear y editar su propio contenido pero nunca a eliminarlo. No podrá acceder a la parte del administrador. 
● Usuario administrador, tendrá derechos para acceder a cualquier parte del sistema. También podrá crear, editar y eliminar cualquier contenido de cualquier persona en la empresa a excepción del superadministrador. 
● Usuario super administrador, tendrá derechos para acceder a cualquier parte del sistema y editar cualquier contenido del sistema, este rol está reservado para el mantenimiento de la aplicación.

7. Validación y pruebas. 

En primera instancia, y antes de presentarlo al cliente, para la validación y pruebas usaremos unos test que proporciona Laravel, estos revisan si hay algún fallo en el sistema nivel de código, pero no de lógica de programación. 

También se realizarán pruebas, forzando al sistema a activar los posibles fallos que pudieran quedar en el sistema para así solucionarlos, esto se hará añadiendo información al sistema de todas las formas posibles, introduciendo caracteres raros o tipos de valores no permitidos en cada una de las entradas de información al sistema, eso se hará de la siguiente forma: 
● Verificando que los módulos del sistema estén libres de errores. 
● Probar que todos los caminos lógicos principales deben ejecutarse correctamente en cada módulo de la aplicación. 
● Procesar todos los tipos de registro de entrada válidos. 
● Procesar correctamente todos los tipos de registro de entrada inválidos. ● Verificar las excepciones que pueden surgir durante el normal funcionamiento de la aplicación.
● Procesar todas las salidas válidas. 

Habiendo corroborado que la aplicación funciona perfectamente, realizaremos pruebas junto con el cliente para que el pueda determinar si desea la aplicación o no, para ello utilizaremos datos reales en caso de que el cliente quiera, o en caso contrario, datos ficticios que se tendrán preparados de antemano. 

Recalcar que a la hora de arrancar la aplicación estaré disponible sin ningún tipo de problema.

9. Actualizaciones. 

Para seguir mejorando la aplicación, en un futuro tengo pensado implementar un sistema de agenda para la aplicación, donde cada usuario puede organizar y dejar constancia de sus acciones con respecto a los clientes, propietarios o propiedades. 

Por otro lado, también me planteo la posibilidad de que, desde un apartado de la aplicación, puedas subir directamente las propiedades a páginas como: 
● idealista.com 
● pisos.com 
● fotocasa.es 

10. Mantenimiento.

En este caso, el mantenimiento se llevará de la siguiente forma. La empresa inmobiliaria puede en cualquier momento contactar con nosotros e indicarnos si hay algún inconveniente o si hay algún tipo de mejora que implementar en el sistema. Estaré disponible para ellos a cualquier hora en la que ellos estén disponibles para llevar a cabo dicho mantenimiento de la aplicación. 

Por otro lado, el sistema hará copias de seguridad cada día a la misma hora, para así poder conservar, en caso de fallo, el estado de la aplicación y la mayor parte de la información posible, esto se llevará cabo mediante un paquete de laravel llamado spatie/laravel-backup. 

A parte de la posibilidad de que la empresa nos contacte debido a un fallo en el sistema, se hará un seguimiento de unas dos horas semanales para confirmar que la aplicación siga en pleno funcionamiento y no perjudicar al cliente.

Después de los tres meses gratis de mantenimiento, se empezará a cobrar 10 euros por cada hora dedicada al mantenimiento de la aplicación, por lo que si fueran dos horas semanales, quedaría en un total de 20€ a la semana.


Alejandro Melgarejo Curbelo
23 de mayo de 2021 - 2º DAW - DPL






