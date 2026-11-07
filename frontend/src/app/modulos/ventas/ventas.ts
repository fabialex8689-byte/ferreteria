import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-ventas',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './ventas.html',
  styleUrl: './ventas.css'
})
export class Ventas implements OnInit {
  // Soluciona los errores de variables inexistentes en la tabla de ventas
  listaVentas: any[] = [];
  esEditando: boolean = false;

  ventaForm: any = {
    id_venta: null,
    id_producto: '',
    id_cliente: '',
    id_usuario: '',
    cantidad: 1,
    precio: 0
  };

  ngOnInit(): void {
    // Aquí irá tu carga inicial de datos
  }

  // Soluciona: Property 'seleccionarVenta' does not exist
  seleccionarVenta(vta: any) {
    this.esEditando = true;
    this.ventaForm = { ...vta };
  }

  // Soluciona: Property 'borrar' does not exist
  borrar(id: number) {
    if (confirm('¿Deseas eliminar este registro de venta?')) {
      console.log('Venta eliminada ID:', id);
    }
  }

  cancelarEdicion() {
    this.esEditando = false;
    this.ventaForm = { id_venta: null, id_producto: '', id_cliente: '', id_usuario: '', cantidad: 1, precio: 0 };
  }
}

