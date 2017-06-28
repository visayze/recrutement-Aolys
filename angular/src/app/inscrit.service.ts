import { Injectable }    from '@angular/core';
import { Headers, Http, Response, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import { Inscrit } from './classe/Inscrit';

@Injectable()
export class InscritService {
    
    /********** Proprietes **********/
    private inscritUrl = 'http://localhost/stage/angular/src/app/php/Inscrit.php';  // URL to web api


    /********** Constructeur **********/
    constructor(private http: Http) { }


    /********** Méthodes **********/
    getInscrits(): Observable<Inscrit[]> {
        return this.http.get(this.inscritUrl)
        .map(this.extractData)
        .catch(this.handleError);
    }


    create(data: Inscrit): Observable<Inscrit> {
        /*console.log(data);*/
        return this.http.post(this.inscritUrl, data)
                        .map(this.extractData)
                        .catch(this.handleError);
    }
      

    verif(mail: string, mdp: string): Observable<any>{
        let headers = new Headers({'Content-Type':'application/json','Access-Control-Allow-Origin':'*'});

        let options = new RequestOptions({headers: headers});

        return this.http
            .post(this.inscritUrl, { 'mail':mail, 'mdp':mdp }, options)
            .map(this.extractData)
            .catch(this.handleError);    
    }
    
    private extractReponse(res: Response){
        console.log(res);
        return true;
    }


    private extractData(res: Response) {
        console.log(res);
        let body = res.json();
        return body.data || { };
    }

    private handleError (error: Response | any) {
    // In a real world app, you might use a remote logging infrastructure
        console.log(error);
        let errMsg: string;
        if (error instanceof Response) {
          const body = error.json() || '';
          const err = body.error || JSON.stringify(body);
          errMsg = `${error.status} - ${error.statusText || ''} ${err}`;
        } else {
          errMsg = error.message ? error.message : error.toString();
        }
        console.error(errMsg);
        return Observable.throw(errMsg);
     }
}

