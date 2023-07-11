# PruebaPractica

Esta prueba práctica tiene como finalidad evaluar el orden y legibilidad del código, la exitosa conexión a la base de datos de Filemaker, además se espera que puedas utilizar las mejores prácticas, guiadas por la documentación.

Lee muy bien estas instrucciones antes de empezar. 
Solo podrás hacer preguntas antes de comenzar.

## Instrucciones

Tienes máximo 120 minutos para trabajar en este ejercicio. Puedes utilizar cualquier recurso que quieras. Puedes buscar en google pero no puedes llamar ni escribirle a nadie, debes resolver esto con tus propios medios, confiamos en que seguirás las instrucciones correctamente.

### Problemas de Instalación

1.  Debes clonar este repositorio en el computador que estás utilizando. No importa donde.
2.  Crea un proyecto nuevo de Laravel
3.  Debes crear un  **Branch**  con tu nombre y apellido con el formato  **UpperCamelCase**
4.  Debes instalar las dependencias que ambos proyectos necesitan para funcionar

### Desafío principal

Es probable que no tengas conocimientos de lo que es Filemaker, sin embargo, es fundamental en la operación de nuestro laboratorio y el requisito más importante es poder interactuar con este tipo de base de datos, que provee una API con varios endpoints que permiten ejecutar diversas acciones.

Desde tu aplicación en Laravel, deberás ejecutar las siguientes instrucciones:

1. Crear un endpoint /api de tipo post, protegido por autenticación.
2. Ejecutar un Job que realice el login a la base de datos de Filemaker "DEV" puedes encontrar las instrucciones para este paso en los enlaces de interés "Connect to database", los parámetros para completar esta tarea son los siguientes:  
**Dominio**: https://rdp2.citolab.cl  
**version**: vLatest  
**database-name**: DEV  
**account-name**: fullstack  
**password**: laravel  

3. Una vez que te conectes utilizando el Job, dentro del mismo job debes realizar una solicitud para obtener la respuesta del primer registro, para este paso debes utilizar el endpoint "Get a single record" que puedes encontrar en los enlaces de interés. Los parámetros para enviar a este endpoint son:  
**Dominio**: https://rdp2.citolab.cl  
**version**: vLatest  
**database-name**: DEV  
**layout-name**: contacto   
**record-id**: 1  

**NOTA: Recuerda utilizar el session-token que obtuviste al hacer el login en la base de datos (en paso 2), lo debes utilizar en la cabecera de la solicitud para autenticarte correctamente.**

4. Debes guardar la respuesta del servidor para posteriormente enviar el atributo "texto" a través de Whatsapp al número telefónico que recibirás en el atributo "whatsapp" para coordinar una entrevista virtual.

**NOTA: No debes exponer en el pull request (PR) el texto secreto, ni el número de Whatsapp.**

## Enlaces de interés

[https://laravel.com/docs/10.x](https://laravel.com/docs/10.x)

[https://help.claris.com/en/data-api-guide/content/connect-disconnect-database.html](https://help.claris.com/en/data-api-guide/content/connect-disconnect-database.html)

[https://help.claris.com/en/data-api-guide/content/get-single-record.html](https://help.claris.com/en/data-api-guide/content/get-single-record.html)

## Éxito
