import { Component, OnInit }    from '@angular/core';
import { Inscrit }              from '../classe/Inscrit';
import { InscritService }       from '../inscrit.service';

	
@Component({
  selector: 'liste-inscrits',
  templateUrl: './listeInscrits.component.html'
})

export class ListeInscritsComponent implements OnInit {
	
/********** Proprietes **********/
    titre : string = "liste des inscrits";
    
/********** Constructeur **********/    
	constructor(private inscritService: InscritService){}

/********** Méthodes **********/
    ngOnInit(){
	}	
	
}
