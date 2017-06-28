import { InMemoryDbService } from 'angular-in-memory-web-api';


export class InMemoryDataService implements InMemoryDbService {
  createDb() {
    let inscrits = [
      { sexe: "masculain", nom : "MARTINEZ",  prenom: "Lucas", mail: "lucas.martinez@exemple.fr", nationalite:"français", date_de_naissance:"12/09/1997", CP:32600, mobilite:true, mdp:"mdp",numero_pole_emploi:null,mail_parrain:null,id:null,tel:null,tel_portable:null},
        ];
        
    return {inscrits};
  }
}