PRUEBA W360

Instalación:
Para el uso de esta APi se ha utilizado las siguientes herramientas con sus correspondientes versiones

1. lavarel V7
2. VueJs v2.6.12
3. npm v6.13.4
4. node v12.14.8

Recordar: Una vez su proyecto tengas las instalaciones requeridas ejecutar el comando
 npm run dev || npm run watch //recomendable el segundo para no estar ejecutando continuamente  

USO DE API CONTACTO:
Esta api contiene a todos los contactos que se registran en el formulario contacto.
por seguridad lo mensajes que ellos escriben no estan asociados a la misma tabla de información,
sin embargo, por medio de la relación una vez se haga el recorrido de un foreach en la vista
podra obtener los mensajes con el siguiente comando:
"$contact->messages"
Para consultar la api de contacto debe ingresar a los siguientes enlaces:

//Obtiene todos los contactos
- api/contact

//filtra los contactos segun la prioridad [High,Medium,Low] 
-api/contact/{prioridad} //escribir una de las prioridades que estan en el array sin corchetes


USO DE API EMAIL
Esta api me muestra todos lo emails que se han registrado en la tabla contacto.
para consultar la api de email debe ingresar al siguiente enlace:
-api/email

NOTA: Si tiene algún inconveniente contactenos en el formulario de la vista principal y nos estaremos en contacto,
Estamos para servirle W360.
