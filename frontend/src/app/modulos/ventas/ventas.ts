import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-ventas',
  standalone: true,
  imports: [CommonModule, FormsModule],
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
    cantidad: 0,
    precio: 0,
    subtotal: 0,
    iva: 0,
    total: 0
  };

  ngOnInit(): void {
    // Aquí irá tu carga inicial de datos
  }

  calcularVentas() {
    const cantidad = Number(this.ventaForm.cantidad) || 0;
    const precioUnitario = Number(this.ventaForm.precio) || 0;

    this.ventaForm.subtotal = cantidad * precioUnitario;
    this.ventaForm.iva = this.ventaForm.subtotal * 0.19;
    this.ventaForm.total = this.ventaForm.subtotal + this.ventaForm.iva;
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
    this.ventaForm = { id_venta: null, id_producto: '', id_cliente: '', id_usuario: '', cantidad: 0, precio: 0, subtotal: 0, iva: 0, total: 0 };
  }
}

