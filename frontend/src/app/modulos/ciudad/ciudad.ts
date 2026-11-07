import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-ciudad',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './ciudad.html',
  styleUrl: './ciudad.css'
})
export class Ciudad implements OnInit {
  listaCiudades: any[] = [];
  esEditando: boolean = false;

  ciudadForm: any = {
    id_ciudad: null,
    nombre: ''
  };

  ngOnInit(): void { }

  seleccionarCiudad(ciu: any) {
    this.esEditando = true;
    this.ciudadForm = { ...ciu };
  }

  borrar(id: number) {
    if (confirm('¿Seguro que deseas eliminar esta ciudad?')) {
      console.log('Eliminando ciudad ID:', id);
    }
  }

  cancelarEdicion() {
    this.esEditando = false;
    this.ciudadForm = { id_ciudad: null, nombre: '' };
  }
}

