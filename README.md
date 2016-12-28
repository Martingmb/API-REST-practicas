# API-REST-practicas
Una api publica para practicar refactoring 

Contacts

        URL                          Http                    Descripción
    /api/contacts                    Get                Regresa un Array de Contactos
    /api/contacts                    Post               Agregamos contacts y regresamos un id
    /api/contacts /:id               Patch              Hace parcialmente un update del contacto donde cambia el id
    /api/contacts /:id               Put                Hace un update TOTAL

===========================================================================================================

Message

            URL                           Http                    Descripción
    /api/contacts/:id/messages            Get                Regresa todos los mensajes de id
    /api/contacts/:id/messages/:mid       Get                Regresa un mensaje con el id de :mid
    /api/contacts/:id/messages            Post               Agregamos un mensaje nuevo al contacto
    /api/contacts/:id/messages/:mid       Patch              Edita mensaje con el id :mid
    /api/contacts/:id/messages/:mid       Put                Edita el mensaje y el :mid
