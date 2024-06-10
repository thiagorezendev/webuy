@extends('layout.head')
@section('titulo', 'Sobre')

@section('main')
    @extends('layout.frame')
    @section('sobre', 'active')
    @section('content')
    <h1 class="h1 mb-4">Sobre</h1>
    <p>Bem-vindo ao WeBuy Supermercado Online, o seu destino para compras de supermercado com conveniência e rapidez! Este projeto é um supermercado online dedicado a facilitar a vida de nossos clientes, proporcionando uma maneira prática e segura de fazer suas compras sem sair de casa.</p>
    <p>Nosso sistema foi desenvolvido como um projeto acadêmico por Lauro Brant e Thiago Rezende, estudantes do curso de Sistemas de Informação da Universidade Estadual de Montes Claros – Unimontes. A ideia surgiu quando lembramos da pandemia de COVID-19, percebendo a necessidade de alternativas seguras e eficientes para a compra de produtos essenciais, especialmente para idosos e pessoas com dificuldades de locomoção, mesmo após a pandemia.</p>
    <p>O objetivo deste projeto é proporcionar uma experiência de compra simples e acessível, oferecendo uma vasta gama de produtos de supermercado com entrega rápida e eficiente diretamente na porta de sua casa. Esperamos que nosso sistema possa contribuir para a comodidade e bem-estar dos nossos usuários.</p>
    <p>Este projeto acadêmico nos permitiu aplicar diversos conceitos e técnicas aprendidos durante o curso, incluindo a implementação de um banco de dados robusto e eficiente, o desenvolvimento de uma interface amigável usando o Blade junto com Bootstrap e JQuery e a criação de funcionalidades avançadas para a gestão de estoque, cadastro de clientes, e muito mais usando o Laravel.</p>
    <p>Agradecemos por visitar nosso site e esperamos que sua experiência de compra seja a melhor possível. Se tiver alguma dúvida ou sugestão, não hesite em entrar em contato conosco.</p>
    <p>Atenciosamente,<br>Lauro Brant e Thiago Rezende</p>

    @endsection
@endsection