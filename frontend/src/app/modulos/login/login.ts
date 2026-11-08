import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  imports: [CommonModule],
  selector: 'app-login',
  standalone: true,
  styleUrl: './login.css',
  templateUrl: './login.html',
})
export class Login {

  ocultarPassword: boolean = true;

  constructor(private router: Router) {}
  
  ingresar() {
    console.log('Validando credenciales...Redireccionando al dashboard');
    this.router.navigate(['/dashboard']);
    
  }
  conmutarPassword() {
    this.ocultarPassword = !this.ocultarPassword;
  }
}
