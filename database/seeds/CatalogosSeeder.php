<?php

use Illuminate\Database\Seeder;
use App\Catalogos;

class CatalogosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        Catalogos::create(['nombre' => '1','opcion' => 'NIT']);
        Catalogos::create(['nombre' => '1','opcion' => 'RUT']);
        Catalogos::create(['nombre' => '2','opcion' => 'Cédula de Ciudadanía']);
        Catalogos::create(['nombre' => '2','opcion' => 'Tarjeta de Identidad']);
        Catalogos::create(['nombre' => '2','opcion' => 'Cedula de Extranjería']);
        Catalogos::create(['nombre' => '2','opcion' => 'Registro Civil']);
        Catalogos::create(['nombre' => '2','opcion' => 'Numero de Identificación Personal (NIP)']);
        Catalogos::create(['nombre' => '2','opcion' => 'Número Unico de Identificación Personal (NUIP)']);
        Catalogos::create(['nombre' => '2','opcion' => 'NES']);
        Catalogos::create(['nombre' => '2','opcion' => 'Certificado de Cabildo']);
        Catalogos::create(['nombre' => '2','opcion' => 'Pasaporte']);
        Catalogos::create(['nombre' => '2','opcion' => 'Permiso Especial de Residencia (PEP)']);       
        Catalogos::create(['nombre' => '3','opcion' => 'Efectivo']);
        Catalogos::create(['nombre' => '3','opcion' => 'Tarjeta Débito']);
        Catalogos::create(['nombre' => '3','opcion' => 'Tarjeta Crédito']);
        Catalogos::create(['nombre' => '3','opcion' => 'Transferencia']);
        Catalogos::create(['nombre' => '3','opcion' => 'Cheque']);
        Catalogos::create(['nombre' => '4','opcion' => 'Mujer']);
        Catalogos::create(['nombre' => '4','opcion' => 'Hombre']);
        Catalogos::create(['nombre' => '4','opcion' => 'Otro']);       
        Catalogos::create(['nombre' => '5','opcion' => 'Zona norte']);
        Catalogos::create(['nombre' => '5','opcion' => 'Zon sur']);
        Catalogos::create(['nombre' => '5','opcion' => 'Zona oriente']);
        Catalogos::create(['nombre' => '5','opcion' => 'Zona occidente']);
        Catalogos::create(['nombre' => '6','opcion' => 'Soltero(a)']);
        Catalogos::create(['nombre' => '6','opcion' => 'Casado(a)']);
        Catalogos::create(['nombre' => '6','opcion' => 'Divorciado(a)']);
        Catalogos::create(['nombre' => '6','opcion' => 'Separación en proceso judicial']);
        Catalogos::create(['nombre' => '6','opcion' => 'Viudo(a)']);
        Catalogos::create(['nombre' => '6','opcion' => 'Unión libre']);

        Catalogos::create(['nombre' => '7','opcion' => 'Empresarial']);             //Empresas-sector_id
        Catalogos::create(['nombre' => '7','opcion' => 'Universitario']);           //Empresas-sector_id
        Catalogos::create(['nombre' => '7','opcion' => 'Constructoras']);           //Empresas-sector_id

        Catalogos::create(['nombre' => '8','opcion' => 'Cliente']);                 //Terceros-tipo_tercero
        Catalogos::create(['nombre' => '8','opcion' => 'Proveedor']);               //Terceros-tipo_tercero
        Catalogos::create(['nombre' => '8','opcion' => 'Empleado']);                //Terceros-tipo_tercero

        Catalogos::create(['nombre' => '9','opcion' => 'Activo']);	                //Almacenes-estado
        Catalogos::create(['nombre' => '9','opcion' => 'Inactivo']);	            //Almacenes-estado

        Catalogos::create(['nombre' => '10','opcion' => 'Activo']);	                //Categorias-estado
        Catalogos::create(['nombre' => '10','opcion' => 'Inactivo']);	            //Categorias-estado

        Catalogos::create(['nombre' => '11','opcion' => 'Activo']);	                //Subcategorias-estado
        Catalogos::create(['nombre' => '11','opcion' => 'Inactivo']);	            //Subcategorias-estado

        Catalogos::create(['nombre' => '12','opcion' => 'Terminado']);	            //Producto-tipo_producto
        Catalogos::create(['nombre' => '12','opcion' => 'Semiterminado']);	        //Producto-tipo_producto
        Catalogos::create(['nombre' => '12','opcion' => 'Materia']);                //Prima	Producto-tipo_producto
        Catalogos::create(['nombre' => '12','opcion' => 'Servicios']);	            //Producto-tipo_producto

        Catalogos::create(['nombre' => '13','opcion' => 'Orden de Pedido']);	    //	Documentos-tipo_doc
        Catalogos::create(['nombre' => '13','opcion' => 'Orden de Compra']);	    //	Documentos-tipo_doc
        Catalogos::create(['nombre' => '13','opcion' => 'Orden de Fabricación']);	//	Documentos-tipo_doc
        Catalogos::create(['nombre' => '13','opcion' => 'Factura de Venta']);	    //	Documentos-tipo_doc
        Catalogos::create(['nombre' => '13','opcion' => 'Factura de Compra']);	    //	Documentos-tipo_doc

        Catalogos::create(['nombre' => '14','opcion' => 'Si']);	                    //	Documentos-impreso
        Catalogos::create(['nombre' => '14','opcion' => 'No']);	                    //	Documentos-impreso
        Catalogos::create(['nombre' => '14','opcion' => 'Reimpreso']);	            //	Documentos-impreso

        Catalogos::create(['nombre' => '15','opcion' => 'Activo']);	                //	Documentos-estado
        Catalogos::create(['nombre' => '15','opcion' => 'Inactivo']);	            //	Documentos-estado
        Catalogos::create(['nombre' => '15','opcion' => 'Anulado']);	            //	Documentos-estado
        Catalogos::create(['nombre' => '15','opcion' => 'En Proceso']);	            //	Documentos-estado
        Catalogos::create(['nombre' => '15','opcion' => 'Finalizado']);	            //	Documentos-estado

        Catalogos::create(['nombre' => '16','opcion' => 'Activo']);	                //	Documento_dets-estado
        Catalogos::create(['nombre' => '16','opcion' => 'Inactivo']);	            //	Documento_dets-estado
        Catalogos::create(['nombre' => '16','opcion' => 'Anulado']);	            //	Documento_dets-estado
        Catalogos::create(['nombre' => '16','opcion' => 'En Proceso']);	            //	Documento_dets-estado
        Catalogos::create(['nombre' => '16','opcion' => 'Finalizado']);	            //	Documento_dets-estado

        Catalogos::create(['nombre' => '17','opcion' => 'COP']);	                //	Documento_dets-moneda
        Catalogos::create(['nombre' => '17','opcion' => 'USD']);	                //	Documento_dets-moneda
        Catalogos::create(['nombre' => '17','opcion' => 'EUR']);	                //	Documento_dets-moneda

        Catalogos::create(['nombre' => '18','opcion' => 'Recibo de pago']);	        // - Cliente Pagos-tipo_pago
        Catalogos::create(['nombre' => '18','opcion' => 'Recibo de pago']);	        // - Proveedores Pagos-tipo_pago

        Catalogos::create(['nombre' => '19','opcion' => 'Activo']);	                //	Pagos-estado
        Catalogos::create(['nombre' => '19','opcion' => 'Inactivo']);	            //	Pagos-estado
        Catalogos::create(['nombre' => '19','opcion' => 'Anulado']);	            //	Pagos-estado
        Catalogos::create(['nombre' => '19','opcion' => 'Finalizado']);	            //	Pagos-estado

        Catalogos::create(['nombre' => '20','opcion' => 'Si']);	                    //	Pagos-impreso
        Catalogos::create(['nombre' => '20','opcion' => 'No']);	                    //	Pagos-impreso
        Catalogos::create(['nombre' => '20','opcion' => 'Reimpreso']);	            //	Pagos-impreso

        Catalogos::create(['nombre' => '21','opcion' => 'Efectivo']);	             //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Tarjeta de Crédito']);	     //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Tarjeta Débito']);	         //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Cheque']);	                 //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Bonos']);	                 //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Puntos']);	                 //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Transferencia']);	         //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Nequi']);	                 //	Pago-dets-medio_pago_id
        Catalogos::create(['nombre' => '21','opcion' => 'Daviplata']);	             //	Pago-dets-medio_pago_id

        Catalogos::create(['nombre' => '22','opcion' => 'Activo']);	                 //	Pagos_dets-estado_id
        Catalogos::create(['nombre' => '22','opcion' => 'Inactivo']);	             //	Pagos_dets-estado_id
        Catalogos::create(['nombre' => '22','opcion' => 'Anulado']);	             //	Pagos_dets-estado_id
        Catalogos::create(['nombre' => '22','opcion' => 'Finalizado']);	             //	Pagos_dets-estado_id

        Catalogos::create(['nombre' => '23','opcion' => 'COP']);	                 //	Pagos_dets-tipo_moneda_id
        Catalogos::create(['nombre' => '23','opcion' => 'USD']);	                 //	Pagos_dets-tipo_moneda_id
        Catalogos::create(['nombre' => '23','opcion' => 'EUR']);	                 //	Pagos_dets-tipo_moneda_id

        Catalogos::create(['nombre' => '24','opcion' => 'Activo']);	                 //	Campanas-estado
        Catalogos::create(['nombre' => '24','opcion' => 'Inactivo']);	             //	Campanas-estado
        Catalogos::create(['nombre' => '24','opcion' => 'Anulado']);	             //	Campanas-estado
        Catalogos::create(['nombre' => '24','opcion' => 'Finalizado']);	             //	Campanas-estado

        Catalogos::create(['nombre' => '25','opcion' => 'Entrada - Compra']);	     //	Movimientos-tipo_mov
        Catalogos::create(['nombre' => '25','opcion' => 'Entrada - Ord Fabricación']);//Movimientos-tipo_mov
        Catalogos::create(['nombre' => '25','opcion' => 'Salida - Venta']);	         //	Movimientos-tipo_mov
        Catalogos::create(['nombre' => '25','opcion' => 'Salida - Ajuste Inv']);	 //	Movimientos-tipo_mov
        Catalogos::create(['nombre' => '25','opcion' => 'Entrada - Ajuste Inv']);	 //	Movimientos-tipo_mov
        Catalogos::create(['nombre' => '25','opcion' => 'Entrada - Devolución']);	 //	Movimientos-tipo_mov
        Catalogos::create(['nombre' => '25','opcion' => 'Salida - Devolución Compra']);	//	Movimientos-tipo_mov

        Catalogos::create(['nombre' => '26','opcion' => 'Activo']);	                //	Movimientos-estado
        Catalogos::create(['nombre' => '26','opcion' => 'Inactivo']);	            //	Movimientos-estado
        Catalogos::create(['nombre' => '26','opcion' => 'Anulado']);	            //	Movimientos-estado
        Catalogos::create(['nombre' => '26','opcion' => 'Finalizado']);	            //	Movimientos-estado

        Catalogos::create(['nombre' => '27','opcion' => 'Activo']);	                //	Movimientos_det-estado
        Catalogos::create(['nombre' => '27','opcion' => 'Inactivo']);	            //	Movimientos_det-estado
        Catalogos::create(['nombre' => '27','opcion' => 'Anulado']);	            //	Movimientos_det-estado
        Catalogos::create(['nombre' => '27','opcion' => 'Finalizado']);	            //	Movimientos_det-estado

        Catalogos::create(['nombre' => '28','opcion' => '1-Ent']);	                //	Movimientos_det-tipo_mov
        Catalogos::create(['nombre' => '28','opcion' => '0-Sal']);	                //	Movimientos_det-tipo_mov

        Catalogos::create(['nombre' => '29','opcion' => 'Activo']);	                // Tiendas-estado
        Catalogos::create(['nombre' => '29','opcion' => 'Inactivo']);	            // Tiendas-estado

        Catalogos::create(['nombre' => '30','opcion' => 'Activo']);	                // Vendedores-estado
        Catalogos::create(['nombre' => '30','opcion' => 'Inactivo']);	            // Vendedores-estado

        

    }
}




