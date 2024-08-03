- Cambiar linea #3 del archivo ".htaccess"

actual:
# RewriteBase /acme/
nueva:
# RewriteBase /nombre_de_la_carpeta/

- Cambiar linea #3 del archivo "index.php"

actual:
# <?php $name = 'acme'; ?>
nueva:
# <?php $name = 'nombre_de_la_carpeta'; ?>

- Cambiar linea #5 del archivo "config.json"

actual:
# "database" : "acme"
nueva:
# "database" : "nombre_de_la_carpeta"