import { HttpClientModule } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
@Component({
  selector: 'app-curso',
  templateUrl: './curso.component.html',
  styleUrls: ['./curso.component.css']
})

export class CursoComponent implements OnInit {
  
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
