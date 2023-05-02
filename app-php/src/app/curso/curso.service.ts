import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Curso } from './curso';
import { map } from 'rxjs/operators';


@Injectable({
  providedIn: 'root'
})
export class CursoService {
  // url do banco de dados
  url = "http://localhost/api/php/";


  // vetor para guarda os dados obtidos
  vetor : Curso[] = [] ;


  curso = new Curso();

  // construtor
  constructor(
    private http: HttpClient,

  ) { }

    // obter todos os cursos

    obterCursos():Observable<Curso[]> {
      return this.http.get(this.url+"listar").pipe
      ( map( (res: any) => {
          this.vetor = res;
          return this.vetor;
        })
      );
    }


}
