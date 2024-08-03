# A tomar en cuenta

En caso de cambiar el nombre de la carpeta, se deben cambiar las lineas #3 de los siguientes archivos:

- ".htaccess"
```
actual:
# RewriteBase /acme/
nueva:
# RewriteBase /nombre_de_la_carpeta/
```

- "index.php"
```
actual:
# <?php $name = 'acme'; ?>
nueva:
# <?php $name = 'nombre_de_la_carpeta'; ?>
```

En caso de cambiar el nombre de la base de datos, se deben cambiar la linea #3 del siguiente archivo:

- "config.json"
```
actual:
# "database" : "acme"
nueva:
# "database" : "nombre_de_la_carpeta"
```