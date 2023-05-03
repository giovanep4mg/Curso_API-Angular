import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Curso } from './curso';
import { CursoService } from './curso.service';
@Component({
  selector: 'app-curso',
  templateUrl: './curso.component.html',
  styleUrls: ['./curso.component.css']
})

export class CursoComponent implements OnInit {

    // url base da api, banco de dados
    url = "http://localhost/api/php/"

    // vetor de cursos
    vetor : Curso[] = [] ;


    // objeto da classe curso
    curso = new Curso();



  // construtor
  constructor(
    private http: HttpClient,
    private curso_servico: CursoService,
  ){}

  ngOnInit() {
    // ao iniciar o sistema, deverá listar os cursos
    this.selecao();


  }


  // método cadastrar
  cadastrar(){
    this.curso_servico.cadastrarCurso(this.curso).subscribe(
      (res: Curso[]) => {

      // adicionando dados ao vetor
      this.vetor = res;

      // limpar os atributos
      this.curso.nomeCurso = '' ;
      this.curso.valorCurso = 0 ;

      // atualizar a listagem no front
      this.selecao();


      }
    )
  }

  // método seleção
  selecao(){
    this.curso_servico.obterCursos().subscribe(
      (res: Curso[]) => {
        this.vetor = res;
      }
    )
  }


  // alterar
  alterar(){
    alert("alterar");
  }

  // remover
  remover(){
    alert("remover");
  }

}
