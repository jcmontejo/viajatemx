<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{

    public static function defaultPermissions()
    {
        return [
            'ver-panel-de-control',

            'ver_proveedores',
            'agregar_proveedores',
            'editar_proveedores',
            'eliminar_proveedores',

            'ver_rutas',
            'agregar_rutas',
            'editar_rutas',
            'eliminar_rutas',

            'ver_tarjetas_credito',
            'agregar_tarjetas_credito',
            'editar_tarjetas_credito',
            'eliminar_tarjetas_credito',

            'ver_empleados',
            'agregar_empleados',
            'editar_empleados',
            'eliminar_empleados',

            'ver_reporte_ingresos',
            'ver_reporte_gastos',

            'ver_clientes',
            'agregar_clientes',
            'editar_clientes',
            'eliminar_clientes',

            'ver_solicitudes',
            'editar_solicitudes',
            'procesar_solicitudes',
            'venta_solicitudes',

            'ver_detalle_venta',

            'ver_facturas',
            'generar_factura',
            'ver_detalle_factura',

            'generar_venta',

            'ver_roles',
            'agregar_roles',
        ];
    }
}
