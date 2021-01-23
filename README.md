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

