export class Inscrit {
    constructor(
        public sexe: string,
        public nom: string,
        public prenom: string,
        public mail: string,
        public nationalite: string,
        public date_naissance: Date,
        public CP: number,
        public mobilite: boolean,
        public mdp: string,
        public num_pole_emploi?: string,
        public mail_parrain?: string,
        public tel?: string,
        public tel_portable?: string,
        public id?: number ) {}
};
