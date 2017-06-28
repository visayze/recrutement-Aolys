	export class Inscrit {
        
        constructor(
           public sexe: string,
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
           public tel?: string,
           public tel_portable?: string,
           public id?: number,
        ){}
};