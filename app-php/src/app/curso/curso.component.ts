import { HttpClientModule } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Curso } from './curso';
@Component({
  selector: 'app-curso',
  templateUrl: './curso.component.html',
  styleUrls: ['./curso.component.css']
})

export class CursoComponent implements OnInit {

    // url base da api, banco de dados
    url = "http://localhost/api/php/"

    // vetor de cursos
    vetor:Curso = [] ;

  // construtor
  constructor(
    private http: HttpClientModule,
  ){}

  ngOnInit(): void {

  }


  // método cadastrar
  cadastrar(): void{
    alert("cadastrar");
  }

  // método seleção
  selecao(){
    alert("seleção");
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
