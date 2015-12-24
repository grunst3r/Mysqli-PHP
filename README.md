# MYSQLi / PDO_MySQL
Modo de usu del class en PHP.

### INSERT
```php
DB::_query("INSERT INTO tabla (campo1, campo2) VALUES  ('aaa','bbb') ");
```
```php
if(DB::_query("INSERT INTO tabla (campo1, campo2) VALUES  ('aaa','bbb') "))
```
```php
/* INSERT and insert_id */
$sql = DB::_query("INSERT INTO tabla (campo1, campo2) VALUES ('aaa','bbb') ");
echo DB::mysql()->insert_id; //ID del registro insertado.
```

### SELECT
```php
/* SELECT - como objecto (object) */
$sql = DB::_query("SELECT * FROM tabla")->fetch_object();
echo "field 1: ".$sql->campo1;
echo "field 2: ".$sql->campo2;
$sql->close(); //opcional
```
```php
/* SELECT - como arreglo (array) */
$sql = DB::_query("SELECT * FROM tabla")->fetch_array();
echo "field 1: ".$sql['campo1'];
echo "field 2: ".$sql['campo2'];
```
```php
//SELECT Bucle (object)
$sql = DB::_query("SELECT * FROM tabla");
echo "Total de registros: ".$sql->num_rows."\n";
while ($obj = $sql->fetch_object()) {
        printf ("%d %s %s\n", $obj->id, $obj->campo1, $obj->campo2 );
}
```
```php
//SELECT Bucle (array)
$sql = DB::_query("SELECT * FROM tabla");
echo "Total de registros: ".$sql->num_rows."\n";
while ($obj = $sql->fetch_array()) {
        printf("%d %s %s\n", $obj->id, $obj['campo1'], $obj['campo2'] );
}
```

### UPDATE
```php
//UPDATE simple
if( DB::_query("UPDATE tabla SET campo1='a1a1a1' WHERE id='1'  ") ) echo "actualizado";
```
```php
//UPDATE múltiple campos
if( DB::_query("UPDATE tabla SET campo1='a1a1a1', campo2='a2a2a2' WHERE id='1'  ") ) echo "actualizado";
```

### DELETE
```php
if( DB::_query("DELETE FROM tabla WHERE id='1'  ") ) echo "eliminado";
```

License
----

JODA WEBMASTER