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
    vetor! : Curso[] ;


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
  cadastro( c: Curso){
    this.curso_servico.cadastrarCurso(this.curso).subscribe(
      (res: Curso[]) => {

      // adicionando dados ao vetor
      this.vetor = res;

      // limpar os campos de texto atributos
      this.curso.nomeCurso = '' ;
      this.curso.valorCurso = 0 ;

      // atualizar a listagem no front
      this.selecao();

      }
    )
    console.log("cadastrando curso ts")
  }

  // método seleção
  selecao(){
    this.curso_servico.obterCursos().subscribe(
      (res: Curso[]) => {
        this.vetor = res;
      }
    )
    console.log("metodo selecionar ativo");
  }


  // alterar
  alterar(c: Curso){
    this.curso_servico.atualizarCurso(this.curso)
    .subscribe( (res) => {

      // atualizar vetor
      this.vetor = res;

      // limpar valores do objeto
      this.curso.nomeCurso = '';
      this.curso.valorCurso = 0 ;

      // atualiza a listagem
      this.selecao();


    })
  }

  // método remover curso
  remover(c : Curso){
    this.curso_servico.removerCurso(this.curso).subscribe(
      (res: Curso[] ) => {
        this.vetor = res;

        // atualizar os atributos
        this.curso.nomeCurso = '';
        this.curso.valorCurso = 0 ;

        // atualizar a listagem no front
        this.selecao();
      }
    )
    console.log("metodo remover ativo");
  }

  // método selecionar curso especifico
  selecionarCurso(c: Curso ){
    this.curso.idCurso = c.idCurso;
    this.curso.nomeCurso = c.nomeCurso;
    this.curso.valorCurso = c.valorCurso;


    console.log("metodo selecionarCurso ativo");
  }



}
