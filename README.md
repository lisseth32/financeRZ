# financeRZ
Mantenedor simple de Finanzas


## Ejecución testeada

Laravel Version: 8.0
PHP Version: 7.4
Mysql Version: 5.6.51
Composer Version: 2.2.1


## Instalación
Clone the repo and cd into it
Run composer install
Rename or copy .env.example file to .env
Run php artisan key:generate
Set your database credentials in your .env file
Run php artisan migrate

## Modules habilitados
- Dashboard: muestra resumen de ingresos / egresos / ganacias del mes actual
- Listar Finanzas: Muestra Lista de transacciones. Se permite editar y eliminar transacciones cargadas
- Agregar Finanzas: muestra formulario para ingresar transacción