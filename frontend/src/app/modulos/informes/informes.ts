import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-informes',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './informes.html',
  styleUrl: './informes.css'
})
export class Informes implements OnInit {
  // Matriz para almacenar los reportes traídos por el controlador PHP
  listaInformes: any[] = [];

  ngOnInit(): void {
    this.cargarInformes();
  }

  // Función de consulta acoplada a tu backend
  cargarInformes() {
    console.log('Ejecutando la función consulta para el módulo de informes...');
    // Aquí se llamará al servicio inyectado más adelante:
    // this.informesService.consulta().subscribe(datos => this.listaInformes = datos);
  }
}

