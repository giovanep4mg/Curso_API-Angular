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
    vetor: Curso[] = [] ;


    // objeto da classe curso
    curso = new Curso();

    errorMessage = '';

  // construtor
  constructor(
    private http: HttpClient,
    private curso_servico: CursoService,
  ){}

  ngOnInit() {
    // ao iniciar o sistema, deverá listar todos os cursos no front-end
    this.selecao();
  }

  // método cadastrar
  cadastro( c: Curso){
    this.curso_servico.cadastrarCurso(this.curso).subscribe(
      (res: Curso[]) => {

      // adicionando dados ao vetor
      this.vetor = res;
      console.log("método cadastro => adicionando dados ao vetor");

      // limpar os campos de texto atributos
      this.curso.nomeCurso = '' ;
      this.curso.valorCurso = 0 ;
      console.log("método cadastro => limpar campo de texto atributos")

      // atualizar a listagem no front
      this.selecao();
      console.log("método cadastro =>atualizar o front-end")

      }
    )
    console.log("cadastro => curso.component.ts")
  }

  // método seleção, seleciona todos os cursos para aparecer no front-end
  selecao(){
    this.curso_servico.obterCursos().subscribe(
      (res: Curso[]) => {
        this.vetor = res;
      }
    )
    console.log("metodo seleção => mostrar todos os cursos no front-End");
  }

  // alterar o curso selecionado, podendo modificar o nome e seu valor.
  alterar(c: Curso){
    this.curso_servico.atualizarCurso(this.curso)
    .subscribe( (res) => {

      // atualizar vetor
      this.vetor = res;
      console.log("método alterar => adicionando dados ao vetor")

      // limpar valores do objeto
      this.curso.nomeCurso = '';
      this.curso.valorCurso = 0 ;
      console.log("método alterar => limpando campo de texto de atributos")

      // atualiza a listagem
      this.selecao();
      console.log("método alterar =>atualizar o front-end")

    })

  }

  // método remover, para remover o curso selecionado.
  remover(c: Curso){
    this.curso_servico.removerCurso(c).subscribe(
      (res: Curso[] ) => {
        console.log("método remover curso => removendo o curso "+JSON.stringify(c));

        // atualizar os atributos
        this.curso.nomeCurso = '';
        this.curso.valorCurso = 0 ;

        console.log("método remover curso => atualizando os atributos");

        // atualizar a listagem no front
        this.vetor = res;
        console.log("método remover curso => atualizando o front-End "+JSON.stringify(this.vetor));
      },
      error => {
        console.error(error);
      }
    );
  }


  // método selecionar, um curso especifico para realizar modificações ou apagar do banco de dados.
  selecionarCurso(c: Curso ){
    this.curso.idCurso = c.idCurso;
    console.log("ID CURSO SELECIONADO =>  "+this.curso.idCurso);

    this.curso.nomeCurso = c.nomeCurso;
    console.log("NOME CURSO SELECIONADO => "+this.curso.nomeCurso);

    this.curso.valorCurso = c.valorCurso;
    console.log("VALOR CURSO SELECIONADO =>  "+this.curso.valorCurso);


    console.log("método selecionarCurso => ESTÁ SENDO EXECUTADO ...");
  }


}
