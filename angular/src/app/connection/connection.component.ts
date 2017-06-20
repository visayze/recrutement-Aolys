import { Component }    from '@angular/core';
import { Inscrit }              from '../classe/Inscrit';
import { InscritService }       from '../inscrit.service';

	
@Component({
  selector: 'connection',
  templateUrl: './connection.component.html',
  styleUrls: ['../site.css'],
})

export class ConnectionComponent {
	
/********** Proprietes **********/
    mail="";
    mdp="";
    msgErreur="";
/********** Constructeur **********/ 
	constructor(private inscritService: InscritService){}
/********** Méthodes **********/
    valider(){
/*        this.inscritService.verif()
                .subscribe(
                truc  => this..push(truc),
                error =>  this.msgErreur = <any>error);*/
    }
    
}