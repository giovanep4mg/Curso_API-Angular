import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { Curso } from './curso';

@Injectable({
  providedIn: 'root'
})
export class CursoService {
  // url do banco de dados
  url = "http://localhost/api/php/";

  // vetor para guarda os dados obtidos
  vetor:Curso[] ;

  constructor(
    private http: HttpClient,
  ) { }

    // obter todos os cursos
    obterCursos():Observable<Curso[]> {
      return this.http.get(this.url+"listar").pipe(
        map((res) => {
          this.vetor = res['cursos'];
          return this.vetor;
        })
      )
    }




}
