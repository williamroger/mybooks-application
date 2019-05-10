<?php
  class Book {
    private $id;
    private $titulo;
    private $autor;
    private $edicao;
    private $indicacao;
    private $preco;
    private $imagem;
    private $descricao;
    private $biblioteca;
    private $lido;
    private $usuarioId;

    public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getTitulo() {
      return $this->titulo;
    }

    public function setTitulo($titulo) {
      $this->titulo = $titulo;
    }

    public function getAutor() {
      return $this->autor;
    }

    public function setAutor($autor) {
      $this->autor = $autor;
    }

    public function getEdicao() {
      return $this->edicao;
    }

    public function setEdicao($edicao) {
      $this->edicao = $edicao;
    }

    public function getIndicacao() {
      return $this->indicacao;
    }

    public function setIndicacao($indicacao) {
      $this->indicacao = $indicacao;
    }

    public function getPreco() {
      return $this->preco;
    }

    public function setPreco($preco) {
      $this->preco = $preco;
    }

    public function getImagem() {
      return $this->imagem;
    }

    public function setImagem($imagem) {
      $this->imagem = $imagem;
    }

    public function getDescricao() {
      return $this->descricao;
    }

    public function setDescricao($descricao) {
      $this->descricao = $descricao;
    }

    public function getIsBiblioteca() {
      return $this->biblioteca;
    }

    public function setIsBiblioteca($biblioteca) {
      $this->biblioteca = $biblioteca;
    }

    public function getIsLido() {
      return $this->lido;
    }

    public function setIsLido($lido) {
      $this->lido = $lido;
    }

    public function getUsuarioId() {
      return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId) {
      $this->usuarioId = $usuarioId;
    }
  }
