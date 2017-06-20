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
    test: string[] = [];
    msgErreur="";
/********** Constructeur **********/ 
	constructor(private inscritService: InscritService){}
/********** Méthodes **********/
    valider(){
        this.test = [this.mail,this.mdp]
        this.inscritService.verif(this.mail,this.mdp)
                .subscribe(
                truc  => this.test.push(truc),
                error =>  this.msgErreur = <any>error);
    }
    
}