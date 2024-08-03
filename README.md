# Cambiar lineas de los siguientes archivos:

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

- "config.json"
```
actual:
# "database" : "acme"
nueva:
# "database" : "nombre_de_la_carpeta"
```