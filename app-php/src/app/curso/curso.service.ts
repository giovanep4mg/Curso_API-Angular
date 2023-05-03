import { HttpClient, HttpParams } from '@angular/common/http';
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

    // método cadastrar
    cadastrarCurso(c: Curso):Observable<Curso[]>{
      return this.http.post(this.url+'cadastrar', {cursos : c }).pipe
      ( map ((res: any) => {
          this.vetor.push = res['cursos'];
          return this.vetor;
        }))
    }

    // método remover curso
    removerCurso(c: Curso):Observable<Curso[]>{

      // para pegar o id do curso dentro do banco de dados
      const params = new HttpParams().set("idCurso", c.idCurso!.toString());

      return this.http.delete(this.url+'excluir', {params : params}).pipe(
        (map( (res) => {

          // filtrar os ids para achar o que foi escolhido e excluir
          const filtro = this.vetor.filter( (curso) => {
              return +['idCurso'] !== +c.idCurso!;
            });

            // salva o id escolhido se foi encontrado excluido
            return this.vetor = filtro;

        }))
      )




    }









}
