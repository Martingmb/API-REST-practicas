# API-REST-practicas
Una api publica para practicar refactoring 

Contacts

        URL                         Http                    Descripción
    /api/contact                    Get                Regresa un Array de Contactos
    /api/contact                    Post               Agregamos contacts y regresamos un id
    /api/contact /:id               Patch              Hace parcialmente un update del contacto donde cambia el id
    /api/contact /:id               Put                Hace un update TOTAL

===========================================================================================================

Message

            URL                         Http                    Descripción
    /api/contact/:id/message            Get                Regresa todos los mensajes de id
    /api/contact/:id/message/:mid       Get                Regresa un mensaje con el id de :mid
    /api/contact/:id/message            Post               Agregamos un mensaje nuevo al contacto
    /api/contact/:id/message/:mid       Patch              Edita mensaje con el id :mid
    /api/contact/:id/message/:mid       Put                Edita el mensaje y el :mid
