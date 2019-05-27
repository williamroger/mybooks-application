<?php

  namespace App\Models;

  final class LivroModel 
  { 
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $titulo;
    /**
     * @var string
     */
    private $autor;
    /**
     * @var string
     */
    private $edicao;
    /**
     * @var string
     */
    private $indicacao;
    /**
     * @var string
     */
    private $preco;
    /**
     * @var string
     */
    private $imagem;
    /**
     * @var string
     */
    private $descricao;
    /**
     * @var int
     */
    private $biblioteca;
    /**
     * @var int
     */
    private $lido;
    /**
     * @var int
     */
    private $usuarioId;
    /**
     * @var string
     */
    private $editora;

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
      return $this->id;
    }

    /**
     * Get the value of titulo
     *
     * @return  string
     */ 
    public function getTitulo()
    {
      return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @param  string  $titulo
     *
     * @return  self
     */ 
    public function setTitulo(string $titulo)
    {
      $this->titulo = $titulo;

      return $this;
    }

    /**
     * Get the value of autor
     *
     * @return  string
     */ 
    public function getAutor()
    {
      return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @param  string  $autor
     *
     * @return  self
     */ 
    public function setAutor(string $autor)
    {
      $this->autor = $autor;

      return $this;
    }

    /**
     * Get the value of edicao
     *
     * @return  string
     */ 
    public function getEdicao()
    {
      return $this->edicao;
    }

    /**
     * Set the value of edicao
     *
     * @param  string  $edicao
     *
     * @return  self
     */ 
    public function setEdicao(string $edicao)
    {
      $this->edicao = $edicao;

      return $this;
    }

    /**
     * Get the value of indicacao
     *
     * @return  string
     */ 
    public function getIndicacao()
    {
      return $this->indicacao;
    }

    /**
     * Set the value of indicacao
     *
     * @param  string  $indicacao
     *
     * @return  self
     */ 
    public function setIndicacao(string $indicacao)
    {
      $this->indicacao = $indicacao;

      return $this;
    }

    /**
     * Get the value of preco
     *
     * @return  string
     */ 
    public function getPreco()
    {
      return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @param  string  $preco
     *
     * @return  self
     */ 
    public function setPreco(string $preco)
    {
      $this->preco = $preco;

      return $this;
    }

    /**
     * Get the value of imagem
     *
     * @return  string
     */ 
    public function getImagem()
    {
      return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @param  string  $imagem
     *
     * @return  self
     */ 
    public function setImagem(string $imagem)
    {
      $this->imagem = $imagem;

      return $this;
    }

    /**
     * Get the value of descricao
     *
     * @return  string
     */ 
    public function getDescricao()
    {
      return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @param  string  $descricao
     *
     * @return  self
     */ 
    public function setDescricao(string $descricao)
    {
      $this->descricao = $descricao;

      return $this;
    }

    /**
     * Get the value of biblioteca
     *
     * @return  int
     */ 
    public function getBiblioteca()
    {
      return $this->biblioteca;
    }

    /**
     * Set the value of biblioteca
     *
     * @param  int  $biblioteca
     *
     * @return  self
     */ 
    public function setBiblioteca(int $biblioteca)
    {
      $this->biblioteca = $biblioteca;

      return $this;
    }

    /**
     * Get the value of lido
     *
     * @return  int
     */ 
    public function getLido()
    {
      return $this->lido;
    }

    /**
     * Set the value of lido
     *
     * @param  int  $lido
     *
     * @return  self
     */ 
    public function setLido(int $lido)
    {
      $this->lido = $lido;

      return $this;
    }

    /**
     * Get the value of usuarioId
     *
     * @return  int
     */ 
    public function getUsuarioId()
    {
      return $this->usuarioId;
    }

    /**
     * Set the value of usuarioId
     *
     * @param  int  $usuarioId
     *
     * @return  self
     */ 
    public function setUsuarioId(int $usuarioId)
    {
      $this->usuarioId = $usuarioId;

      return $this;
    }

    /**
     * Get the value of editora
     *
     * @return  string
     */ 
    public function getEditora()
    {
      return $this->editora;
    }

    /**
     * Set the value of editora
     *
     * @param  string  $editora
     *
     * @return  self
     */ 
    public function setEditora(string $editora)
    {
      $this->editora = $editora;

      return $this;
    }
  }