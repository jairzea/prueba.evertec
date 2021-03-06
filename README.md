# prueba.evertec
## Backend Tienda en linea prueba EVERTEC.

### CONFIGURAR PROYECTO LOCAL
>Creacion de dominio virtual
>>Si esta usando XAMPP como servidor APACHE Dirijase a la carpeta: 
>>>xampp/apache/conf/extra y modifique el archivo httpd-vhosts.conf de la siguiente manera:
```HTML
    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/prueba.evertec/public"
        ServerName (nombre_dominio_virtual)
    </VirtualHost>
```
>> Luego modifique el archivo host de windows en la ruta: 
>>> C:\Windows\System32\drivers\etc de la siguiente manera (al final del archivo):
```HTML
    127.0.0.1      (nombre_dominio_virtual)
```

*Nota: Debe tener en cuenta los puertos que usa para su servidor Apache*

>Conexión a la base de datos
>>Modifique el archivo .env en el siguiente apartado, especificando los datos de conexión:
```HTML
    DB_CONNECTION=mysql
    DB_HOST="servidorde bd"
    DB_PORT="puerto"
    DB_DATABASE="nombre bd"
    DB_USERNAME="usuario bd"
    DB_PASSWORD="password bd"
```

>CREACION DE VISTA
>>Cree la siguiente vista en su base de datos, en caso de que tenga algun error al importar la DB
```HTML
    CREATE OR REPLACE VIEW vista_orders_products AS
    SELECT o.customer_name AS nombre, o.customer_mobile AS telefono, o.customer_email AS email,
    o.created_at, o.id_product AS id_producto, o.status AS estado, o.processUrl AS url_pago, 
    o.reference AS referencia_orden, o.requestId, o.updateD_at, o.id AS id_orden, o.id_cliente, o.llave_secreta, 
    p.name AS nombre_producto, 
    p.price AS precio_producto, p.img AS imagen_producto, p.description AS descripcion_producto
    FROM orders o
    INNER JOIN products p
    ON o.id_product = p.id
```

>Modifique la ruta base de los ENDPOINT con su dominio para el backend en el archivo VerifyCsrfToken.php:
>>app/Http/Middleware/

*Recuerde ubicar "/public/" entre la ruta base y su dominio*
>>Ejemplo: http://sudominio.com/public/...

*El archivo de base de datos se encuentra en la carpeta raiz del backend*

*En ocasiones al importar la base de datos, la columna: id no obtiene su propiedad de primary_key, revise la base de datos y si esto ha pasado, asigne a cada id de las tablas de la BD como primary_key y Auto_Increment*


*Tambien debe cambiar en el controlador "ProcesarPago.php" la url o dominio base de la tienda (frontend), en la linea 125 (header ("Location: http://localhost/frontend.evertec/");)*

>Error de CORS
>> Al momento de desplegar en producción, es posible que el hosting donde desplegaras, tenga desahabilitada la extensión PDO y eso provoque un bloqueo de los endpoint, rectifica la habilitación en la administracion de PHP de tu cpanel, en mi caso la extensión (nd_pdo_mysql) se encontraba deshabilitada.
