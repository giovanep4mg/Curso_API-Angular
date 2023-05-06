import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Curso } from './curso';
import { map } from 'rxjs/operators';


@Injectable({
  providedIn: 'root'
})
export class CursoService  {
  // url do banco de dados
  url = "http://localhost/api/php/";


  // vetor para guarda os dados obtidos
  vetor : Curso[] = [];


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

    // método serviço para cadastrar
    cadastrarCurso(c: Curso):Observable<Curso[]>{
      return this.http.post(this.url+'cadastrar', {curso: c })
      .pipe( map ((res) => {
         // this.vetor.push(res[`cursos`]);
          return this.vetor;
        }))

    }

    // método serviço remover curso
    removerCurso(c: Curso):Observable<Curso[]>{

      const idCurso = c.idCurso!.toString();

      // para pegar o id do curso dentro do banco de dados
      const params = new HttpParams().set("idCurso", idCurso);

      console.log("método service remover curso => selecionando id")

      return this.http.delete(this.url+'excluir', {params}).pipe(
        (map( (res: any) => {

          console.log("método servico remover curso => percorrendo o banco para pegar o id")

          // filtrar os ids para achar o que foi escolhido e excluir
          const filtro = this.vetor.filter((curso) => {
              return c.idCurso !== c.idCurso;
            });
            console.log("método servico remover curso => filtrando os ids ")


            // salva o id escolhido se foi encontrado excluido
            return this.vetor = filtro;

            return this.vetor;

        }))


      )

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
