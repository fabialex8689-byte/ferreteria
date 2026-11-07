import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common'; // <-- INDISPENSABLE para ngClass y *ngIf
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-compras',
  standalone: true,
  imports: [CommonModule, FormsModule], // <-- AGREGA CommonModule aquí adentro
  templateUrl: './compras.html',
  styleUrl: './compras.css'

})
  
export class Compras implements OnInit {
  // VARIABLES FALTANTES DECLARADAS:
  listaCompras: any[] = [];
  esEditando: boolean = false;

  compraForm: any = {
    id_compra: null,
    id_producto: '',
    id_proveedor: '',
    cantidad: 0,
    precio_compra: 0,
    subtotal: 0,
    iva: 0,
    total: 0
  };

  calcularValores() {
    const cantidad = Number(this.compraForm.cantidad) || 0;
    const costoUnitario = Number(this.compraForm.precio_compra) || 0;

    this.compraForm.subtotal = cantidad * costoUnitario;
    this.compraForm.iva = this.compraForm.subtotal * 0.19;
    this.compraForm.total = this.compraForm.subtotal + this.compraForm.iva;
  }

  ngOnInit(): void {
    // Tu lógica inicial
  }

  seleccionarCompra(compra: any) {
    this.esEditando = true;
    this.compraForm = { ...compra };
  }

  borrar(id: number) {
    if (confirm('¿Seguro que desea eliminar esta orden de compra?')) {
      console.log('Eliminado compra ID:', id);
    }
  }

  cancelarEdicion() {
    this.esEditando = false;
    this.compraForm = { id_compra: null, id_producto: '', id_proveedor: '', cantidad: 0, precio_compra: 0, subtotal: 0, iva: 0, total: 0 };
  }
}



