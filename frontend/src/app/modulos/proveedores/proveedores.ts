import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-proveedores',
  standalone: true,
  imports: [CommonModule],
  styleUrl: './proveedores.css',
  templateUrl: './proveedores.html'
})
export class Proveedores implements OnInit {
  // Matriz principal para la consulta
  listaProveedores: any[] = [];
  esEditando: boolean = false;

  // Modelo del formulario alineado con las columnas de tu Base de Datos
  proveedorForm: any = {
    id_proveedor: null,
    razon_social: '',
    contacto: '',
    correo: '',
    direccion: '',
    id_ciudad: ''
  };

  ngOnInit(): void {
    // Aquí se llamará a la consulta del backend más adelante
  }

  // Prepara el formulario con los datos de la fila seleccionada
  seleccionarProveedor(prov: any) {
    this.esEditando = true;
    this.proveedorForm = { ...prov };
  }

  // Restablece el formulario al modo inserción normal
  cancelarEdicion() {
    this.esEditando = false;
    this.proveedorForm = { id_proveedor: null, razon_social: '', contacto: '', correo: '', direccion: '', id_ciudad: '' };
  }

  // Simulación del método eliminar
  borrar(id: number) {
    if (confirm('¿Seguro que deseas eliminar este proveedor?')) {
      console.log('Enviando petición a PHP para borrar el ID:', id);
    }
  }
}
