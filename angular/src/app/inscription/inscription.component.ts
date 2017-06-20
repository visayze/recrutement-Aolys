import { Component }            from '@angular/core';
import { Inscrit }              from '../classe/Inscrit';
import { InscritService }       from '../inscrit.service';

	
@Component({
  selector: 'inscription-form',
  templateUrl: './inscription.component.html',
  /*styleUrls: ['../site.css'],*/
})

export class InscriptionComponent {
	
/********** Proprietes **********/
    mobilite="";
    cmdp = "";
    titre='Inscrition';
    inscrit = new Inscrit('','','','','','',null,null,'');
    inscrits: Inscrit[]=[];
    msgErreur = '';
/********** Constructeur **********/    
	constructor(private inscritService: InscritService){}
/********** Méthodes **********/
    valider(){
        if (this.cmdp == this.inscrit.mdp){
            if (this.mobilite=="oui")
                this.inscrit.mobilite = true;
            else
                this.inscrit.mobilite = false;
            this.msgErreur="";
                this.inscritService.create(this.inscrit)
                .subscribe(
                truc  => this.inscrits.push(truc),
                error =>  this.msgErreur = <any>error);
        }
        else{
            this.msgErreur = "Les deux mots de passes ne correspondent pas";
        }
	}

	get(){
        this.inscritService.getInscrits()
            .subscribe(
                requestOk => {this.inscrits = requestOk;
                    console.log("this"+JSON.stringify(this.inscrits))
                    },
                error => this.msgErreur = error
                )
    }
}
/*         public sexe: string,
	       public nom: string,
	       public prenom: string,
           public mail: string,
           public nationalite: string,
           public date_de_naissance: string,
           public CP: number,
           public mobilite: boolean,
           public mdp: string,
           public numero_pole_emploi?: string,
           public mail_parrain?: string,
           public id?: number,
           public tel?: string,
           public tel_portable?: string,*/