import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common'; // <-- Soluciona ngClass y currency

@Component({
  selector: 'app-inventario',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './inventario.html',
  styleUrl: './inventario.css'
})
export class Inventario implements OnInit {
  // Soluciona: Property 'listaProductos' does not exist
  listaProductos: any[] = [];

  ngOnInit(): void {
    // Aquí cargarás tu API de PHP más adelante
  }

  // Soluciona: Property 'borrar' does not exist
  borrar(id: number) {
    if (confirm('¿Seguro que deseas eliminar este producto?')) {
      console.log('ID a eliminar:', id);
    }
  }
}
