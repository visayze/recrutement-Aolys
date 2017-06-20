import { BrowserModule } from '@angular/platform-browser';
import { NgModule }      from '@angular/core';
import { FormsModule }   from '@angular/forms';
import { HttpModule }    from '@angular/http';
import { RouterModule, Routes } from '@angular/router';
/*
// Imports for loading & configuring the in-memory web api
import { InMemoryWebApiModule } from 'angular-in-memory-web-api';
import { InMemoryDataService }  from './in-memory-data.service';
*/

import { AppComponent }       from './app.component';
import { IndexComponent }     from './index/index.component';
import { HeaderComponent }    from './header/header.component';
import { FooterComponent }    from './footer/footer.component';
import { InscriptionComponent } from './inscription/inscription.component';
import { ConnectionComponent }from './connection/connection.component';
import { ListeInscritsComponent } from './listeInscrits/listeInscrits.component';

import { InscritService }from './inscrit.service';

///////////////////////////////// routes /////////////////////////////////
const mesRoutes: Routes = [
    {    path: '',
        component: IndexComponent 
    },  
    {
        path: 'liste-utilisateurs', 
        component: ListeInscritsComponent
    },
    {
        path:'index',
        component: IndexComponent
    },
    {
        path: 'inscription',
        component: InscriptionComponent
    
    },
    {
        path: 'connection',
        component: ConnectionComponent 
    }, 
];


///////////////////////////////// module /////////////////////////////////
@NgModule({
  declarations: [
    AppComponent,
    IndexComponent,
    HeaderComponent,
    FooterComponent,
    ListeInscritsComponent,
    InscriptionComponent,
    ConnectionComponent,
  ],
  imports: [                    
    BrowserModule,
    FormsModule,
    HttpModule,
    RouterModule.forRoot(mesRoutes),
    /*InMemoryWebApiModule.forRoot(InMemoryDataService),*/
  ],
  providers: [ InscritService ],
  bootstrap: [AppComponent]
})
export class AppModule { }
