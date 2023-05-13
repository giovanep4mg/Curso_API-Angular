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

    // url para ter acesso ao banco de dados "api"
    url = "http://localhost/api/php/"

    // vetor de cursos para savlar os cursos
    vetor: Curso[] = [] ;


    // cria um objeto da classe curso
    curso = new Curso();

    // variável vazia para guarda erros
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

      // adicionando os dados na var "vetor"
      this.vetor = res;

      // limpar os campos de texto atributos
      this.curso.nomeCurso = '' ;
      this.curso.valorCurso = 0 ;

      // atualizar a listagem no front-end
      this.selecao();
      }
    )
  }

  // método seleção, seleciona todos os cursos para aparecer no front-end
  selecao(){
    this.curso_servico.obterCursos().subscribe(
      (res: Curso[]) => {
        this.vetor = res;
      }
    )
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
      console.log("método alterar => atualizar o front-end")
    })

  }

  // método remover, para remover o curso selecionado.
  remover(c: Curso){
    this.curso_servico.removerCurso(c).subscribe(
      (res: Curso[] ) => {

        // atualizar os atributos
        this.curso.nomeCurso = '';
        this.curso.valorCurso = 0 ;

        // atualizar a listagem no front
        this.selecao();

        // salva no vetor
        return this.vetor = res;
      },
      // se der erro exibe essa mensagem
      error => {
        console.error(error+" Erro no método remover");
      }
    );
  }


  // método selecionar, um curso especifico para realizar modificações ou apagar do banco de dados.
  selecionarCurso(c: Curso ){
    this.curso.idCurso = c.idCurso;

    this.curso.nomeCurso = c.nomeCurso;

    this.curso.valorCurso = c.valorCurso;

  }
}
