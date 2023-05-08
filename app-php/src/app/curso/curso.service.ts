import { HttpClient, HttpClientModule, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Curso } from './curso';
import {  map, tap } from 'rxjs/operators';

import { catchError } from 'rxjs/operators';
import { throwError } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class CursoService  {
  // url do banco de dados api
  url = "http://localhost/api/php/";

  // vetor para guarda os dados obtidos
  vetor : Curso[] = [];

  // cria um objeto
  curso = new Curso();

  // construtor
  constructor(
    private http: HttpClient,

  ) { }

    // obter todos os cursos do banco de dados
    obterCursos():Observable<Curso[]> {
      return this.http.get(this.url+"listar").pipe
      ( map( (res: any) => {
          this.vetor = res;
          return this.vetor;
        })
      );
    }

    // método serviço para cadastrar
    cadastrarCurso(c: Curso): Observable<Curso[]>{
      return this.http.post(this.url+'cadastrar', {curso: c }).pipe(
        map ((res) => {
          console.log("curso serviço => cadastrar curso");
          this.vetor.push(res as Curso);
          return this.vetor;
        })
      );
    }

    // método serviço, para remover o curso
    removerCurso(c: Curso): Observable<Curso[]> {
      if (!c || c.idCurso == null) {
        console.error('Curso inválido');
        return throwError('O curso informado é inválido.');
      }
      // para pegar o id do curso e transformar em string
      const params = new HttpParams().set('idCurso', c.idCurso.toString());

      console.log("método service remover curso => selecionando o id  "+params)

      return this.http.delete(this.url+'excluir', {params: params}).pipe(
        map((res: any) => {
          const filtro = this.vetor.filter((curso) => {
            return curso.idCurso !== c.idCurso;
          });

          console.log("Fazendo uma filtragem nos ids. ");
          return this.vetor = filtro;
        }),
        catchError((error: HttpErrorResponse) => {
          if (error instanceof Error) {
            // Erro de rede ou de servidor
            console.error('Erro ao remover curso:', error);
            return throwError('Ocorreu um erro ao tentar remover o curso.');
          } else {
            // Erro no parse do retorno da API
            console.error('Erro ao remover curso:', error.error);
            return throwError('Ocorreu um erro ao tentar remover o curso. Verifique os dados informados.');
          }
        })
      );
    }
    
      // atualizar curso
      atualizarCurso(c: Curso): Observable<Curso[]>{

        // executa a alteração via url
        return this.http.put(this.url+'alterar', {curso: c})



        // percorre o vetor para saber qual é o id do curso alterado
        .pipe(map((res) => {
            const cursoAlterado = this.vetor.find((item) => {
              item.idCurso === c.idCurso;

            });

            // altero o valor do vetor local
            if(cursoAlterado){
              cursoAlterado ['nomeCurso'] = c ['nomeCurso'];
              cursoAlterado ['valorCurso'] = c ['valorCurso'];
              console.log("fazendo if no atualizar curso => curso.service.ts")
            }
            // retorna
            return this.vetor;

        }))

      }





}
