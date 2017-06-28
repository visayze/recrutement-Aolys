import { Component }    from '@angular/core';
import { Inscrit }              from '../classe/Inscrit';
import { InscritService }       from '../inscrit.service';

	
@Component({
  selector: 'listeEmplois',
  templateUrl: './listeEmplois.component.html',
  styleUrls: ['../site.css'],
})

export class ListeEmplois {
	
/********** Proprietes **********/
    mail="";
    mdp="";
    msgErreur="";
/********** Constructeur **********/ 
	constructor(private inscritService: InscritService){}
/********** Méthodes **********/
    valider(){
        this.inscritService.verif(this.mail, this.mdp)
        .subscribe(
            data  => {alert('connexion réussie')},
            error => {console.log(error)}
        );
    }
    
}
