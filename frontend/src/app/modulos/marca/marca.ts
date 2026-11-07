import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-marca',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './marca.html',
  styleUrl: './marca.css'
})
export class Marca implements OnInit {
  listaMarcas: any[] = [];
  esEditando: boolean = false;

  marcaForm: any = {
    id_marca: null,
    nombre: ''
  };

  ngOnInit(): void { }

  seleccionarMarca(mar: any) {
    this.esEditando = true;
    this.marcaForm = { ...mar };
  }

  borrar(id: number) {
    if (confirm('¿Seguro que deseas eliminar esta marca?')) {
      console.log('Eliminando marca ID:', id);
    }
  }

  cancelarEdicion() {
    this.esEditando = false;
    this.marcaForm = { id_marca: null, nombre: '' };
  }
}
