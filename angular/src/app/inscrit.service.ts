import { Injectable }    from '@angular/core';
import { Headers, Http, Response, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs/Rx';

import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';


import { Inscrit } from './classe/Inscrit';


@Injectable()
export class InscritService {
/********** Proprietes **********/
    private inscritUrl = '..../Inscrit.php';  // URL to web api

    /********** Constructeur **********/
    constructor(private http: Http) { }

    /********** Méthodes **********/
    getInscrits(): Observable<Inscrit[]> {
        
        return this.http.get(this.inscritUrl)
        .map(this.extractData)
        .catch(this.handleError);
    }

/*    create(data: Inscrit): Observable<Inscrit> {
    console.log(data);
    return this.http.post(this.inscritUrl, { data })
                    .map(this.extractData)
                    .catch(this.handleError);
  }*/

    create(data: Inscrit): Observable<Inscrit> {
        /*console.log(data);*/
        return this.http.post(this.inscritUrl, data)
                        .map(this.extractData)
                        .catch(this.handleError);
      }

/*
    verif(): Observable<any>{
        return this.http.post()
                        .map(this.extractData)
                        .catch(this.handleError);    
    }
*/

    private extractData(res: Response) {
        let body = res.json();
        return body.data || { };
      }

    private handleError (error: Response | any) {
    // In a real world app, you might use a remote logging infrastructure
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

