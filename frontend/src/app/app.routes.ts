import { Routes } from '@angular/router';
import { Main } from './estructura/main';
import { Dashboard } from './modulos/dashboard/dashboard';
import { Clientes } from './modulos/clientes/clientes';
import { Compras } from './modulos/compras/compras';
import { Informes } from './modulos/informes/informes';
import { Inventario } from './modulos/inventario/inventario';
import { Login } from './modulos/login/login';
import { Proveedores } from './modulos/proveedores/proveedores';
import { Ventas } from './modulos/ventas/ventas';
import { Marca } from './modulos/marca/marca';
import { Ciudad } from './modulos/ciudad/ciudad';
import { Departamento } from './modulos/departamento/departamento';
import { Usuarios } from './modulos/usuario/usuarios';

export const routes: Routes = [
    {
        path: '', component: Main,
        children:
        [
            {path: 'dashboard', component: Dashboard},
            {path: 'clientes', component: Clientes },
            {path: 'compras', component: Compras },
            {path: 'informes', component: Informes},
            {path: 'inventario', component: Inventario},
            {path: 'proveedores', component: Proveedores},
            {path: 'ventas', component: Ventas },
            {path: 'marca', component: Marca },
            {path: 'ciudad', component: Ciudad },
            {path: 'departamento', component: Departamento },
            {path: 'usuarios', component: Usuarios},
            {path: '', redirectTo: 'dashboard', pathMatch: 'full'}
        ]
            
    },

    {path: 'login', component: Login}
    
            
    
];
