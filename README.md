# db_manager.php
The db_manager.php must be placed in the Aruba web server.
It allows to interact with the Aruba MySQL databases from outside the Aruba host addresses.

This solved the issue: "L'accesso in gestione e modifica dei db mysql è possibile da script gestiti da qualsiasi dominio registrato in hosting sui nostri server, ma non da eventuali applicazioni installate sul suo computer o da server/domini esterni e viceversa."

By making an HTTP POST request to the https://your_domain.com/db_manager.php URL with the SQL query as request parameter you can freely and exhaustively interact with the database from any remote host.
