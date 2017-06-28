import { Component } from '@angular/core';
import { Inscrit } from '../classe/Inscrit';
import { InscritService } from '../inscrit.service';


@Component({
  selector: 'admin',
  templateUrl: './adminConnection.component.html',
  styleUrls: ['../site.css'],
})

export class AdminConnectionComponent {
	
/********** Proprietes **********/
    mail="";
    mdp="";
    test: string[] = [];
    msgErreur="";
/********** Constructeur **********/ 
	constructor(private inscritService: InscritService){}
/********** Méthodes **********/
    valider(){
        this.inscritService.verif(this.mail, this.mdp)
                .subscribe(
                data  => (alert('connexion réussie')),
                error =>  this.msgErreur = <any>error);
    }
}