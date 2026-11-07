import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-clientes',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './clientes.html',
  styleUrl: './clientes.css'
})
export class Clientes implements OnInit {
  listaClientes: any[] = [];
  esEditando: boolean = false;

  // Modelo alineado a los atributos comunes de un cliente
  clienteForm: any = {
    id_cliente: null,
    nombre: '',
    telefono: '',
    correo: '',
    direccion: ''
  };

  ngOnInit(): void {
    // Aquí se llamará a la consulta de la API más adelante
  }

  seleccionarCliente(cli: any) {
    this.esEditando = true;
    this.clienteForm = { ...cli };
  }

  borrar(id: number) {
    if (confirm('¿Seguro que deseas eliminar este cliente?')) {
      console.log('Eliminando cliente con ID:', id);
    }
  }

  cancelarEdicion() {
    this.esEditando = false;
    this.clienteForm = { id_cliente: null, nombre: '', telefono: '', correo: '', direccion: '' };
  }
}
