import { Component, OnInit }    from '@angular/core';
import { Inscrit }              from './classe/Inscrit';	
import { InscritService }       from './inscrit.service'

	
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit {
	
/********** Proprietes **********/
/*    titre='recrutement';
    valeur:number = 0;
    inscrit = new Inscrit(0,'','');
	user = new Inscrit(0,'','');
    inscrits: Inscrit[]=[];
    msgErreur = '';*/
/********** Constructeur **********/
	constructor(private inscritService: InscritService){}

/********** Méthodes **********/
    ngOnInit(){
      /*  this.inscritService.getInscrits()
            .subscribe(
                requestOk => {this.inscrits = requestOk;
                    console.log("this"+JSON.stringify(this.inscrits))
                    },
                error => this.msgErreur = error*/
                }
/*
	incrementerValeur(){
		this.valeur++;
	}
	
	resetValeur(){
        this.user.nom='';
        this.user.prenom='';
        this.user.mail='';
	    this.valeur=0;
	}
	
	valider(){
        this.user = new Inscrit(this.inscrit.id,this.inscrit.nom,this.inscrit.prenom,this.inscrit.mail);
        this.inscrit.nom="";
        this.inscrit.prenom="";
        this.inscrit.mail="";
        this.inscrit.id=0;
        this.inscritService.create(this.user)
             .subscribe(
                 truc  => this.inscrits.push(truc),
                 error =>  this.msgErreur = <any>error);
	}

	getInscrits(){
        this.inscritService.getInscrits()
            .subscribe(
                requestOk => {this.inscrits = requestOk;
                    console.log("this"+JSON.stringify(this.inscrits))
                    },
                error => this.msgErreur = error
                )

    }*/
}
/*service | rxjs (promesse?) observable
lifecycle hooks
InMemoryWebApiModule (simulation serveur)
*/
