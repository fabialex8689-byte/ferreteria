import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-departamento',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './departamento.html',
  styleUrl: './departamento.css'
})
export class Departamento implements OnInit {
  listaDepartamentos: any[] = [];
  esEditando: boolean = false;

  departamentoForm: any = {
    id_departamento: null,
    nombre: ''
  };

  ngOnInit(): void { }

  seleccionarDepartamento(dep: any) {
    this.esEditando = true;
    this.departamentoForm = { ...dep };
  }

  borrar(id: number) {
    if (confirm('¿Seguro que deseas eliminar este departamento?')) {
      console.log('Eliminando departamento ID:', id);
    }
  }

  cancelarEdicion() {
    this.esEditando = false;
    this.departamentoForm = { id_departamento: null, nombre: '' };
  }
}
